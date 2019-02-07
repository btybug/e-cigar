(function(){
	$('#register-form-1').on('submit', function(ev) {
		ev.preventDefault();

		const data = $(this).serialize();

        const GOOGLE_RECAPTCHA_KEY = $('meta[name="google-recaptcha-key"]').attr("content");
        grecaptcha.ready(() => {
            grecaptcha.execute(GOOGLE_RECAPTCHA_KEY, { action: 'action_name' })
                .then((token) => {
                    console.log('recaptcha')
                    $('.g-recaptcha-response').val(token);
                })
                .then(() => {
                    var data = $(this).serialize();

                    const errorHandler = (fieldElement, errorObject, message, fieldElementName) => {
                        const change = (fieldElementChange, fieldElementNameChange) => {
                            fieldElementChange.removeClass('transitionHorizonal');
                            $(fieldElementNameChange + '~p').remove();
                        };
                        change(fieldElement, fieldElementName);
                        const pTag = fieldElement.next().prop("tagName") !== 'p';

                        if (errorObject && message && pTag) {
                            fieldElement.parent().append('<p style="color: red; font-size: 12px; margin-top: 2px;">' + message + '</p>');
                            fieldElement.addClass('transitionHorizonal');
                        }
                        fieldElement.on('keypress', () => change(fieldElement, fieldElementName));
                        fieldElement.on('change', () => change(fieldElement, fieldElementName));
                    };

                    $.ajax({
                        type: "post",
                        url: "/register",
                        cache: false,
                        datatype: "json",
                        data: data,
                        headers: {
                            "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content")
                        },
                        success: (data) => {
                            if (!data.error) {
                                console.log(data);
                            }
                        },
                        error: (error) => {
                            const firstNameEl = $('#firstName');
                            const lastNameEl = $('#lastName');
                            const emailEl = $('#e-mail');
                            const phoneEl = $('#phoneNumber');
                            const passwordEl = $('#password');
                            console.log($('form')[0])
                            errorHandler(firstNameEl, error.responseJSON.errors, error.responseJSON.errors.name, '#firstName');
                            errorHandler(lastNameEl, error.responseJSON.errors, error.responseJSON.errors.last_name, '#lastName');
                            errorHandler(emailEl, error.responseJSON.errors, error.responseJSON.errors.email, '#e-mail');
                            errorHandler(phoneEl, error.responseJSON.errors, error.responseJSON.errors.phone, '#phoneNumber');
                            errorHandler(passwordEl, error.responseJSON.errors, error.responseJSON.errors.password, '#password');
                        }
                    });
                });
        });
    });
})();
