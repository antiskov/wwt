@foreach($adverts as $advert)
    <div class="item-cont">
        <div class="item-cart">
            <div class="vip-label"></div>
            <div class="favorite-icon">

            </div>
            <a href="{{route('item-page', [$advert->id])}}" class="img-wrap">
                <img src="{{asset('/storage/'.$advert->basicImageAdvert->title)}}" alt="img">
            </a>
            <div class="rating-cont">
                <img src="/images/icons/star-rat.svg" alt="img">
                <img src="/images/icons/star-rat.svg" alt="img">
                <img src="/images/icons/star-rat.svg" alt="img">
                <img src="/images/icons/star-rat.svg" alt="img">
                <img src="/images/icons/star-rat.svg" alt="img">
            </div>
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
