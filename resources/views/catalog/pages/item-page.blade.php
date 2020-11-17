@extends('layouts.main')

@section('content')
    @if($role == 3 or $role == 2)
        <button><a href='{{ route('admin.delete_advert', [$advert->id]) }}'>Удалить</a></button>
        <button><a href="{{ route('admin.change_status', [3, $advert->id]) }}">Отказать</a></button>
        <button><a href="{{ route('admin.change_status', [4, $advert->id]) }}">Опубликовать</a></button>
    @endif
    <section class="item-page">
        @include('catalog.modals.item-page-block')
            <div class="tabs__content">
                <div class="container">
                    <div class="person">
                        <div class="person-prof">
                            <img
                                src="{{asset('/storage/images/profiles/'.auth()->user()->email.'/small_'.auth()->user()->avatar)}}"
                                alt="img">
                        </div>
{{--                        <div class="person-rating">--}}
{{--                            <img src="./images/icons/stars.svg" alt="img">--}}
{{--                        </div>--}}
                        <div class="person-name">{{$advert->user->name}}</div>
                        <a href="tel:{{$advert->user->phone}}" class="person-phone">{{$advert->user->phone}}</a>
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
                                <span>{{$advert->user->city}}</span>
                            </div>
                            <div class="address">
                                <p>Страна:</p>
                                <span>{{$advert->user->country}}</span>
                            </div>
                        </div>
                        <a href="#/" class="all-ads btn-hover-w">Все объявления продавца</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
