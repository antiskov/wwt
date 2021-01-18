<div id="password-modal" class="modal">
    <div class="modal__content">
        <h5 class="modal__title">{{__('messages.modal_welcome')}}</h5>
        <form id="password-form" method="post" class="check-login" action="{{ route('login-password') }}">
            @CSRF
            <div class="change-input">
                <input id="password-form-email" name="email" type="text" placeholder="{{__('messages.modal_registration_email')}}"
                       required>
                <span></span>
            </div>
            <div class="password-input">
                <input id='password-login-form' name="password" type="password" placeholder="Введите пароль" required>
                <span>{{__('messages.modal_password_span')}}</span>
                <img src="/images/icons/yey-close.svg" alt="{{__('messages.modal_password_show_pass')}}">
            </div>
            <div class="remember-me">
                <div class="checkbox-block">
                    <label class="checkbox-block__label">
                        <input type="checkbox" name="remember">
                        <p><span>{{__('messages.modal_password_remember')}}</span></p>
                    </label>
                </div>
                <a href="{{route('forgot_password')}}">{{__('messages.modal_password_remind_pass')}}</a>
            </div>
            <button type="submit" class="btn-arrow">{{__('messages.next_button')}}</button>
            <pre data-fancybox href="#registration-modal" class="common-link">Нет аккаунта?</pre>
        </form>
    </div>
</div>
