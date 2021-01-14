@foreach($adverts as $advert)
    <div class="item-cont">
        <div class="item-cart">
            <div class="vip-label"></div>
            @if((\App\Models\UserFavoriteAdvert::where('user_id', auth()->user()->id)->where('advert_id', $advert->id)->first()))
                <div class="favorite-icon active catalog-heart" data-id="{{$advert->id}}"></div>
            @else
                <div class="favorite-icon catalog-heart" data-id="{{$advert->id}}"></div>
            @endif

            <a href="{{route('catalog.item-page', [$advert->id])}}" class="img-wrap">
                @isset($advert->photos->where('is_basic', 1)->first()->photo)
                    <img
                        src="{{asset('/storage/images/notice_photos/'.$advert->type.'/number_'.$advert->id.'/small_'.$advert->photos->where('is_basic', 1)->first()->photo)}}">
                @endisset
            </a>
{{--            <div class="rating-cont">--}}
{{--                <img src="/images/icons/star-rat.svg" alt="img">--}}
{{--                <img src="/images/icons/star-rat.svg" alt="img">--}}
{{--                <img src="/images/icons/star-rat.svg" alt="img">--}}
{{--                <img src="/images/icons/star-rat.svg" alt="img">--}}
{{--                <img src="/images/icons/star-rat.svg" alt="img">--}}
{{--            </div>--}}
            <a href="#/" class="cart-name">
                {{$advert->title}}
            </a>
            <div class="price-block">
                {{--                                <span class="old">1500$</span>--}}
                <span class="new">{{$advert->price}}$</span>
            </div>
        </div>
    </div>
@endforeach
