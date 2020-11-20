@extends('layouts.main')

@section('content')
    <section class="seller-page">
        <div class="container">
            <div class="seller-cont">
                <div class="person">
                    <div class="person-prof">
                        <img
                            src="{{asset('/storage/images/profiles/'.$user->email.'/small_'.$user->avatar)}}"
                            alt="img">
                    </div>
                    <div class="person-rating">
                        <img src="/images/icons/stars.svg" alt="img">
                    </div>
                    <div class="person-name">{{$user->name}}</div>
                    <a href="tel:{{ $user->phone }}" class="person-phone">{{ $user->phone }}</a>
                    <div class="person-social">
                        <a href="#/"></a>
                        <a href="#/"></a>
                        <a href="#/"></a>
                    </div>
                    <div class="person-laung">
                        <p>Говорит на :</p>
                        @if(in_array('ua', $userLanguages))
                            <span>Украинский</span>
                        @endif
                        @if(in_array('ru', $userLanguages))
                            <span>Русский</span>
                        @endif
                        @if(in_array('en', $userLanguages))
                            <span>English</span>
                        @endif
                    </div>
                    <div class="person-address">
                        <div class="address">
                            <p>Город:</p>
                            <span>{{$user->city}}</span>
                        </div>
                        <div class="address">
                            <p>Страна:</p>
                            <span>{{$user->country}}</span>
                        </div>
                    </div>
                    <a href="#/" class="all-ads btn-hover-w">Все объявления продавца</a>
                </div>

                <div class="about-shop">
                    <h2>О магазине</h2>
                    <span class="line"></span>
                    <p>
                        {{$user->description}}
                    </p>

                    {{--                    <div class="panel">--}}
                    {{--                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aut distinctio dolores--}}
                    {{--                        doloribus ea eius exercitationem explicabo fugit illum itaque, laboriosam magnam minima--}}
                    {{--                        molestiae optio quae quo rem repellat sequi.--}}
                    {{--                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias deserunt dolore earum hic in maiores nemo nesciunt nisi numquam sunt?--}}
                    {{--                    </div>--}}
                    <button class="accordion"></button>
                </div>
            </div>
        </div>
        <div class="seller-main">
            <div class="container">
                <h2>Лучшие <span>предложения продавца</span></h2>
                <div class="seller-slider">
                    @include('catalog.modals.item-card-seller-page')
                </div>
                <a href="#/" class="all-seller-ads btn-hover">Все объявления продавца</a>
            </div>
        </div>
        <div class="map-wrap">
            <div class="container">
                <h2>Как добраться</h2>
                <style type="text/css">
                    #map{
                        height:350px;
                    }
                </style>
                <div class="gradient">
                    <div class="map-cont" id="map" height='300px'>
                        <script>
                            function initMap() {
                                // The location of Uluru
                                const uluru = { lat: {{$user->latitude}}, lng: {{$user->longtitude}} };
                                // The map, centered at Uluru
                                const map = new google.maps.Map(document.getElementById("map"), {
                                    zoom: 10,
                                    center: uluru,
                                });
                                // The marker, positioned at Uluru
                                const marker = new google.maps.Marker({
                                    position: uluru,
                                    map: map,
                                });
                            }
                        </script>
                        <script
                            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDmCYblB4cVMXS93Da6iBG1RFldOXY46hA&callback=initMap&libraries=&v=weekly"
                            defer
                        ></script>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
