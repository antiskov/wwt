<div class="items-cont inline-view">
    <div class="inline-cart">
        <div class="vip-label"></div>
        <a href="{{route('catalog.item-page', [$advert->id])}}" class="img-wrap">
            <img src="{{asset('/storage/images/notice_photos/watch/number_'.$advert->id.'/small_'.$advert->photos->where('is_basic', 1)->first()->photo)}}">
        </a>
        <div class="info-cart">
            <a href="{{route('catalog.item-page', [$advert->id])}}" class="cart-name">{{$advert->title}}</a>
            <div class="info-wrap">
                <div class="block">
                    <div class="price">
                        <div class="new">
                            {{$price.' '.$advert->currency->title}}
                        </div>
                        {{--                    <div class="old">--}}
                        {{--                        1500$--}}
                        {{--                    </div>--}}
                        {{--                                <div class="rating-cont">--}}
                        {{--                                    <img src="/images/icons/star-rat.svg" alt="img">--}}
                        {{--                                    <img src="/images/icons/star-rat.svg" alt="img">--}}
                        {{--                                    <img src="/images/icons/star-rat.svg" alt="img">--}}
                        {{--                                    <img src="/images/icons/star-rat.svg" alt="img">--}}
                        {{--                                    <img src="/images/icons/star-rat.svg" alt="img">--}}
                        {{--                                </div>--}}
                    </div>
                </div>

                <div class="block-grid bord">
                    <div class="item-infos">
                        <p>{{__('messages.mechanism_type')}}: </p>
                        <span>{{$advert->watchAdvert->mechanismType->title}}</span>
                    </div>
                    <div class="item-infos">
                        <p>{{__('messages.year')}}: </p>
                        <span>{{$advert->watchAdvert->release_year}}</span>
                    </div>
                    <div class="item-infos">
                        <p>{{__('messages.state')}}: </p>
                        <span>{{$advert->watchAdvert->watch_state}}</span>
                    </div>

                    <div class="item-infos">
                        <p>{{__('messages.ii_number')}}:</p>
                        <span>{{ $advert->watchAdvert->model_code}}</span>
                    </div>

                </div>
                <div class="block-grid">
                    <div class="item-infos">
                        <p>{{__('messages.delivery_volume')}}:</p>
                        <span>{{ $advert->delivery_volume}}</span>
                    </div>
                    <div class="item-infos">
                        <p>{{__('messages.space')}}:</p>
                        <span>{{$advert->region}}</span>
                    </div>
                    <div class="item-infos">
                        <p>{{__('messages.diameter')}}:</p>
                        @if($advert->watchAdvert->height == $advert->watchAdvert->width)
                            <span>{{$advert->watchAdvert->height}}</span>
                        @else
                            <span>{{$advert->watchAdvert->height.'/'.$advert->watchAdvert->width}}</span>
                        @endif
                    </div>
                    <div class="item-infos">
                        <p>{{__('messages.sex')}}:</p>
                        <span>{{$advert->watchAdvert->sex->title}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
