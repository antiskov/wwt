<footer class="footer">
    <div class="sent-wrap">
        <div class="sent-news">
            <h2>Рассылка новинок <span>и новых поступлений</span></h2>
            <div class="social-sent">
                <a href="#/" class="social-sent_link">
                    <img src="/images/icons/viber-hover.svg" alt="img">
                    <img src="/images/icons/viber.svg" alt="img">
                    <span>
                        viber
                    </span>
                </a>
                <a href="#/" class="social-sent_link">
                    <img src="/images/icons/telegram-hover.svg" alt="img">
                    <img src="/images/icons/telegram.svg" alt="img">
                    <span>
                        telegram
                    </span>
                </a>
                <a href="#/" class="social-sent_link">
                    <img src="/images/icons/whatsapp-hover.svg" alt="img">
                    <img src="/images/icons/whatsapp.svg" alt="img">
                    <span>
                        whatsapp
                    </span>
                </a>
                <a href="#/" class="social-sent_link">
                    <img src="/images/icons/email-sms-hover.svg" alt="img">
                    <img src="/images/icons/email-sms.svg" alt="img">
                    <span>
                        sms
                    </span>
                </a>
            </div>
            <form id="subscribe-form" class="search-wrap" action="{{route('subscribe')}}" method="post">
                @csrf
                <input type="search" name="email" class="footer-search" placeholder="Введите email">
                <button class="email-push" type="submit">
                    <span>Подписаться</span>
                    <img src="/images/icons/push-email.svg" alt="img">
                </button>
            </form>
        </div>
    </div>
    <div class="footer-wrap">


        @widget('media_link_widget')
        <div class="mob-phone">
            <p>Горячая линия</p>
            <a href="tel:+49721906693" class="footer-phone">+49 721 906693</a>
        </div>
    </div>
</footer>
<script>
    document.addEventListener("DOMContentLoaded", function (event) {
        $('#subscribe-form').on('submit', function (e){
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: '/subscribe',
                data: $('#subscribe-form').serializeArray(),
                success: function (){
                    $.fancybox.open({
                        src: '#success-news-modal',
                    });
                }
            })
        })
    });

</script>
