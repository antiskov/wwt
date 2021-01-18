<div id="advertisement-modal" class="modal advertisement-modal">
    <div class="modal__content">
        <h5 class="modal__title">Заказать рекламу</h5>
        <form id="advertisement-form" class="advertisement-form" method="post" action="{{route('email_ad')}}">
            @csrf
            <div class="input-wrap">
                <label for="advertisement-name">Имя</label>
                <input name="name" type="text" id="advertisement-name" placeholder="Введите имя" required>
            </div>
            <div class="input-wrap">
                <label for="advertisement-email">E-MAIL</label>
                <input name="email" type="email" id="advertisement-email" placeholder="Введите почту" required>
            </div>
            <div class="input-wrap">
                <label for="advertisement-message">Сообщение</label>
                <textarea name="message" id="advertisement-message" placeholder="Введите сообщение"></textarea>
            </div>
            <button type="submit" class="primary-btn">Отправить</button>
        </form>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function (event) {
        $('#advertisement-form').on('submit', function (e){
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: '/send_ad_email',
                data: $('#advertisement-form').serializeArray(),
                success: function (){
                    $.fancybox.close({
                        src: '#advertisement-form',
                    });
                    $(`#advertisement-name`).val("");
                    $(`#advertisement-email`).val("");
                    $(`#advertisement-message`).val("");
                    $.fancybox.open({
                        src: '#success-modal',
                    });
                }
            })
        })
    });

</script>
