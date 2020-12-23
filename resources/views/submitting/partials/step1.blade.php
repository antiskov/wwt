<div class="tabs__content active" data-tab="1">
    <div class="tabs-item">
        <h2>Предложение <span>* обязательное поле</span></h2>
        <div class="input-case">
            <div class="select-price">
                <p>Тип часов *</p>
                @if($position == 1)
                    <input type="hidden" name="watchType" value="{{$advert->watchAdvert->watchType->title}}">
                    <div class="select-value rotate">
                        <span>{{$advert->watchAdvert->watchType->title}}</span>
                @else
                    <input type="hidden" name="watchType">
                    <div class="select-value rotate">
                        <span>Выберите</span>
                @endif
                    <ul class="value-items">
                        @foreach($watchTypes as $watchType)
                            <li>{{$watchType->title}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="select-price">
            </div>
            <div class="select-price">
                <p>Марка *</p>
                @if($position == 1)
                    <input data-step-input class="common-input" type="text" name="brand" value="{{$advert->watchAdvert->watchMake->title}}">
                @else
                    <input data-step-input class="common-input" type="text" name="brand" value="">
                @endif
            </div>
            <div class="select-price">
                <p class="ai-fe">Модель *
                    <img src="/images/icons/information-icon.svg" alt="img" class="info-icon">
                    <span class="input-info">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                    Dolores earum, ipsa ipsum iste laborum nihil tempore? Ea
                                    laboriosam officiis possimus quam quas quod sed totam?
                                </span>
                </p>
                @if($position == 1)
                    <input data-step-input class="common-input" type="text" name="model" value="{{$advert->watchAdvert->watchModel->title}}">
                @else
                    <input data-step-input class="common-input" type="text" name="model" value="">
                @endif
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
                    <input data-step-input type="text" class="common-input" name="model_code" value="{{$model_code}}">
                @else
                    <input data-step-input type="text" class="common-input" name="model_code" value="">
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
                @if($position == 1)
                    <input type="hidden" name="state" value="{{$advert->watchAdvert->watch_state}}">
                    <div class="select-value rotate">
                        <span>{{$advert->watchAdvert->watch_state}}</span>
                @else
                    <input type="hidden" name="state">
                    <div class="select-value rotate">
                        <span>Выберите</span>
                @endif
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
                @if($position == 1)
                    <input type="hidden" name="deliveryVolume" value="{{$advert->delivery_volume}}">
                    <div class="select-value rotate">
                        <span>{{$advert->delivery_volume}}</span>
                @else
                    <input type="hidden" name="deliveryVolume">
                    <div class="select-value rotate">
                        <span>Выберите</span>
                @endif
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
            @if($position == 1)
                <input type="hidden" name="sex" value="{{$advert->watchAdvert->sex->title}}">
                <div class="select-value rotate">
                    <span>{{$advert->watchAdvert->sex->title}}</span>
            @else
                <input type="hidden" name="sex">
                <div class="select-value rotate">
                    <span>Выберите</span>
            @endif
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
                @if($position == 1)
                    <input data-step-input type="text" id="made-watch" name="release_year" value="{{$advert->watchAdvert->release_year}}">
                @else
                    <input data-step-input type="text" id="made-watch" name="release_year">
                @endif
                    @if($position == 1 && $advert->watchAdvert->is_release_year_confirmed == 1)
                        <span class="check-cont">
                                <label class="checkbox-other">
                                    <input type="radio" name="year" checked value="1">
                                    <span>Приблизительно</span>
                                </label>
                                <label class="checkbox-other">
                                    <input type="radio" name="year" value="0">
                                    <span>Неизвестно</span>
                                </label>
                            </span>
                    @else
                        <span class="check-cont">
                                <label class="checkbox-other">
                                    <input type="radio" name="year" value="1">
                                    <span>Приблизительно</span>
                                </label>
                                <label class="checkbox-other">
                                    <input type="radio" name="year" checked value="0">
                                    <span>Неизвестно</span>
                                </label>
                            </span>
                    @endif
        </label>
        <label>
            Диаметр *
            <span class="size-cont">
                @if($position == 1)
                    <input data-step-input type="number" name="width" value="{{$advert->watchAdvert->width}}">
                    X
                    <input data-step-input type="number" name="height" value="{{$advert->watchAdvert->height}}">
                @else
                            <input data-step-input type="number" name="width">
                            X
                            <input data-step-input type="number" name="height">
                        </span>
            @endif
        </label>
        <div class="select-price">
            <p>Тип механизма</p>
            @if($position == 1)
                <input type="hidden" name="typeMechanism" value="{{$advert->watchAdvert->mechanismType->title}}">
                <div class="select-value rotate">
                    <span>{{$advert->watchAdvert->mechanismType->title}}</span>
            @else
                <input type="hidden" name="typeMechanism">
                <div class="select-value rotate">
                    <span>Выберите</span>
            @endif
                <ul class="value-items">
                    @foreach($mechanismTypes as $mechanismType)
                        <li>{{$mechanismType->title}}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        <label for="description" class="description">
            Описание
            @if($position == 1)
                <textarea id="description" name="description"
                          placeholder="Примеры: Где Вы купили часы?">{{$advert->description}}</textarea>
            @else
            <textarea id="description" name="description"
                      placeholder="Примеры: Где Вы купили часы?"></textarea>
            @endif
        </label>

        <h2>Цена</h2>

        <div class="info-price">
            @if($position == 1)
                <input data-step-input class="common-input" type="text" name="price" value="{{$price}}">
            @else
                <input data-step-input class="common-input" type="text" name="price">
            @endif
            <div class="select-price">
                <div class="input-cont-price">
                @if($position == 1)
                    <input type="hidden" name="currency" value="{{$advert->currency->title}}">
                    <div class="select-value rotate">
                        <span>{{$advert->currency->title}}</span>
                @else
                    <input type="hidden" name="currency">
                    <div class="select-value rotate">
                        <span>Выберите</span>
                @endif
                    <ul class="value-items">
                        @foreach($currencies as $currency)
                            <li>{{$currency->title}}</li>
                        @endforeach
                    </ul>
                </div>
                </div>
            </div>
        </div>
        <div class="btn-cont btn-cont_first">
            @if(isset($advert))
                <button class="save-edit btn-hover-w" type="submit">Сохранить как черновик</button>
                <button data-step="2" class="save-next btn-hover" type="button">Перейти к шагу 2</button>
            @else
                <button class="save-edit btn-hover-w" type="submit">Сохранить как черновик</button>
            @endif
        </div>
    </div>

</div>

