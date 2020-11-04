@extends('layouts.main')

@section('content')
    @if($role == 3 or $role == 2)
        <button><a href='{{ route('admin.delete_advert', [$advert->id]) }}'>Удалить</a></button>
        <button><a href="{{ route('admin.change_status', [3, $advert->id]) }}">Отказать</a></button>
        <button><a href="{{ route('admin.change_status', [4, $advert->id]) }}">Опубликовать</a></button>
    @endif
    <section class="item-page">
        <div class="">
            <div class="cart-info-block container">
                <div class="slider-item-page">
                    <div class="favorite-icon"></div>
                    <div class="shadow-cont">
                        <div class="swiper-container gallery-top">
                            <div class="swiper-wrapper">
                                @foreach($advert->advertImages as $advertImage)
                                    <a data-fancybox data-src="#item-page-modal" href="javascript:;"
                                       class="swiper-slide">
                                        <img src="{{asset('/storage/'.$advertImage->full_path)}}" alt="img"
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
                        <div class="item-price">{{$advert->price.' '.$advert->currency->symbol}}</div>
                    </div>

                    <div class="cont-specifications">
                        <div class="cont">
                            <p>Состояние</p>
                                <span>{{ $advert->watchAdvert->watch_state }}</span>
                        </div>
                        <div class="cont">
                            <p>Объем доставки</p>
                            <span>{{ $advert->deliveryVolume->title }}</span>
                        </div>
                        <div class="cont">
                            <p>Наличие</p>
                            <span> {{ $advert->availabilityStatus->title }}</span>
                        </div>
                    </div>
                    <div class="seller-item">
                        <div class="cont-name">
                            <h3>{{$advert->name}}</h3>
                            <a href="tel:+38{{$advert->phone}}" class="phone">+38{{$advert->phone}}</a>
                        </div>
                        <div class="img-seller">
                            <img src="{{asset('/storage/'.$advert->user->avatar)}}" alt="img">
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
                            <p>Код</p>
                            <span>{{ $advert->watchAdvert->watchModel->model_code }}</span>
                        </div>
                        <div class="setting-cont">
                            <p>Тип механизма</p>
                            <span>{{ $advert->watchAdvert->watchType->title }}</span>
                        </div>
                        <div class="setting-cont">
                            <p>Материал корпуса</p>
                            <span>{{ $advert->watchAdvert->watchMaterial->title }}</span>
                        </div>
                        <div class="setting-cont">
                            <p>Материал браслета</p>
                            <span>{{ $advert->watchAdvert->braceletMaterial->title }}</span>
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
                            <p>Объем доставки</p>
                            <span>{{$advert->deliveryVolume->title}}</span>
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
                            <span>{{$advert->watchAdvert->mechanismType->title}}</span>
                        </div>
                        <div class="setting-cont">
                            <p>Калибр/Механизм</p>
                            <span>324 SC</span>
                        </div>
                    </div>

                    <h2>Корпус</h2>
                    <div class="setting-wrap">
                        <div class="setting-cont">
                            <p>Материал корпуса</p>
                            <span>{{ $advert->watchAdvert->watchMaterial->title }}</span>
                        </div>
                        <div class="setting-cont">
                            <p>Диаметр</p>
                            <span>{{$advert->watchAdvert->diameter}} mm</span>
                        </div>
                        <div class="setting-cont">
                            <p>Cтекло</p>
                            <span>{{$advert->watchAdvert->glass->title}}</span>
                        </div>
                        <div class="setting-cont">
                            <p>Цифры</p>
                            <span>{{$advert->watchAdvert->figures}} </span>
                        </div>
                    </div>

                    <h2>Браслет/ремешок</h2>
                    <div class="setting-wrap">
                        <div class="setting-cont">
                            <p>Браслет/ремешок</p>
                            <span>{{ $advert->watchAdvert->braceletMaterial->title }}</span>
                        </div>
                    </div>

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
            <div class="tabs__content">
                <div class="container">
                    <div class="person">
                        <div class="person-prof">
                            <img src="{{asset('/storage/'.$advert->user->avatar)}} alt="img">
                        </div>
                        <div class="person-rating">
{{--                            <img src="./images/icons/stars.svg" alt="img">--}}
                            нужно будет сделать интерактивные звезды
                        </div>
                        <div class="person-name">Владимир</div>
                        <a href="tel:+38063874-69-92" class="person-phone">+38(063)874-69-92</a>
                        <div class="person-social">
                            <a href="#/"></a>
                            <a href="#/"></a>
                            <a href="#/"></a>
                        </div>
                        <div class="person-laung">
                            <p>Говорит на :</p>
                            <span>Русский</span>
                            <span>Українська</span>
                            <span>English</span>
                        </div>
                        <div class="person-address">
                            <div class="address">
                                <p>Город:</p>
                                <span>Киев</span>
                            </div>
                            <div class="address">
                                <p>Страна:</p>
                                <span>Украина</span>
                            </div>
                        </div>
                        <a href="#/" class="all-ads btn-hover-w">Все объявления продавца</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
