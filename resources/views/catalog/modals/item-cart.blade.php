
<div id="content-1" class="items-block">
    <div class="block-view items-cont">
        @foreach($adverts as $advert)
            <div class="item-cart">
                @if($advert->vip_status == 1)
                    <img src="{{asset('/images/icons/VIP.svg')}}" alt="img">
                @endif
                @auth
                @if((\App\Models\UserFavoriteAdvert::where('user_id', auth()->user()->id)->where('advert_id', $advert->id)->first()))
                    <div class="favorite-icon active catalog-heart" data-id="{{$advert->id}}"></div>
                @else
                    <div class="favorite-icon catalog-heart" data-id="{{$advert->id}}"></div>
                @endif
                @endauth
                <a href="{{route('catalog.item-page', [$advert->id])}}" class="img-wrap">
                    <img src="{{asset('/storage/'.$advert->photo)}}" alt="img">
                </a>
{{--                <div class="rating-cont">--}}
{{--                    <img src="/images/icons/star-rat.svg" alt="img">--}}
{{--                    <img src="/images/icons/star-rat.svg" alt="img">--}}
{{--                    <img src="/images/icons/star-rat.svg" alt="img">--}}
{{--                    <img src="/images/icons/star-rat.svg" alt="img">--}}
{{--                    <img src="/images/icons/star-rat.svg" alt="img">--}}
{{--                </div>--}}
                <a href="{{route('catalog.item-page', [$advert->id])}}" class="cart-name">
                    {{$advert->title}}
                </a>
                <div class="price-block">
{{--            <span class="old">1500$</span>--}}
                    <span class="new">{{round($advert->price*$currency['rate']).' '.$currency['symbol']}}</span>
                </div>
            </div>
        @endforeach
    </div>
</div>
<script>
    // document.addEventListener("DOMContentLoaded", function(event) {
    //     document.querySelectorAll('.catalog-heart').forEach(function (item){
    //         item.addEventListener('click', function (e){
    //                 if(!this.classList.contains('active')) {
    //                     console.log(this);
    //                     $.ajax({
    //                         url: `/catalog/item_page_favorite/${this.getAttribute('data-id')}/1`,
    //                     })
    //                 } else {
    //                     $.ajax({
    //                         url: `/catalog/item_page_favorite/${this.getAttribute('data-id')}/0`,
    //                     })
    //                 }
    //         })
    //     })
    // });
</script>

