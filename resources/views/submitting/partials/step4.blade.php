<div class="tabs-item">
    <h2>Личные данные<span>* обязательное поле</span></h2>
    <p class="tabs-item__subtitle">предварительный просмотр</p>
    @include('submitting.partials.preview_item_cart')

    <div class="ad-cost">
        <div class="ad-cost__price-block">
            <h2>Стоимость объявления</h2>
            <div class="ad-cost-price ad-cost__price">
                <ul class="ad-cost-price__list">
                    <li>
                        <p>Стоимость объявления</p>
                        <p>0.00 ₴</p>
                    </li>
                    <li>
                        <p>Срок публикации объявления</p>
                        <p>3 месяца</p>
                    </li>
                </ul>
            </div>
        </div>

{{--        <input type="hidden" data-step-input>--}}

        <div class="sale-premium ad-cost__sale-premium">
            <h5 class="sale-premium__title">Быстрая продажа при помощи объявления Premium</h5>
            <p class="sale-premium__price">45</p>

            <ul class="sale-premium__list">
                <li>Метка VIP увеличит Ваши шансы на продажу.</li>
                <li>Метка VIP увеличит Ваши шансы на продажу.</li>
            </ul>
        </div>

        <div class="rules-user ad-cost__rules-user">
            <h5 class="rules-user__title">Правила для пользователей World Watch Trade</h5>
            <ul class="rules-user__list">
                <li>Продавцы обязаны немедлено сообщить об успешных продажах.</li>
                <li>Втечении 3 месяцев артикул не разрешено продавать другим способом.</li>
                <li>Не разрешено предлагать подделки и реплики.</li>
                <li>Вы можете бесплатно опубликовать объявление на World Watch Trade. После
                    успешной
                    продажи Вам в счет будет выставлена комиссия.
                </li>
            </ul>
        </div>
    </div>
    <h3><a href="{{route('submitting.buy_vip', $advert)}}">Купить ВИП</a></h3>

{{--    <div class="checkbox-block checkbox-block_submitting-page">--}}
{{--        <label class="checkbox-block__label">--}}
{{--            <input type="checkbox" name="Victorinox"--}}
{{--                   value="Nouvelle Horlogerie Calabrese (NHC)">--}}
{{--            <p><span>я не хочу, чтобы моя фамилия была указана в объявлении</span></p>--}}
{{--        </label>--}}
{{--    </div>--}}

    <div class="btn-cont step-4-cont">
        <button data-step="3" class="prev-step btn-hover" type="button">Вернуться к шагу 3</button>

        <button class="save-edit btn-hover-w" type="submit">Сохранить как черновик</button>

        <button id="publish" class="save-next btn-hover" type="button"> <a href="{{route('submitting.publish', $advert)}}">Опубликовать</a></button>
    </div>
</div>
<script>
    document.querySelector('#publish').onclick = function () {
        $.ajax({
            data: $('#create_advert').serializeArray(),
            type: 'post',
            url:"/submitting/draft/{{$advert->id}}",
        })
    }
</script>
