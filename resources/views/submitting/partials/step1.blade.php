<div class="tabs__content ">
    <div class="tabs-item">
        <h2>Предложение <span>* обязательное поле</span></h2>
        <div class="input-case">
            <div class="select-price">
                <p>Тип часов *</p>
                <input type="hidden" name="watchType">
                <div class="select-value rotate">
                    <span>Выберите</span>
                    <ul class="value-items">
                        @foreach($watchTypes as $watchType)
                            <li>{{$watchType->title}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="select-price">
                <p>Марка *</p>
                <div class="cont">
                    <input type="text" name="brand" value="">

                    <span>
                                    Производитель не включен в список?
                                </span>
                </div>
            </div>
            <div class="select-price">
                <p>Модель *
                    <img src="/images/icons/information-icon.svg" alt="img" class="info-icon">
                    <span class="input-info">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                    Dolores earum, ipsa ipsum iste laborum nihil tempore? Ea
                                    laboriosam officiis possimus quam quas quod sed totam?
                                </span>
                </p>
                <div class="cont">
                    <input type="text" name="model" value="">
                    <span>
                                    Вы можете добавить к названию модели дополнительную
                                    информацию, например, конкретный вариант модели.
                                </span>
                </div>
            </div>
            <div class="select-price">
                <p>Идент. номер
                    <img src="/images/icons/information-icon.svg" alt="img" class="info-icon">
                    <span class="input-info">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                    Dolores earum, ipsa ipsum iste laborum nihil tempore? Ea
                                    laboriosam officiis possimus quam quas quod sed totam?
                                </span>
                </p>
                @if(isset($model_code))
                    <input type="text" name="model_code" value="{{$model_code}}">
                @else
                    <input type="text" name="model_code" value="">
                    {{--                            <div class="select-value rotate">--}}
                    {{--                                <span>Выберите</span>--}}
                    {{--                                <ul class="value-items">--}}
                    {{--                                    <li>{{$model_code}}</li>--}}
                    {{--                                    <li>0000 0000 0000 0000</li>--}}
                    {{--                                </ul>--}}
                    {{--                            </div>--}}
                @endif
            </div>
            <div class="select-price">
                <p>Состояние *
                    <img src="/images/icons/information-icon.svg" alt="img" class="info-icon">
                    <span class="input-info">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                    Dolores earum, ipsa ipsum iste laborum nihil tempore? Ea
                                    laboriosam officiis possimus quam quas quod sed totam?
                                </span>
                </p>
                <input type="hidden" name="state">
                <div class="select-value rotate">
                    <span>Выберите</span>
                    <ul class="value-items">
                        @foreach($states as $state)
                            <li>{{$state}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="select-price">
                <p>Объем доставки *
                    <img src="/images/icons/information-icon.svg" alt="img" class="info-icon">
                    <span class="input-info">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                    Dolores earum, ipsa ipsum iste laborum nihil tempore? Ea
                                    laboriosam officiis possimus quam quas quod sed totam?
                                </span>
                </p>
                <input type="hidden" name="deliveryVolume">
                <div class="select-value rotate">
                    <span>Выберите</span>
                    <ul class="value-items">
                        @foreach($deliveryVolumes as $deliveryVolume)
                            <li>{{$deliveryVolume}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <h2>Базовые данные</h2>
        <div class="select-price">
            <p>Пол</p>
            <input type="hidden" name="sex">
            <div class="select-value rotate">
                <span>Выберите</span>
                <ul class="value-items">
                    @foreach($sexes as $sex)
                        <li>{{$sex->title}}</li>
                    @endforeach
                </ul>
            </div>
        </div>


        <label for="made-watch">
            Год выпуска *
            <span class="cont-wrap">
                            <input type="text" id="made-watch" name="release_year">
                            <span class="check-cont">
                                <label class="checkbox-other">
                                    <input type="radio" name="year">
                                    <span>Приблизительно</span>
                                </label>
                                <label class="checkbox-other">
                                    <input type="radio" name="year" checked="">
                                    <span>Неизвестно</span>
                                </label>
                            </span>
                        </span>
        </label>
        <label>
            Диаметр *
            <span class="size-cont">
                            <input type="number" name="width">
                            X
                            <input type="number" name="height">
                        </span>
        </label>
        <div class="select-price">
            <p>Тип механизма</p>
            <input type="hidden" name="typeMechanism">
            <div class="select-value rotate">
                <span>Выберите</span>
                <ul class="value-items">
                    @foreach($mechanismTypes as $mechanismType)
                        <li>{{$mechanismType->title}}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        <label for="description" class="description">
            Описание
            <textarea id="description" name="description"
                      placeholder="Примеры: Где Вы купили часы?"></textarea>
        </label>

        <h2>Цена</h2>

        {{--                    <div class="info-price">--}}
        <div class="select-price">
            <p>Цена</p>
            <input type="hidden" name="price">
            <div class="input-cont-price">
                <input type="number" name="currency">
                <div class="select-value rotate">
                    <span>UA</span>
                    <ul class="value-items">
                        @foreach($currencies as $currency)
                            <li>{{$currency->title}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        {{--                        <div class="price-modal-cont">--}}
        {{--                            <div>Рекомендуемая цена: <span>4878.90 ₴</span> <img src="/images/icons/warning-lamp.svg"--}}
        {{--                                                                                 alt="img"></div>--}}
        {{--                            <p>--}}
        {{--                                Для определения актуальной стоимости ваших--}}
        {{--                                часов мы сравнили их с актуальными объявлениями на Сhrono24--}}
        {{--                            </p>--}}
        {{--                            <button class="price-chro btn-hover-w">Перенять цену</button>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}


        <div class="btn-cont btn-cont_first">
            <button class="save-edit btn-hover-w" type="submit">Сохранить как черновик</button>
            <button class="save-next btn-hover" type="submit">Перейти к шагу 2</button>
        </div>
    </div>
</div>

