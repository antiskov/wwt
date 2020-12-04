<div id="password-modal" class="modal">
    <div class="modal__content">
        <h5 class="modal__title">Добро пожаловать!</h5>
        <div class="login-modal-img login-modal-img_portrait">
            <img src="/images/content/person.png" alt="login photo">
        </div>
        <form id="password-form" method="post" class="check-login" action="{{ route('login-password') }}">
            @CSRF
            <div class="change-input">
                <input id="password-form-email" name="email" type="text" placeholder="Введите почту, логин или телефон"
                       required
                       value="someMail@gmail.com">
                <span></span>
{{--                <img src="/images/icons/eraser.svg" alt="Изменить логин">--}}
            </div>
            <div class="password-input">
                <input id='password-login-form' name="password" type="password" placeholder="Введите пароль" required>
                <span>Обязательное поле*</span>
                <img src="/images/icons/yey-close.svg" alt="Показать пароль">
            </div>
            <div class="remember-me">
                <div class="checkbox-block">
                    <label class="checkbox-block__label">
                        <input type="checkbox" name="remember">
                        <p><span>Запомнить меня</span></p>
                    </label>
                </div>
                <a href="{{route('forgot_password')}}">Напомнить пароль</a>
            </div>
            <button type="submit" class="btn-arrow">Далее</button>
        </form>
    </div>
</div>
