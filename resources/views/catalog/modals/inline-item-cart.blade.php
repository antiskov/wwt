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
                    @if($modelAdvert = \App\Models\Advert::find($advert->id))
                        @isset($modelAdvert->photos->where('is_basic', 1)->first()->photo)
                            <div class="img-wrap__content">
                                <img src="{{asset('/storage/images/notice_photos/'.$modelAdvert->type.'/number_'.$advert->id.'/small_'.$modelAdvert->photos->where('is_basic', 1)->first()->photo)}}">
                            </div>
                        @endisset
                    @endif
                </a>
                <div class="info-cart">
                    <a href="{{route('catalog.item-page', [$advert->id])}}" class="cart-name">{{$advert->title}}</a>
                    <div class="info-wrap">
                        <div class="block">
                            <div class="price">
                                <div class="new">
                                    {{round($advert->price*$currency['rate']).' '.$currency['symbol']}}
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
                                <span>{{$advert->mechanism_type_title}}</span>
                            </div>
                            <div class="item-infos">
                                <p>{{__('messages.year')}}: </p>
                                <span>{{$advert->release_year}}</span>
                            </div>
                            <div class="item-infos">
                                <p>{{__('messages.state')}}: </p>
                                <span>{{ $advert->watch_state }}</span>
                            </div>

                            <div class="item-infos">
                                <p>{{__('messages.ii_number')}}:</p>
                                <span>{{ $advert->model_code}}</span>
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
                                @if($advert->height == $advert->width)
                                    <span>{{$advert->height}}</span>
                                @else
                                    <span>{{$advert->height.'/'.$advert->width}}</span>
                                @endif
                            </div>
                            <div class="item-infos">
                                <p>{{__('messages.sex')}}:</p>
                                <span>{{ $advert->sex_title}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
</div>

