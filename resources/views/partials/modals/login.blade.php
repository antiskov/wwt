<div id="login-modal" class="modal">
    <div class="modal__content">
        <h5 class="modal__title">Войти или зарегестрироваться</h5>
        <div class="login-modal-img">
            <img src="/images/icons/user.svg" alt="login photo">
        </div>
        <form id="login-form" class="check-login" method="post" action="{{ url('check-login-email') }}">
            @CSRF
            <input id="login-email-form" type="text" name="email" id="login_email" placeholder="Введите почту, логин или телефон">
            <span></span>
            <button class="btn-arrow">Далее</button>
        </form>
    </div>
</div>
