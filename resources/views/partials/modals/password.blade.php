<div id="password-modal" class="modal">
    <div class="modal__content">
        <h5 class="modal__title">{{__('messages.modal_welcome')}}</h5>
        <div class="login-modal-img login-modal-img_portrait">
            <img src="/images/content/person.png" alt="login photo">
        </div>
        <form id="password-form" method="post" class="check-login" action="{{ route('login-password') }}">
            @CSRF
            <div class="change-input">
<<<<<<< HEAD
                <input id="password-form-email" name="email" type="text" placeholder="Введите почту, логин или телефон"
                       required
=======
                <input id="password-form-email" name="email" type="text" placeholder="{{__('messages.modal_placeholder')}}"
                       disabled required
>>>>>>> 8948a19f1a39f70d03b42d8e5eb19bb3d226483c
                       value="someMail@gmail.com">
                <span></span>
{{--                <img src="/images/icons/eraser.svg" alt="Изменить логин">--}}
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
<<<<<<< HEAD
                <a href="{{route('forgot_password')}}">Проблема с паролем?</a>
=======
                <a href="#">{{__('messages.modal_password_remind_pass')}}</a>
>>>>>>> 8948a19f1a39f70d03b42d8e5eb19bb3d226483c
            </div>
            <button type="submit" class="btn-arrow">{{__('messages.next_button')}}</button>
        </form>
    </div>
</div>
