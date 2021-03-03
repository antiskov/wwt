<footer class="footer">
    <div class="sent-wrap">
        <div class="sent-news">
            <h2>{{__('messages.newsletter_news_1')}} <span>{{__('messages.newsletter_news_2')}}</span></h2>
            <div class="social-sent">
                <a href="#/" class="social-sent_link">
                    <img src="/images/icons/viber-hover.svg" alt="img">
                    <img src="/images/icons/viber.svg" alt="img">
                    <span>
                        {{__('messages.viber')}}
                    </span>
                </a>
                <a href="#/" class="social-sent_link">
                    <img src="/images/icons/telegram-hover.svg" alt="img">
                    <img src="/images/icons/telegram.svg" alt="img">
                    <span>
                        {{__('messages.telegram')}}
                    </span>
                </a>
                <a href="#/" class="social-sent_link">
                    <img src="/images/icons/whatsapp-hover.svg" alt="img">
                    <img src="/images/icons/whatsapp.svg" alt="img">
                    <span>
                        {{__('messages.whatsapp')}}
                    </span>
                </a>
                <a href="#/" class="social-sent_link">
                    <img src="/images/icons/email-sms-hover.svg" alt="img">
                    <img src="/images/icons/email-sms.svg" alt="img">
                    <span>
                        {{__('messages.sms')}}
                    </span>
                </a>
            </div>
            <form id="subscribe-form" class="search-wrap" action="{{route('subscribe')}}" method="post">
                @csrf
                <input type="search" name="email" class="footer-search" placeholder="{{__('messages.put_email')}}">
                <button class="email-push" type="submit">
                    <span>{{__('messages.subscribe')}}</span>
                    <img src="/images/icons/push-email.svg" alt="img">
                </button>
            </form>
        </div>
    </div>
    <div class="footer-wrap">
        @widget('media_link_widget')
        <div class="mob-phone">
            <p>{{__('messages.hot_line')}}</p>
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
