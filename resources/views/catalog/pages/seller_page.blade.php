@extends('layouts.main')

@section('content')
    <section class="seller-page">
        <div class="container">
            <div class="seller-cont">
                <div class="person">
                    <div class="person-prof">
                        <img src="{{$linkAvatar}}"
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
                        <p>{{__('messages.speak_on')}} :</p>
                        @if(in_array('ua', $userLanguages))
                            <span>{{__('messages.ukrainian')}}</span>
                        @endif
                        @if(in_array('ru', $userLanguages))
                            <span>{{__('messages.russian')}}</span>
                        @endif
                        @if(in_array('en', $userLanguages))
                            <span>{{__('messages.english')}}</span>
                        @endif
                    </div>
                    <div class="person-address">
                        <div class="address">
                            <p>{{__('messages.city')}}:</p>
                            <span>{{$user->city}}</span>
                        </div>
                        <div class="address">
                            <p>{{__('messages.country')}}:</p>
                            <span>{{$user->country}}</span>
                        </div>
                    </div>
                    <a href="#/" class="all-ads btn-hover-w">{{__('messages.all_seller_adverts')}}</a>
                </div>

                <div class="about-shop">
                    <h2>{{__('messages.about_shop')}}</h2>
                    <span class="line"></span>
                    <div class="about-shop__info">
                    <p>
                        {{$user->description}}
                    </p>
                    </div>
                    <button class="accordion"></button>
                </div>
            </div>
        </div>
        <div class="seller-main">
            <div class="container">
                <h2>{{__('messages.best_of')}} <span>{{__('messages.author_suggestion')}}</span></h2>
                <div class="seller-slider">
                    @include('catalog.modals.item-card-seller-page')
                </div>
                <a href="#/" class="all-seller-ads btn-hover">{{__('messages.all_seller_adverts')}}</a>
            </div>
        </div>
    </section>


@endsection
