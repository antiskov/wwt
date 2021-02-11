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
                            <a href="javascript:;"
                               class="swiper-slide">
                                <img
                                    src="{{asset('/storage/images/notice_photos/watch/number_'.$advert->id.'/'.$photo->photo)}}"
                                    alt="img"
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
                    <p>{{__('messages.state')}}</p>
                    <span>{{ $advert->watchAdvert->watch_state }}</span>
                </div>
                <div class="cont">
                    <p>{{__('messages.delivery_volume')}}</p>
                    <span>{{ $advert->deliveryVolume->title }}</span>
                </div>
                {{--                    <div class="cont">--}}
                {{--                        <p>Наличие</p>--}}
                {{--                        <span> {{ $advert->availability_status }}</span>--}}
                {{--                    </div>--}}
            </div>
            <div class="seller-item">
                <div class="cont-name">
                    <h3>{{$advert->name}}{{$advert->surname}}
                        @if($advert->is_publish_surname == 1)
                            {{$advert->surname}}
                        @endif
                    </h3>
                    <div class="phone-dropdown">
                        <button class="btn-hover button-show-phone" type="submit">{{__('messages.show_phone')}}</button>
                    </div>
                </div>
                <div class="img-seller">
                    <img src="{{asset($linkAvatar)}}" alt="img">
                </div>
            </div>
            <button id="contact_to_seller" class="call-seller btn-hover">{{__('messages.connect_with_seller')}}</button>
        </div>
    </div>
</div>
<div class="tabs-mess">
    <div class="bg-color">
        <ul class="tabs__caption">
            <li class="active">{{__('messages.parameters')}}</li>
            <li>{{__('messages.description')}}</li>
            <li><span>{{__('messages.more_detail')}}</span> {{__('messages.about_seller')}}</li>
        </ul>
    </div>

    <div class="tabs__content active">
        <div class="container">
            <h2>{{__('messages.common_data')}}</h2>
            <div class="setting-wrap">
                <div class="setting-cont">
                    <p>{{__('messages.advert_id')}}</p>
                    <span>{{ $advert->id }}</span>
                </div>
                <div class="setting-cont">
                    <p>{{__('messages.ii_number')}}</p>
                    <span>{{ $advert->watchAdvert->model_code }}</span>
                </div>
                <div class="setting-cont">
                    <p>{{__('messages.brand')}}</p>
                    <span>{{ $advert->watchAdvert->watchMake->title }}</span>
                </div>
                <div class="setting-cont">
                    <p>{{__('messages.model')}}</p>
                    <span>{{ $advert->watchAdvert->watchModel->title }}</span>
                </div>
                <div class="setting-cont">
                    <p>{{__('messages.watch_type')}}</p>
                    <span>{{ $advert->watchAdvert->watchType->title }}</span>
                </div>
                <div class="setting-cont">
                    <p>{{__('messages.year')}}</p>
                    <span>{{$advert->watchAdvert->release_year}}</span>
                </div>
                <div class="setting-cont">
                    <p>{{__('messages.state')}}</p>
                    <span>{{ $advert->watchAdvert->watch_state }}</span>
                </div>
                <div class="setting-cont">
                    <p>{{__('messages.sex')}}</p>
                    <span>{{ $advert->watchAdvert->sex->title}}</span>
                </div>
                <div class="setting-cont">
                    <p>{{__('messages.delivery_volume')}}</p>
                    <span>{{$advert->deliveryVolume->title}}</span>
                </div>
                <div class="setting-cont">
                    <p>{{__('messages.space')}}</p>
                    <span>{{$advert->country}}</span>
                </div>
                <div class="setting-cont">
                    <p>{{__('messages.mechanism_type')}}</p>
                    <span>{{$mechanismType}}</span>
                </div>
            </div>

        </div>
    </div>
    <div class="tabs__content">
        <div class="container">
            <h2>
                {{$advert->title}}
            </h2>
            <p>
                {{$advert->description}}
            </p>
        </div>
    </div>
