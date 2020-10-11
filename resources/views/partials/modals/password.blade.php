<div id="password-modal" class="modal">
    <div class="modal__content">
        <h5 class="modal__title">Добро пожаловать!</h5>
        <div class="login-modal-img login-modal-img_portrait">
            <img src="./images/content/person.png" alt="login photo">
        </div>
        <form id="password-form" class="check-login" action="#">
            <div class="change-input">
                <input name="name" type="text" placeholder="Введите почту, логин или телефон" disabled required
                       value="someMail@gmail.com">
                <span>Обязательное поле*</span>
                <img src="./images/icons/eraser.svg" alt="Изменить логин">
            </div>
            <div class="password-input">
                <input name="password" type="password" placeholder="Введите пароль" required>
                <span>Обязательное поле*</span>
                <img src="./images/icons/yey-close.svg" alt="Показать пароль">
            </div>
            <div class="remember-me">
                <div class="checkbox-block">
                    <label class="checkbox-block__label">
                        <input type="checkbox">
                        <p><span>Запомнить меня</span></p>
                    </label>
                </div>
                <a href="#">Напомнить пароль</a>
            </div>
            <button class="btn-arrow">Далее</button>
        </form>
    </div>
</div>
