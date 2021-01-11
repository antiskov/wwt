@if($advert->type == 'watch')
    <div class="">
        <div class="cart-info-block container">
            <div class="slider-item-page">
                @auth
                    @if($favorite)
                        <div id="heart" class="favorite-icon active"></div>
                    @else
                        <div id="heart" class="favorite-icon"></div>
                    @endif
                @endauth
                <div class="shadow-cont">
                    <div class="swiper-container gallery-top">
                        <div class="swiper-wrapper">
                            @foreach($advert->photos as $photo)
                                <a data-fancybox data-src="#item-page-modal" href="javascript:;"
                                   class="swiper-slide">
                                    {{--                                    <img src="{{asset('/storage/'.$advertImage->full_path)}}" alt="img"--}}
                                    {{--                                         class="swiper-slide-item">--}}
                                    <img src="{{asset('/storage/images/advert_photos/watch/number_'.$advert->id.'/'.$photo->photo)}}" alt="img"
                                         class="swiper-slide-item">
                                </a>
                            @endforeach
                        </div>
                        <!-- Add Arrows -->
                        <div class="swiper-button-next swiper-button-black"></div>
                        <div class="swiper-button-prev swiper-button-black"></div>
                    </div>
                    <div class="swiper-container gallery-thumbs">
                        <div class="swiper-wrapper">
                            @foreach($advert->advertImages as $advertImage)
                                <img src="{{asset('/storage/'.$advertImage->full_path)}}" alt="img"
                                     class="swiper-slide">
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>


            <div class="item-information">

                <h2 class="item-name">
                    {{$advert->title}}
                </h2>
                <div class="cont-price">
                    {{--                    <div class="item-price">{{$advert->price.' '.$advert->currency->symbol}}</div>--}}
                    {{--                    <div class="item-price">{{$advert->price.'$'}}</div>--}}
                    <div class="item-price">{{round($advert->price*$currency['rate']).' '.$currency['symbol']}}</div>
                </div>

                <div class="cont-specifications">
                    <div class="cont">
                        <p>Состояние</p>
                        <span>{{ $advert->watchAdvert->watch_state }}</span>
                    </div>
                    <div class="cont">
                        <p>Объем доставки</p>
                        <span>{{ $advert->delivery_volume }}</span>
                    </div>
                    <div class="cont">
                        <p>Наличие</p>
                        <span> {{ $advert->availability_status }}</span>
                    </div>
                </div>
                <div class="seller-item">
                    <div class="cont-name">
                        <h3>{{$advert->name}}{{$advert->surname}}
                            @if($advert->is_publish_surname == 1)
                                {{$advert->surname}}
                            @endif
                        </h3>
                        <div class="phone-dropdown">
                            <button class="btn-hover button-show-phone" type="submit">Показать телефон</button>
                        </div>
                    </div>
                    <div class="img-seller">
                        <img src="{{asset((new \App\Services\ProfileService())->getAvatar($user->id))}}" alt="img">
                    </div>
                </div>
                <button class="call-seller btn-hover">Связатся с продавцом</button>
            </div>
        </div>
    </div>
    <div class="tabs-mess">
        <div class="bg-color">
            <ul class="tabs__caption">
                <li class="active">Характеристики</li>
                <li>Описание</li>
                <li><span>подробнее </span> О продавце</li>
            </ul>
        </div>

        <div class="tabs__content active">
            <div class="container">
                <h2>Базовые данные</h2>
                <div class="setting-wrap">
                    <div class="setting-cont">
                        <p>Номер объявления</p>
                        <span>{{ $advert->id }}</span>
                    </div>
                    <div class="setting-cont">
                        <p>Идентификационный номер</p>
                        <span>{{ $advert->watchAdvert->model_code }}</span>
                    </div>
                    <div class="setting-cont">
                        <p>Марка</p>
                        <span>{{ $advert->watchAdvert->watchMake->title }}</span>
                    </div>
                    <div class="setting-cont">
                        <p>Модель</p>
                        <span>{{ $advert->watchAdvert->watchModel->title }}</span>
                    </div>
                    <div class="setting-cont">
                        <p>Тип механизма</p>
                        <span>{{ $advert->watchAdvert->mechanismType->title }}</span>
                    </div>
                    <div class="setting-cont">
                        <p>Год</p>
                        <span>2019</span>
                    </div>
                    <div class="setting-cont">
                        <p>Состояние</p>
                        <span>{{ $advert->watchAdvert->watch_state }}</span>
                    </div>
                    <div class="setting-cont">
                        <p>Пол</p>
                        <span>{{ $advert->watchAdvert->sex->title}}</span>
                    </div>
                    <div class="setting-cont">
                        <p>Объем доставки</p>
                        <span>{{$advert->delivery_volume}}</span>
                    </div>
                    <div class="setting-cont">
                        <p>Местоположение</p>
                        <span>{{$advert->country}}</span>
                    </div>
                </div>

                <h2>Калибр</h2>
                <div class="setting-wrap">
                    <div class="setting-cont">
                        <p>Тип механизма</p>
                        <span>{{$mechanismType}}</span>
                    </div>
                    {{--                    <div class="setting-cont">--}}
                    {{--                        <p>Калибр/Механизм</p>--}}
                    {{--                        <span>324 SC</span>--}}
                    {{--                    </div>--}}
                </div>

                {{--                <h2>Корпус</h2>--}}
                {{--                <div class="setting-wrap">--}}
                {{--                    --}}{{--                        <div class="setting-cont">--}}
                {{--                    --}}{{--                            <p>Диаметр</p>--}}
                {{--                    --}}{{--                            <span>{{$advert->watchAdvert->diameter}} mm</span>--}}
                {{--                    --}}{{--                        </div>--}}
                {{--                </div>--}}

                {{--                <h2>Браслет/ремешок</h2>--}}
                {{--                <div class="setting-wrap">--}}
                {{--                </div>--}}

            </div>
        </div>
        <div class="tabs__content">
            <div class="container">
                <h2>
                    Базовые данные
                </h2>
                <p>
                    {{$advert->description}}
                </p>
            </div>
        </div>

@elseif($advert->type == 'accessories')
    {{--            <div class="">--}}
    {{--                <div class="cart-info-block container">--}}
    {{--                    <div class="slider-item-page">--}}
    {{--                        @if($favorite)--}}
    {{--                            <div id="heart" class="favorite-icon active"></div>--}}
    {{--                        @else--}}
    {{--                            <div id="heart" class="favorite-icon"></div>--}}
    {{--                        @endif--}}
    {{--                        <div class="shadow-cont">--}}
    {{--                            <div class="swiper-container gallery-top">--}}
    {{--                                <div class="swiper-wrapper">--}}
    {{--                                    @foreach($advert->advertImages as $advertImage)--}}
    {{--                                        <a data-fancybox data-src="#item-page-modal" href="javascript:;"--}}
    {{--                                           class="swiper-slide">--}}
    {{--                                            <img src="{{asset('/storage/'.$advertImage->full_path)}}" alt="img"--}}
    {{--                                                 class="swiper-slide-item">--}}
    {{--                                        </a>--}}
    {{--                                    @endforeach--}}
    {{--                                </div>--}}
    {{--                                <!-- Add Arrows -->--}}
    {{--                                <div class="swiper-button-next swiper-button-black"></div>--}}
    {{--                                <div class="swiper-button-prev swiper-button-black"></div>--}}
    {{--                            </div>--}}
    {{--                            <div class="swiper-container gallery-thumbs">--}}
    {{--                                <div class="swiper-wrapper">--}}
    {{--                                    @foreach($advert->advertImages as $advertImage)--}}
    {{--                                        <img src="{{asset('/storage/'.$advertImage->full_path)}}" alt="img"--}}
    {{--                                             class="swiper-slide">--}}
    {{--                                    @endforeach--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}


    {{--                    <div class="item-information">--}}

    {{--                        <h2 class="item-name">--}}
    {{--                            {{$advert->title}}--}}
    {{--                        </h2>--}}
    {{--                        <div class="cont-price">--}}
    {{--                            <div class="item-price">{{$advert->price.' '.$advert->currency->symbol}}</div>--}}
    {{--                        </div>--}}

    {{--                        <div class="cont-specifications">--}}
    {{--                            <div class="cont">--}}
    {{--                                <p>Состояние</p>--}}
    {{--                                <span>{{ $advert->accessoryAdvert->accessory_state }}</span>--}}
    {{--                            </div>--}}
    {{--                            <div class="cont">--}}
    {{--                                <p>Объем доставки</p>--}}
    {{--                                <span>{{ $advert->delivery_volume }}</span>--}}
    {{--                            </div>--}}
    {{--                            <div class="cont">--}}
    {{--                                <p>Наличие</p>--}}
    {{--                                <span> {{ $advert->availability_status }}</span>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                        <div class="seller-item">--}}
    {{--                            <div class="cont-name">--}}
    {{--                                <h3>{{$advert->name}}</h3>--}}
    {{--                                <a href="tel:+38{{$advert->phone}}" class="phone">+38{{$advert->phone}}</a>--}}
    {{--                            </div>--}}
    {{--                            <div class="img-seller">--}}
    {{--                                <img src="{{asset('/storage/'.$advert->user->avatar)}}" alt="img">--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                        <button class="call-seller btn-hover">Связатся с продавцом</button>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--            <div class="tabs-mess">--}}
    {{--                <div class="bg-color">--}}
    {{--                    <ul class="tabs__caption">--}}
    {{--                        <li class="active">Характеристики</li>--}}
    {{--                        <li>Описание</li>--}}
    {{--                        <li><span>подробнее </span> О продавце</li>--}}
    {{--                        <li>Подходит для</li>--}}
    {{--                    </ul>--}}
    {{--                </div>--}}

    {{--                <div class="tabs__content active">--}}
    {{--                    <div class="container">--}}
    {{--                        <h2>Базовые данные</h2>--}}
    {{--                        <div class="setting-wrap">--}}
    {{--                            <div class="setting-cont">--}}
    {{--                                <p>Номер объявления</p>--}}
    {{--                                <span>{{ $advert->id }}</span>--}}
    {{--                            </div>--}}
    {{--                            <div class="setting-cont">--}}
    {{--                                <p>Идентификационный номер</p>--}}
    {{--                                <span>{{ $advert->accessoryAdvert->model_code }}</span>--}}
    {{--                            </div>--}}
    {{--                            <div class="setting-cont">--}}
    {{--                                <p>Марка</p>--}}
    {{--                                <span>{{ $advert->accessoryAdvert->accessoryMake->title }}</span>--}}
    {{--                            </div>--}}
    {{--                            <div class="setting-cont">--}}
    {{--                                <p>Модель</p>--}}
    {{--                                <span>{{ $advert->accessoryAdvert->accessoryModel->title }}</span>--}}
    {{--                            </div>--}}
    {{--                            <div class="setting-cont">--}}
    {{--                                <p>Код</p>--}}
    {{--                                <span>{{ $advert->accessoryAdvert->accessoryModel->model_code }}</span>--}}
    {{--                            </div>--}}
    {{--                            <div class="setting-cont">--}}
    {{--                                <p>Тип механизма</p>--}}
    {{--                                <span>{{ $advert->accessoryAdvert->accessoryMechanismType->title }}</span>--}}
    {{--                            </div>--}}
    {{--                            <div class="setting-cont">--}}
    {{--                                <p>Год</p>--}}
    {{--                                <span>2019</span>--}}
    {{--                            </div>--}}
    {{--                            <div class="setting-cont">--}}
    {{--                                <p>Состояние</p>--}}
    {{--                                <span>{{ $advert->accessoryAdvert->accessory_state }}</span>--}}
    {{--                            </div>--}}
    {{--                            <div class="setting-cont">--}}
    {{--                                <p>Объем доставки</p>--}}
    {{--                                <span>{{$advert->delivery_volume}}</span>--}}
    {{--                            </div>--}}
    {{--                            <div class="setting-cont">--}}
    {{--                                <p>Местоположение</p>--}}
    {{--                                <span>{{$advert->country}}</span>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}

    {{--                    </div>--}}
    {{--                </div>--}}
    {{--                <div class="tabs__content">--}}
    {{--                    <div class="container">--}}
    {{--                        <h2>--}}
    {{--                            Базовые данные--}}
    {{--                        </h2>--}}
    {{--                        <p>--}}
    {{--                            {{$advert->description}}--}}
    {{--                        </p>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--@else--}}
    {{--                    <div class="">--}}
    {{--                        <div class="cart-info-block container">--}}
    {{--                            <div class="slider-item-page">--}}
    {{--                                @if($favorite)--}}
    {{--                                    <div id="heart" class="favorite-icon active"></div>--}}
    {{--                                @else--}}
    {{--                                    <div id="heart" class="favorite-icon"></div>--}}
    {{--                                @endif--}}
    {{--                                <div class="shadow-cont">--}}
    {{--                                    <div class="swiper-container gallery-top">--}}
    {{--                                        <div class="swiper-wrapper">--}}
    {{--                                            @foreach($advert->advertImages as $advertImage)--}}
    {{--                                                <a data-fancybox data-src="#item-page-modal" href="javascript:;"--}}
    {{--                                                   class="swiper-slide">--}}
    {{--                                                    <img src="{{asset('/storage/'.$advertImage->full_path)}}" alt="img"--}}
    {{--                                                         class="swiper-slide-item">--}}
    {{--                                                </a>--}}
    {{--                                            @endforeach--}}
    {{--                                        </div>--}}
    {{--                                        <!-- Add Arrows -->--}}
    {{--                                        <div class="swiper-button-next swiper-button-black"></div>--}}
    {{--                                        <div class="swiper-button-prev swiper-button-black"></div>--}}
    {{--                                    </div>--}}
    {{--                                    <div class="swiper-container gallery-thumbs">--}}
    {{--                                        <div class="swiper-wrapper">--}}
    {{--                                            @foreach($advert->advertImages as $advertImage)--}}
    {{--                                                <img src="{{asset('/storage/'.$advertImage->full_path)}}" alt="img"--}}
    {{--                                                     class="swiper-slide">--}}
    {{--                                            @endforeach--}}
    {{--                                        </div>--}}
    {{--                                    </div>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}


    {{--                            <div class="item-information">--}}

    {{--                                <h2 class="item-name">--}}
    {{--                                    {{$advert->title}}--}}
    {{--                                </h2>--}}
    {{--                                <div class="cont-price">--}}
    {{--                                    <div class="item-price">{{$advert->price.' '.$advert->currency->symbol}}</div>--}}
    {{--                                </div>--}}

    {{--                                <div class="cont-specifications">--}}
    {{--                                    <div class="cont">--}}
    {{--                                        <p>Состояние</p>--}}
    {{--                                        <span>{{ $advert->sparePartsAdvert->spare_parts_state }}</span>--}}
    {{--                                    </div>--}}
    {{--                                    <div class="cont">--}}
    {{--                                        <p>Объем доставки</p>--}}
    {{--                                        <span>{{ $advert->delivery_volume }}</span>--}}
    {{--                                    </div>--}}
    {{--                                    <div class="cont">--}}
    {{--                                        <p>Наличие</p>--}}
    {{--                                        <span> {{ $advert->availability_status }}</span>--}}
    {{--                                    </div>--}}
    {{--                                </div>--}}
    {{--                                <div class="seller-item">--}}
    {{--                                    <div class="cont-name">--}}
    {{--                                        <h3>{{$advert->name}}</h3>--}}
    {{--                                        <a href="tel:+38{{$advert->phone}}" class="phone">+38{{$advert->phone}}</a>--}}
    {{--                                    </div>--}}
    {{--                                    <div class="img-seller">--}}
    {{--                                        <img src="{{asset('/storage/'.$advert->user->avatar)}}" alt="img">--}}
    {{--                                    </div>--}}
    {{--                                </div>--}}
    {{--                                <button class="call-seller btn-hover">Связатся с продавцом</button>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                    <div class="tabs-mess">--}}
    {{--                        <div class="bg-color">--}}
    {{--                            <ul class="tabs__caption">--}}
    {{--                                <li class="active">Характеристики</li>--}}
    {{--                                <li>Описание</li>--}}
    {{--                                <li><span>подробнее </span> О продавце</li>--}}
    {{--                                <li>Подходит для</li>--}}
    {{--                            </ul>--}}
    {{--                        </div>--}}

    {{--                        <div class="tabs__content active">--}}
    {{--                            <div class="container">--}}
    {{--                                <h2>Базовые данные</h2>--}}
    {{--                                <div class="setting-wrap">--}}
    {{--                                    <div class="setting-cont">--}}
    {{--                                        <p>Номер объявления</p>--}}
    {{--                                        <span>{{ $advert->id }}</span>--}}
    {{--                                    </div>--}}
    {{--                                    <div class="setting-cont">--}}
    {{--                                        <p>Идентификационный номер</p>--}}
    {{--                                        <span>{{ $advert->sparePartsAdvert->model_code }}</span>--}}
    {{--                                    </div>--}}
    {{--                                    <div class="setting-cont">--}}
    {{--                                        <p>Марка</p>--}}
    {{--                                        <span>{{ $advert->sparePartsAdvert->sparePartsMake->title }}</span>--}}
    {{--                                    </div>--}}
    {{--                                    <div class="setting-cont">--}}
    {{--                                        <p>Модель</p>--}}
    {{--                                        <span>{{ $advert->sparePartsAdvert->sparePartsModel->title }}</span>--}}
    {{--                                    </div>--}}
    {{--                                    <div class="setting-cont">--}}
    {{--                                        <p>Код</p>--}}
    {{--                                        <span>{{ $advert->sparePartsAdvert->sparePartsModel->model_code }}</span>--}}
    {{--                                    </div>--}}
    {{--                                    <div class="setting-cont">--}}
    {{--                                        <p>Тип механизма</p>--}}
    {{--                                        <span>{{ $advert->sparePartsAdvert->sparePartsMechanismType->title }}</span>--}}
    {{--                                    </div>--}}
    {{--                                    <div class="setting-cont">--}}
    {{--                                        <p>Год</p>--}}
    {{--                                        <span>2019</span>--}}
    {{--                                    </div>--}}
    {{--                                    <div class="setting-cont">--}}
    {{--                                        <p>Состояние</p>--}}
    {{--                                        <span>{{ $advert->sparePartsAdvert->spare_parts_state }}</span>--}}
    {{--                                    </div>--}}
    {{--                                    <div class="setting-cont">--}}
    {{--                                        <p>Объем доставки</p>--}}
    {{--                                        <span>{{$advert->delivery_volume}}</span>--}}
    {{--                                    </div>--}}
    {{--                                    <div class="setting-cont">--}}
    {{--                                        <p>Местоположение</p>--}}
    {{--                                        <span>{{$advert->country}}</span>--}}
    {{--                                    </div>--}}
    {{--                                </div>--}}

    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                        <div class="tabs__content">--}}
    {{--                            <div class="container">--}}
    {{--                                <h2>--}}
    {{--                                    Базовые данные--}}
    {{--                                </h2>--}}
    {{--                                <p>--}}
    {{--                                    {{$advert->description}}--}}
    {{--                                </p>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
@endif
