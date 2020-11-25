<div id="content-2" class="items-block">
    @foreach($adverts as $advert)
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
                    <img src="{{asset('/storage/'.$advert->photo)}}" alt="img">
                </a>
                <div class="info-cart">
                    <a href="#/" class="cart-name">{{$advert->title}}</a>
                    <div class="info-wrap">
                        <div class="block">
                            <div class="price">
                                <div class="new">
                                    {{$advert->price}}$
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
                                <span>{{$advert->mechanism_type_title}}</span>
                            </div>
                            <div class="item-infos">
                                <p>Год: </p>
                                <span>{{$advert->release_year}}</span>
                            </div>
                            <div class="item-infos">
                                <p>Состояние: </p>
                                <span>{{ $advert->watch_state }}</span>
                            </div>

                            <div class="item-infos">
                                <p>ИИ номер:</p>
                                <span>{{ $advert->model_code}}</span>
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
                                @if($advert->height == $advert->width)
                                    <span>{{$advert->height.' ('.$advert->count_height.')'}}</span>
                                @else
                                    <span>{{$advert->height.'/'.$advert->width}}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
</div>

