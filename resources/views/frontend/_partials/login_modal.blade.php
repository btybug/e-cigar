<div class="modal modal-accounts fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <button type="button" class="close main-transition" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="row no-gutters modal-content_inner">
                <div class="col-md-4 col-sm-2">
                    <div class="modal_left-img-holder h-100" style="background-image: url(/public/img/temp/modal-login-bg.jpg)"></div>
                </div>

                <div class="col-md-8 col-sm-10">
                    @include("frontend._partials.login_modal_form")
                </div>
            </div>
        </div>
    </div>
</div>
