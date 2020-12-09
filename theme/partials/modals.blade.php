<div id="login-modal" class="modal">
  <div class="modal__content">
    <h5 class="modal__title">Войти или зарегестрироваться</h5>
    <div class="login-modal-img">
      <img src="./images/icons/user.svg" alt="login photo">
    </div>
    <form id="login-form" class="check-login" action="#">
      <input type="text" name="name" placeholder="Введите почту, логин или телефон">
      <span>Обязательное поле*</span>
      <button class="btn-arrow">Далее</button>
    </form>
  </div>
</div>

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
      <pre data-fancybox data-src="#registration-modal" class="common-link">Нет аккаунта?</pre>
    </form>
  </div>
</div>

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

<div id="change-pass-mail-modal" class="modal">
  <div class="modal__content">
    <h5 class="modal__title">Смена пароля</h5>
    <p class="modal__text">
      Введите, пожалуйста, адрес Вашей эл. почты и Вы получите эл. письмо, с помощью которого сможете изменить Ваш
      пароль.
    </p>
    <form id="change-pass-mail-form" class="change-pass-mail" action="#">
      <input name="mail" type="email" placeholder="Введите адресс вашей почты" required>
      <span>Обязательное поле*</span>
      <button class="btn-arrow">Восстановить пароль</button>
    </form>
  </div>
</div>

<div id="congrats-modal" class="modal">
  <div class="modal__content">
    <h5 class="modal__title">Поздравляем!</h5>
    <p class="modal__text">
      Вы успешно залогинились!
    </p>
  </div>
</div>

<div id="save-search-modal" class="modal">
  <div class="modal__content">
    <h5 class="modal__title">Сохранить результат поиска</h5>
    <form id="save-search-form" class="change-pass-mail" action="#">
      <input name="search-result" type="text" placeholder="Название поиска" required>
      <span>Обязательное поле*</span>
      <div class="checkbox-block">
        <label class="checkbox-block__label">
          <input type="checkbox" name="newsletter">
          <p><span>Получать новые объявления по эл. почте</span></p>
        </label>
      </div>
      <div class="modal__buttons">
        <a data-fancybox-close href="#">Отменить</a>
        <button class="btn-arrow">Сохранить</button>
      </div>
    </form>
  </div>
</div>

<div id="change-pass-modal" class="modal">
  <div class="modal__content">
    <h5 class="modal__title">Смена пароля</h5>
    <p class="modal__text">
      Здесь вы можете сменить пароль
    </p>
    <form id="change-pass-form" class="change-pass" action="#">
      <input name="password" type="password" placeholder="Введите новый пароль" required>
      <span>Поле не может быть пустым</span>
      <input name="repeat-password" type="password" placeholder="Повторите новый пароль" required>
      <span>Пароли не совпадают</span>
      <button class="btn-arrow">Изменить</button>
    </form>
  </div>
</div>

<div id="save-filter-modal" class="modal">
  <div class="modal__content">
    <h5 class="modal__title">Сохранение фильтра</h5>
    <p class="modal__text">
      Введите, пожалуйста, название фильтра для сохранения.
    </p>
    <form id="save-filter-form" class="change-pass-mail" action="#">
      <input name="name" type="text" placeholder="Введите название фильтра" required>
      <span>Обязательное поле*</span>
      <button class="btn-arrow">Сохранить запрос</button>
    </form>
  </div>
</div>

<div id="introduce-yourself-modal" class="modal">
  <div class="modal__content">
    <h5 class="modal__title">Добро пожаловать!</h5>
    <div class="login-modal-img">
      <img src="./images/icons/Ok-lk.svg" alt="image" role="presentation" tabindex="-1">
    </div>
    <p class="modal__text">
      Перед тем, как приступить, представьтесь, пожалуйста
    </p>
    <form id="introduce-yourself-form" class="introduce-yourself" action="#">
      <input name="name" type="text" placeholder="Ваше имя" required>
      <span>Обязательное поле*</span>
      <input name="surname" type="text" placeholder="Ваша фамилия" required>
      <span>Обязательное поле*</span>
      <div class="contact-form__item">
        <div class="custom-select" style="width:100%;">
          <select name="male">
            <option value="default">Укажите ваш пол</option>
            <option value="Мужской">Мужской</option>
            <option value="Женский">Женский</option>
          </select>
        </div>
      </div>
      <div class="modal__buttons">
        <a href="#">Пропустить</a>
        <button class="btn-arrow">Сохранить</button>
      </div>
    </form>
  </div>
</div>

<div id="item-page-modal">
  <div class="modal-cont">
    <h2>Patek Philippe Aquanaut 5168G-001 new unworn Patek</h2>

    <div class="slider-modal-cont">
      <div class="swiper-container  nav-top">
        <div class="swiper-wrapper">
          <img src="./images/slider/1.png" alt="img" class="swiper-slide">
          <img src="./images/slider/1.png" alt="img" class="swiper-slide">
          <img src="./images/slider/1.png" alt="img" class="swiper-slide">
          <img src="./images/slider/1.png" alt="img" class="swiper-slide">
          <img src="./images/slider/1.png" alt="img" class="swiper-slide">
        </div>
        <!-- Add Arrows -->
        <div class="swiper-button-next swiper-button-black"></div>
        <div class="swiper-button-prev swiper-button-black"></div>
      </div>
      <div class="swiper-container  nav-nav">
        <div class="swiper-wrapper">
          <img src="./images/slider/1.png" alt="img" class="swiper-slide">
          <img src="./images/slider/1.png" alt="img" class="swiper-slide">
          <img src="./images/slider/1.png" alt="img" class="swiper-slide">
          <img src="./images/slider/1.png" alt="img" class="swiper-slide">
          <img src="./images/slider/1.png" alt="img" class="swiper-slide">
        </div>
      </div>
    </div>
  </div>
</div>

<div id="referral_number">
  <div class="number-wrap">
    <div class="search-wrap">
      <img src="./images/content/popup-img.png" alt="img" class="banner-search">
      <div class="text-modal">
        <h2>Введите пожалуйста</h2>
        <form class="search-container">
          <input type="search" class="input-search-modal" placeholder="идентификационный номер, марка, модель ... ">
          <ul class="result-search">
            //= result-search-item.html
            //= result-search-item.html
            //= result-search-item.html
            //= result-search-item.html
            //= result-search-item.html
            //= result-search-item.html
            //= result-search-item.html
            //= result-search-item.html
            //= result-search-item.html
          </ul>

          <button class="search-btn btn-hover">Итак, начнем</button>
        </form>
      </div>
    </div>

    <div class="accessories">
      <img src="./images/content/popup-img-2.png" alt="img" class="banner-search">
      <div class="text-modal">
        <h2>Введите ref номер часов для которых подходит этот аксессуар</h2>
        <form class="search-container">
          <input type="search" class="input-search-modal">
          <ul class="result-search">
            //= result-search-item.html
            //= result-search-item.html
            //= result-search-item.html
            //= result-search-item.html
            //= result-search-item.html
            //= result-search-item.html
            //= result-search-item.html
            //= result-search-item.html
            //= result-search-item.html
          </ul>
          <div class="chek_cont_set">
            <label class="checkbox-other">
              <input type="checkbox" checked>
              <span>Я хочу указать ref номера позже </span>
            </label>

            <label class="checkbox-other">
              <input type="checkbox" checked>
              <span>Этот аксессуар подходит для любых часов</span>
            </label>
          </div>

          <button class="search-btn btn-hover">Итак, начнем</button>
        </form>
      </div>
    </div>

    <div class="loader-wrap">
      <h2>Определяем характеристики Ваших часов</h2>
      <div class="time-loading">
        <img src="./images/loader.gif" alt="img" class="loading-gif">
        <span>17</span>
      </div>
      <p>Найдено характеристик </p>
    </div>
  </div>
</div>
