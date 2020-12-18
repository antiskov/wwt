<div class="tabs__content " data-tab="3">
    <div class="tabs-item">
        <h2>Личные данные<span>* обязательное поле</span></h2>
        <label for="prof-surname-sub">
            Фамилия *
            @if($advert->surname)
                <input data-step-input type="text" id="prof-surname-sub" name="surname" value="{{$advert->surname}}">
            @else
                <input data-step-input type="text" id="prof-surname-sub" name="surname" value="{{auth()->user()->surname}}">
            @endif
        </label>
        <label for="prof-name-sub">
            Имя *
            @if($advert->name)
                <input data-step-input  type="text" id="prof-name-sub" name="name" value="{{$advert->name}}">
            @else
                <input data-step-input  type="text" id="prof-name-sub" name="name" value="{{auth()->user()->name}}">
            @endif
        </label>
{{--        <label for="calendar">--}}
{{--            Дата рождения--}}
{{--            @if($advert->birthday_date)--}}
{{--                <input data-step-input type="text" id="prof-surname-sub" name="surname" value="{{$advert->birthday_date}}">--}}
{{--            @else--}}
{{--                <input data-step-input  type="date" id="calendar" name="birthday_date" value="{{auth()->user()->birthday_date}}">--}}
{{--            @endif--}}
{{--        </label>--}}
        <label for="prof-phone">
            Телефон *
            @if($advert->phone)
                <input data-step-input name="phone" type="tel" id="prof-phone"  value="{{$advert->phone}}">
            @else
                <input data-step-input name="phone" type="tel" id="prof-phone" value="{{ auth()->user()->phone }}">
            @endif
        </label>

        <h2>Местоположение часов</h2>

        <div class="address-date">
            <h2>Адресные данные</h2>

            <!--    Двіжуха з автокомплітами       -->
            <label for="route">
                Введите ваш адрес
                <input
                    id="autocomplete"
                    placeholder="Введите ваш адрес"
                    type="text"
                />
            </label>

            <label for="route">
                Улица *
                @if($advert->street)
                    <input type="text" id="route" readonly="true" name='street' value="{{ $advert->street }}">
                @else
                    <input type="text" id="route" readonly="true" name='street' value="{{ auth()->user()->street }}">
                @endif
            </label>
            <label for="street_number">
                Адресное дополнение
                @if($advert->street_additional)
                    <input type="text" id="street_number" readonly="true" name="street_additional"
                           value="{{$advert->street_additional}}">
                @else
                    <input type="text" id="street_number" readonly="true" name="street_additional"
                           value="{{auth()->user()->street_addition}}">
                @endif
            </label>
            <label for="postal_code">
                Почтовый индекс
                @if($advert->zip_code)
                    <input type="text" id="postal_code" readonly="true" name="zip_code" value="{{$advert->zip_code}}">
                @else
                    <input type="text" id="postal_code" readonly="true" name="zip_code" value="{{auth()->user()->zip_code}}">
                @endif
            </label>
            <label for="locality">
                Населенный пункт
                @if($advert->city)
                    <input type="text" id="locality" readonly="true" name="city" value="{{$advert->city}}">
                @else
                    <input type="text" id="locality" readonly="true" name="city" value="{{auth()->user()->city}}">
                @endif
            </label>
            <label for="street_number">
                Страна *
                @if($advert->country)
                    <input type="text" id="country" readonly="true" name="country" value="{{$advert->country}}">
                @else
                    <input type="text" id="country" readonly="true" name="country" value="{{auth()->user()->country}}">
                @endif
            </label>
            <label for="street_number">
                Область
                @if($advert->region)
                    <input type="text" id="administrative_area_level_1" readonly="true" name="region" value="{{$advert->region}}">
                @else
                    <input type="text" id="administrative_area_level_1" readonly="true" name="region" value="{{auth()->user()->region}}">
                @endif
            </label>



            <!--       автокоплит, вдруг надо будет             -->
            <!--                    <div class="autocomplete-input" data-autocomplete>-->
            <!--                        <p>Область</p>-->
            <!--                        <div class="autocomplete-input__block">-->
            <!--                            <div class="autocomplete-input__holder">-->
            <!--                                <input type="text">-->
            <!--                            </div>-->
            <!--                            <div class="autocomplete-input__content">-->
            <!--                                <ul data-id="dropdownContent"></ul>-->
            <!--                            </div>-->
            <!--                        </div>-->
            <!--                    </div>-->

            <!--   Двіжуха з корами               -->
            <input type="hidden" name="lat" data-id="lat">
            <input type="hidden" name="lng" data-id="lng">

        </div>


        <div class="check-cont">
            <label class="checkbox-other">
                <input type="checkbox" name="hide_surname" checked value="1">
                <span>я не хочу, чтобы моя фамилия была указана в объявлении *</span>
            </label>
        </div>

        <div class="block-data-cont">
            <div class="text-cont">
                <h3>Ваши данные в надежных руках</h3>
                <p class="text-item">
                    Мы строго придерживаемся законов о защите информации.
                </p>
                <p class="text-item">
                    Все данные, которые Вы вносите на наш сайт, зашифрованы и передаются по
                    надежному
                    интернет соединению.
                </p>
                <div class="text-item">
                    Ваши личные данные будут использованы исключительно для продажи артикулов на
                    сайте и
                    не
                    будут опубликованы.
                    <div class="img-cont">
                        <img src="/images/icons/secure-data.svg" alt="img">
                        <img src="/images/icons/shild.svg" alt="img">
                    </div>
                </div>
            </div>
            <div class="img-cont">
                <img src="/images/icons/secure-data.svg" alt="img">
                <img src="/images/icons/shild.svg" alt="img">
            </div>
        </div>

        <div class="btn-cont step-3-cont">
            <button data-step="2" class="prev-step btn-hover" type="button">Вернуться к шагу 2</button>

            <button class="save-edit btn-hover-w" type="submit">Сохранить как черновик</button>

            <button data-step="4" data-id-adv="{{$advert->id}}" class="save-next btn-hover" type="button">Перейти к шагу 4</button>
        </div>
    </div>
</div>
