@foreach($adverts as $advert)
<div class="inline-cart">
    <div class="vip-label"></div>
    <div class="favorite-icon"></div>
    <a href="{{route('item-page', [$advert->id])}}" class="img-wrap">
        <img src="{{asset('/storage/'.$advert->basicImageAdvert->title)}}" alt="img">
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
                    <div class="rating-cont">
                        <img src="./images/icons/star-rat.svg" alt="img">
                        <img src="./images/icons/star-rat.svg" alt="img">
                        <img src="./images/icons/star-rat.svg" alt="img">
                        <img src="./images/icons/star-rat.svg" alt="img">
                        <img src="./images/icons/star-rat.svg" alt="img">
                    </div>
                </div>
            </div>

            <div class="block-grid bord">
                <div class="item-infos">
                    <p>Тип механизма: </p>
                    <span>{{$advert->watchAdvert->mechanismType->title}}</span>
                </div>
                <div class="item-infos">
                    <p>Материал корпуса:</p>
                    <span>{{$advert->watchAdvert->watchMaterial->title}}</span>
                </div>
                <div class="item-infos">
                    <p>Год: </p>
                    <span>{{$advert->watchAdvert->release_year}}</span>
                </div>
                <div class="item-infos">
                    <p>Состояние: </p>
                    <span>{{ $advert->watchAdvert->watch_state }}</span>
                </div>
            </div>

            <div class="block-grid">
                <div class="item-infos">
                    <p>ИИ номер:</p>
                    <span>{{ $advert->watchAdvert->model_code }}</span>
                </div>
                <div class="item-infos">
                    <p>Объем доставки:</p>
                    <span>{{ $advert->deliveryVolume->title }}</span>
                </div>
                <div class="item-infos">
                    <p>Местоположение:</p>
                    <span>{{$advert->country}}</span>
                </div>
                <div class="item-infos">
                    <p>Диаметр:</p>
                    <span>{{$advert->watchAdvert->diameterWatch->height}} mm</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
