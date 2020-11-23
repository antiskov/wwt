<div id="favorite_block" class="items-anno">
    @if($status == '1')
        @foreach($adverts as $advert)
            <div class="favorite-items">
                <div class="item-favorite">
                    <a href="{{route('delete_favorite', [$advert->id])}}"><img src="/images/icons/favorit-active.svg" alt="img" class="del-fav"></a>
                    <div class="item-info">
                        <div class="img-wrap">
                            <img src="/images/content/watch-1.png" alt="img">
                            <img src="/images/content/watch-2.png" alt="img">
                        </div>
                        <div class="desc-cont">
                            <div class="item-name">
                                {{$advert->title}}
                            </div>
                            <div class="desc-main">
                                <div class="price-cont">
                                    <div class="new">
                                        {{$advert->price}}
                                    </div>
                                    {{--                                <div class="old">--}}
                                    {{--                                    1500 $--}}
                                    {{--                                </div>--}}
                                    <div class="rating">
                                        <img src="/images/icons/star-rat.svg" alt="img">
                                        <img src="/images/icons/star-rat.svg" alt="img">
                                        <img src="/images/icons/star-rat.svg" alt="img">
                                        <img src="/images/icons/star-rat.svg" alt="img">
                                        <img src="/images/icons/star-rat.svg" alt="img">
                                    </div>
                                </div>
                                <div class="publication-cont">
                                    <div class="cont">
                                        <span>{{strstr($advert->created_at, ' ', true)}}</span>
                                        <p>Дата публикации:</p>
                                    </div>
                                    <div class="cont">
                                        <span>{{strstr($advert->created_at, ' ')}}</span>
                                        <p>Время публикации:</p>
                                    </div>
                                </div>
                                <div class="social-cont">
                                    <a href="#/" class="soc-icon"></a>
                                    <a href="#/" class="soc-icon"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="publication-cont">
                        <div class="cont">
                            <p>Дата публикации:</p>
                            <span>26. 07. 12</span>
                        </div>
                        <div class="cont">
                            <p>Время публикации:</p>
                            <span>16:45</span>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        @foreach($searchLinks as $searchLink)
            {{--        @foreach(auth()->user()->favoriteAdverts as $searchLink)--}}
            <div class="items-wrap">
                <div class="search-item">
                    <a href="{{route('delete_search', [$searchLink['id']])}}"><div class="search-item__delete-btn"></div></a>
                    <div class="search-item__text">
                        <h5>
                            <a href="{{route('catalog-favorite', $searchLink['link'])}}">{{$searchLink['title']}}</a>
                        </h5>
                        <p>Сохраненные результаты поиска от 25 сент. 2020 г., последнее уведомление 25 сент. 2020 г.</p>
                    </div>
                    <a href="#" class="search-item__link">Все объявления</a>
                </div>
            </div>
        @endforeach
    @endif
</div>
