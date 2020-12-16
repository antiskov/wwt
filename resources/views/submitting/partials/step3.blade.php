<div class="tabs__content " data-tab="3">
    <div class="tabs-item">
        <h2>Личные данные<span>* обязательное поле</span></h2>
        <label for="prof-surname-sub">
            Фамилия *
            <input data-step-input type="text" id="prof-surname-sub" name="surname" value="{{auth()->user()->surname}}">
        </label>
        <label for="prof-name-sub">
            Имя *
            <input data-step-input  type="text" id="prof-name-sub" name="name" value="{{auth()->user()->name}}">
        </label>
        <label for="calendar">
            Дата рождения *
            <input data-step-input  type="date" id="calendar" name="birthday_date" value="{{auth()->user()->birthday_date}}">
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
                <input type="text" id="route" disabled="true" name='street' value="{{ auth()->user()->street }}">
            </label>
            <label for="street_number">
                Адресное дополнение
                <input type="text" id="street_number" disabled="true" name="street_addition"
                       value="{{auth()->user()->street_addition}}">
            </label>
            <label for="postal_code">
                Почтовый индекс
                <input type="text" id="postal_code" disabled="true" name="zip_code" value="{{auth()->user()->zip_code}}">
            </label>
            <label for="locality">
                Населенный пункт
                <input type="text" id="locality" disabled="true" name="city" value="{{auth()->user()->city}}">
            </label>
            <label for="street_number">
                Страна *
                <input type="text" id="country" disabled="true" name="country" value="{{auth()->user()->country}}">
            </label>
            <label for="street_number">
                Область
                <input type="text" id="administrative_area_level_1" disabled="true" name="region" value="{{auth()->user()->region}}">
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
                <input type="checkbox" checked>
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

            <button data-fancybox data-src="#save-success" class="save-edit btn-hover-w" type="submit">Сохранить как черновик</button>

            <button data-step="4" class="save-next btn-hover" type="button">Перейти к шагу 4</button>
        </div>
    </div>
</div>
