<div id="login-modal" class="modal">
    <div class="modal__content">
        <h5 class="modal__title">{{__('messages.modal_login')}}</h5>
        <div class="login-modal-img">
            <img src="/images/icons/user.svg" alt="login photo">
        </div>
        <form id="login-form" class="check-login" method="post" action="{{ url('check-login-email') }}">
            @CSRF
            <input id="login-email-form" type="text" name="email" id="login_email" placeholder="{{__('messages.modal_login_placeholder')}}">
            <span></span>
            <button class="btn-arrow">{{__('messages.next_button')}}</button>
        </form>
    </div>
</div>
