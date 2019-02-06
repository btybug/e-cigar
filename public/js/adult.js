/**
 * Created by sahak on 1/7/2019.
 */
$(document).ready(function () {
    var modalHtml='<div class="modal adult-modal" tabindex="-1" role="dialog">' +
        '<div class="modal-dialog" role="document">' +
        '<div class="modal-content">' +
        '<div class="modal-header">' +
        '<h5 class="modal-title">Modal title</h5>' +
        '</div>' +
        '<div class="modal-body">' +
        '<p>Are you 21 or older ?</p>' +
        '</div>' +
        '<div class="modal-footer">' +
        '<button type="button" class="btn btn-primary adult">Yes</button>' +
        '<button type="button" class="btn btn-secondary not-adult" data-dismiss="modal">No</button>' +
        '</div>' +
        '</div>' +
        '</div>' +
        '</div>';

    function getCookie(name) {
        var matches = document.cookie.match(new RegExp(
            "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
        ));
        return matches ? decodeURIComponent(matches[1]) : undefined;
    }

    function setCookie(name, value, options) {
        options = options || {};

        var expires = options.expires;

        if (typeof expires == "number" && expires) {
            var d = new Date();
            d.setTime(d.getTime() + expires * 1000);
            expires = options.expires = d;
        }
        if (expires && expires.toUTCString) {
            options.expires = expires.toUTCString();
        }

        value = encodeURIComponent(value);

        var updatedCookie = name + "=" + value;

        for (var propName in options) {
            updatedCookie += "; " + propName;
            var propValue = options[propName];
            if (propValue !== true) {
                updatedCookie += "=" + propValue;
            }
        }

        document.cookie = updatedCookie;
    }

    if(!getCookie('adult')){
        $('body').append(modalHtml);
        $('body').find('.adult-modal').modal({
            backdrop: 'static',
            keyboard: false
        });
    }
    $('body').on('click','.not-adult',function () {
        window.location='http://www.google.com';
    });
    $('body').on('click','.adult',function () {
       setCookie('adult',1,3600*24*40);
        window.location.reload();
    });
});

