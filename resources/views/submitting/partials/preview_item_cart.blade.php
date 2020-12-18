<div class="items-cont inline-view">
    <div class="inline-cart">
        <div class="vip-label"></div>
        @auth
            @if(\App\Models\UserFavoriteAdvert::where('user_id', auth()->user()->id)->where('advert_id', $advert->id)->first())
                <div class="favorite-icon active catalog-heart" data-id="{{$advert->id}}"></div>
            @else
                <div class="favorite-icon catalog-heart" data-id="{{$advert->id}}"></div>
            @endif
        @endauth
        <a href="{{route('catalog.item-page', [$advert->id])}}" class="img-wrap">
            <img src="{{asset('/storage/images/advert_photos/watch/number_'.$advert->id.'/'.$advert->photos->where('is_basic', 1)->first()->photo)}}">
        </a>
        <div class="info-cart">
            <a href="{{route('catalog.item-page', [$advert->id])}}" class="cart-name">{{$advert->title}}</a>
            <div class="info-wrap">
                <div class="block">
                    <div class="price">
                        <div class="new">
                            {{$advert->getPrice().' '.$advert->currency->title}}
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
                        <p>Тип механизма: </p>
                        <span>{{$advert->watchAdvert->mechanismType->title}}</span>
                    </div>
                    <div class="item-infos">
                        <p>Год: </p>
                        <span>{{$advert->watchAdvert->release_year}}</span>
                    </div>
                    <div class="item-infos">
                        <p>Состояние: </p>
                        <span>{{$advert->watchAdvert->watch_state}}</span>
                    </div>

                    <div class="item-infos">
                        <p>ИИ номер:</p>
                        <span>{{ $advert->watchAdvert->model_code}}</span>
                    </div>

                </div>
                <div class="block-grid">
                    <div class="item-infos">
                        <p>Объем доставки:</p>
                        <span>{{ $advert->delivery_volume}}</span>
                    </div>
                    <div class="item-infos">
                        <p>Местоположение:</p>
                        <span>{{$advert->region}}</span>
                    </div>
                    <div class="item-infos">
                        <p>Диаметр:</p>
                        @if($advert->watchAdvert->height == $advert->watchAdvert->width)
                            <span>{{$advert->watchAdvert->height}}</span>
                        @else
                            <span>{{$advert->watchAdvert->height.'/'.$advert->watchAdvert->width}}</span>
                        @endif
                    </div>
                    <div class="item-infos">
                        <p>Пол:</p>
                        <span>{{$advert->watchAdvert->sex->title}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
