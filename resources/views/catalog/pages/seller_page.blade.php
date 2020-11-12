@extends('layouts.main')

@section('content')
    <section class="seller-page">
        <div class="container">
            <div class="seller-cont">
                <div class="person">
                    <div class="person-prof">
                        <img
                            src="{{asset('/storage/images/profiles/'.auth()->user()->email.'/small_'.auth()->user()->avatar)}}"
                            alt="img">
                    </div>
                    <div class="person-rating">
                        <img src="/images/icons/stars.svg" alt="img">
                    </div>
                    <div class="person-name">{{auth()->user()->name}}</div>
                    <a href="tel:{{ auth()->user()->phone }}" class="person-phone">{{ auth()->user()->phone }}</a>
                    <div class="person-social">
                        <a href="#/"></a>
                        <a href="#/"></a>
                        <a href="#/"></a>
                    </div>
                    <div class="person-laung">
                        <p>Говорит на :</p>
                        @foreach(auth()->user()->languages as $language)
                        <span>{{$language->title}}</span>
                        @endforeach
                    </div>
                    <div class="person-address">
                        <div class="address">
                            <p>Город:</p>
                            <span>Киев</span>
                        </div>
                        <div class="address">
                            <p>Страна:</p>
                            <span>Украина</span>
                        </div>
                    </div>
                    <a href="#/" class="all-ads btn-hover-w">Все объявления продавца</a>
                </div>

                <div class="about-shop">
                    <h2>О магазине</h2>
                    <span class="line"></span>
                    <p>
                        Shipping conditions for secondhand and collection watches
                        Our watch prices do not include shipping and insurance.
                        We use Ferrari Logistics to ship our watches. They are fully insured and trackable.
                        Established in 1959 in Alessandria, Italy, Ferrari Group specializes in the international
                        transportation of gold, precious gems and high value goods. Their global headquarters is
                        located in Italy and they have 80 logistics offices in 50 countries.
                        The price for shipping a watch worth less than €20,000 is between €125 and €225, depending
                        on the country. Insurance is included.
                        For the shipping of a watch with a value of more than €20,000, there is an additional
                        insurance cost of 0,12% of the value of the For the shipping of a watch with a value
                        of more than €20,000, there is an additional e For the shipping of a watch with a
                        value of more than €20,000, there is an additional insurance cost of 0,12% of the value of the
                    </p>

                    <div class="panel">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aut distinctio dolores
                        doloribus ea eius exercitationem explicabo fugit illum itaque, laboriosam magnam minima
                        molestiae optio quae quo rem repellat sequi.
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias deserunt dolore earum hic in maiores nemo nesciunt nisi numquam sunt?
                    </div>
                    <button class="accordion"></button>
                </div>
            </div>
        </div>
        <div class="seller-main">
            <div class="container">
                <h2>Лучшие <span>предложения продавца</span></h2>
                <div class="seller-slider">
                    <div class="item-cont">
                        <div class="item-cart">
                            <div class="vip-label"></div>
                            <div class="favorite-icon">

                            </div>
                            <a href="#/" class="img-wrap">
                                <img src="./images/content/watch-1.png" alt="img">
                            </a>
                            <div class="rating-cont">
                                <img src="./images/icons/star-rat.svg" alt="img">
                                <img src="./images/icons/star-rat.svg" alt="img">
                                <img src="./images/icons/star-rat.svg" alt="img">
                                <img src="./images/icons/star-rat.svg" alt="img">
                                <img src="./images/icons/star-rat.svg" alt="img">
                            </div>
                            <a href="#/" class="cart-name">
                                Rolex Submariner Date NEW 2018 116610LN
                            </a>
                            <div class="price-block">
                            <span class="old">
                                1500$
                            </span>
                                <span class="new">
                                1500$
                            </span>
                            </div>
                        </div>
                        <div class="item-cart">
                            <div class="vip-label"></div>
                            <div class="favorite-icon">

                            </div>
                            <a href="#/" class="img-wrap">
                                <img src="./images/content/watch-1.png" alt="img">
                            </a>
                            <div class="rating-cont">
                                <img src="./images/icons/star-rat.svg" alt="img">
                                <img src="./images/icons/star-rat.svg" alt="img">
                                <img src="./images/icons/star-rat.svg" alt="img">
                                <img src="./images/icons/star-rat.svg" alt="img">
                                <img src="./images/icons/star-rat.svg" alt="img">
                            </div>
                            <a href="#/" class="cart-name">
                                Rolex Submariner Date NEW 2018 116610LN
                            </a>
                            <div class="price-block">
                            <span class="old">
                                1500$
                            </span>
                                <span class="new">
                                1500$
                            </span>
                            </div>
                        </div>
                    </div>
                    <div class="item-cont">
                        <div class="item-cart">
                            <div class="vip-label"></div>
                            <div class="favorite-icon">

                            </div>
                            <a href="#/" class="img-wrap">
                                <img src="./images/content/watch-1.png" alt="img">
                            </a>
                            <div class="rating-cont">
                                <img src="./images/icons/star-rat.svg" alt="img">
                                <img src="./images/icons/star-rat.svg" alt="img">
                                <img src="./images/icons/star-rat.svg" alt="img">
                                <img src="./images/icons/star-rat.svg" alt="img">
                                <img src="./images/icons/star-rat.svg" alt="img">
                            </div>
                            <a href="#/" class="cart-name">
                                Rolex Submariner Date NEW 2018 116610LN
                            </a>
                            <div class="price-block">
                            <span class="old">
                                1500$
                            </span>
                                <span class="new">
                                1500$
                            </span>
                            </div>
                        </div>
                        <div class="item-cart">
                            <div class="vip-label"></div>
                            <div class="favorite-icon">

                            </div>
                            <a href="#/" class="img-wrap">
                                <img src="./images/content/watch-1.png" alt="img">
                            </a>
                            <div class="rating-cont">
                                <img src="./images/icons/star-rat.svg" alt="img">
                                <img src="./images/icons/star-rat.svg" alt="img">
                                <img src="./images/icons/star-rat.svg" alt="img">
                                <img src="./images/icons/star-rat.svg" alt="img">
                                <img src="./images/icons/star-rat.svg" alt="img">
                            </div>
                            <a href="#/" class="cart-name">
                                Rolex Submariner Date NEW 2018 116610LN
                            </a>
                            <div class="price-block">
                            <span class="old">
                                1500$
                            </span>
                                <span class="new">
                                1500$
                            </span>
                            </div>
                        </div>
                    </div>
                    <div class="item-cont">
                        <div class="item-cart">
                            <div class="vip-label"></div>
                            <div class="favorite-icon">

                            </div>
                            <a href="#/" class="img-wrap">
                                <img src="./images/content/watch-1.png" alt="img">
                            </a>
                            <div class="rating-cont">
                                <img src="./images/icons/star-rat.svg" alt="img">
                                <img src="./images/icons/star-rat.svg" alt="img">
                                <img src="./images/icons/star-rat.svg" alt="img">
                                <img src="./images/icons/star-rat.svg" alt="img">
                                <img src="./images/icons/star-rat.svg" alt="img">
                            </div>
                            <a href="#/" class="cart-name">
                                Rolex Submariner Date NEW 2018 116610LN
                            </a>
                            <div class="price-block">
                            <span class="old">
                                1500$
                            </span>
                                <span class="new">
                                1500$
                            </span>
                            </div>
                        </div>
                        <div class="item-cart">
                            <div class="vip-label"></div>
                            <div class="favorite-icon">

                            </div>
                            <a href="#/" class="img-wrap">
                                <img src="./images/content/watch-1.png" alt="img">
                            </a>
                            <div class="rating-cont">
                                <img src="./images/icons/star-rat.svg" alt="img">
                                <img src="./images/icons/star-rat.svg" alt="img">
                                <img src="./images/icons/star-rat.svg" alt="img">
                                <img src="./images/icons/star-rat.svg" alt="img">
                                <img src="./images/icons/star-rat.svg" alt="img">
                            </div>
                            <a href="#/" class="cart-name">
                                Rolex Submariner Date NEW 2018 116610LN
                            </a>
                            <div class="price-block">
                            <span class="old">
                                1500$
                            </span>
                                <span class="new">
                                1500$
                            </span>
                            </div>
                        </div>
                    </div>
                    <div class="item-cont">
                        <div class="item-cart">
                            <div class="vip-label"></div>
                            <div class="favorite-icon">

                            </div>
                            <a href="#/" class="img-wrap">
                                <img src="./images/content/watch-1.png" alt="img">
                            </a>
                            <div class="rating-cont">
                                <img src="./images/icons/star-rat.svg" alt="img">
                                <img src="./images/icons/star-rat.svg" alt="img">
                                <img src="./images/icons/star-rat.svg" alt="img">
                                <img src="./images/icons/star-rat.svg" alt="img">
                                <img src="./images/icons/star-rat.svg" alt="img">
                            </div>
                            <a href="#/" class="cart-name">
                                Rolex Submariner Date NEW 2018 116610LN
                            </a>
                            <div class="price-block">
                            <span class="old">
                                1500$
                            </span>
                                <span class="new">
                                1500$
                            </span>
                            </div>
                        </div>
                        <div class="item-cart">
                            <div class="vip-label"></div>
                            <div class="favorite-icon">

                            </div>
                            <a href="#/" class="img-wrap">
                                <img src="./images/content/watch-1.png" alt="img">
                            </a>
                            <div class="rating-cont">
                                <img src="./images/icons/star-rat.svg" alt="img">
                                <img src="./images/icons/star-rat.svg" alt="img">
                                <img src="./images/icons/star-rat.svg" alt="img">
                                <img src="./images/icons/star-rat.svg" alt="img">
                                <img src="./images/icons/star-rat.svg" alt="img">
                            </div>
                            <a href="#/" class="cart-name">
                                Rolex Submariner Date NEW 2018 116610LN
                            </a>
                            <div class="price-block">
                            <span class="old">
                                1500$
                            </span>
                                <span class="new">
                                1500$
                            </span>
                            </div>
                        </div>
                    </div>
                    <div class="item-cont">
                        <div class="item-cart">
                            <div class="vip-label"></div>
                            <div class="favorite-icon">

                            </div>
                            <a href="#/" class="img-wrap">
                                <img src="./images/content/watch-1.png" alt="img">
                            </a>
                            <div class="rating-cont">
                                <img src="./images/icons/star-rat.svg" alt="img">
                                <img src="./images/icons/star-rat.svg" alt="img">
                                <img src="./images/icons/star-rat.svg" alt="img">
                                <img src="./images/icons/star-rat.svg" alt="img">
                                <img src="./images/icons/star-rat.svg" alt="img">
                            </div>
                            <a href="#/" class="cart-name">
                                Rolex Submariner Date NEW 2018 116610LN
                            </a>
                            <div class="price-block">
                            <span class="old">
                                1500$
                            </span>
                                <span class="new">
                                1500$
                            </span>
                            </div>
                        </div>
                        <div class="item-cart">
                            <div class="vip-label"></div>
                            <div class="favorite-icon">

                            </div>
                            <a href="#/" class="img-wrap">
                                <img src="./images/content/watch-1.png" alt="img">
                            </a>
                            <div class="rating-cont">
                                <img src="./images/icons/star-rat.svg" alt="img">
                                <img src="./images/icons/star-rat.svg" alt="img">
                                <img src="./images/icons/star-rat.svg" alt="img">
                                <img src="./images/icons/star-rat.svg" alt="img">
                                <img src="./images/icons/star-rat.svg" alt="img">
                            </div>
                            <a href="#/" class="cart-name">
                                Rolex Submariner Date NEW 2018 116610LN
                            </a>
                            <div class="price-block">
                            <span class="old">
                                1500$
                            </span>
                                <span class="new">
                                1500$
                            </span>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="#/" class="all-seller-ads btn-hover">Все объявления продавца</a>
            </div>
        </div>
        <div class="map-wrap">
            <div class="container">
                <h2>Как добраться</h2>
                <div class="gradient">
                    <div class="map-cont">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d20318.980168045902!2d30.47596888955078!3d50.4620985!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sru!2sua!4v1596017137433!5m2!1sru!2sua"  frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
