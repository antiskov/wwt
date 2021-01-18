<div class="social-cont">
    <h2>Мы в соцсетях</h2>
    <div class="social-wrap">
        @foreach($mediaLinks as $mediaLink)
            <a href="http://{{$mediaLink->link_address}}" class="social-wrap_link" target="_blank">
                <img src="/images/icons/{{$mediaLink->path}}" alt="img">
            </a>
        @endforeach
    </div>
    <div class="hot-line">
        <p>Горячая линия </p>
        <a href="tel:+49721906693">+49 721 906693</a>
    </div>
</div>
<div class="application-cont">
    <h2>Приложение</h2>
    <div class="store-cont">
        <div class="stores">
            @foreach($mediaImages as $mediaImage)
            <a href="http://{{$mediaImage->link_address}}" class="google-play" target="_blank">
                <img src="/images/content/{{$mediaImage->path}}" alt="google">
            </a>
            @endforeach
        </div>
        <a data-fancybox href="#advertisement-modal" class="order-advert">
            <div class="text-block">
                <p>Заказать рекламу на нашем сайте</p>
                <!--                        <p></p>-->
            </div>
            <img src="/images/content/reclama-footer.png" alt="img" class="adv-img">
        </a>
    </div>
</div>
