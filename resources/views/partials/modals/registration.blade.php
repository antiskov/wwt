<div id="registration-modal" class="modal">
    <div class="modal__content">
        <h5 class="modal__title">Добро пожаловать!</h5>
        <form id="registration-form" class="registration" action="#">
            <div class="change-input">
                <input name="name" type="text" placeholder="Введите почту, логин или телефон" disabled
                       value="someMail@gmail.com" required>
                <span>Введите правильно почту</span>
                <img src="./images/icons/eraser.svg" alt="Изменить логин">
            </div>
            <input id="reg-pass" name="password" type="password" placeholder="Введите пароль" required>
            <input name="repeat-password" type="password" placeholder="Повторите пароль" required>
            <span>Пароли не совпадают</span>
            <div class="checkbox-block registration__checkbox">
                <label class="checkbox-block__label">
                    <input type="checkbox" name="data-protection" required>
                    <p><span>Я принимаю условия о защите данных</span></p>
                    <span>Обязательное поле*</span>
                </label>
            </div>
            <div class="checkbox-block registration__checkbox">
                <label class="checkbox-block__label">
                    <input type="checkbox" name="mailing" required>
                    <p><span>Я хочу регулярно получать новостную рассылку о предложениях и продуктах по электронной почте.</span>
                    </p>
                    <span>Обязательное поле*</span>
                </label>
            </div>
            <button class="btn-arrow">Зарегистрироваться</button>
        </form>
    </div>
</div>