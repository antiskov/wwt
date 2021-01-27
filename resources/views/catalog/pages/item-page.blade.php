@extends('layouts.main')

@section('content')
    @if($role == 3 or $role == 2)
        @if($advert->status->title == 'published')
            <button><a href="{{ route('admin.change_status', [$statuses->where('title', 'moderation')->first(), $advert->id]) }}">Отказать</a></button>
        @else
            <button><a href="{{ route('admin.change_status', [$statuses->where('title', 'published')->first(), $advert->id]) }}">Опубликовать</a></button>
        @endif
        <button><a href="{{ route('change_status', [$statuses->where('title', 'archive')->first(), $advert->id]) }}">Удалить</a></button>
    @endif
    <section class="item-page">
        <script>
            document.addEventListener("DOMContentLoaded", function (event) {
                document.querySelector('#heart').addEventListener('click', function (e) {
                    if (!this.classList.contains('active')) {
                        console.log(1);
                        $.ajax({
                            url: '/catalog/item_page_favorite/{{$advert->id}}/{{1}}',
                        })
                    } else {
                        console.log(0);
                        $.ajax({
                            url: '/catalog/item_page_favorite/{{$advert->id}}/{{0  }}',
                        })
                    }
                })

                $('.button-show-phone').on('click', function(e){
                    e.preventDefault();
                    $.ajax({
                        url: '/catalog/show_phone/{{$advert->id}}',
                        data: {"_token": "{{ csrf_token() }}"},
                        success: function (data) {
                            $('.phone-dropdown').html(data.output).addClass('active');
                        },
                    })
                })
                $('#contact_to_seller').on('click', function(e){
                    e.preventDefault();
                    $.ajax({
                        url: '{{route('getLinkToDialog',['advert'=>$advert->id])}}',
                        data: {"_token": "{{ csrf_token() }}"},
                        success: function (data) {
                            window.location.replace(data.url);
                        },
                    })
                })
            });
        </script>
        @include('catalog.modals.item-page-block')
        <div class="tabs__content">
            <div class="container">
                <div class="person">
                    <div class="person-prof">
                        <a href="{{route('seller-page', $user->id)}}">
                            <img src="{{asset($linkAvatar)}}"
                                 alt="img">
                        </a>
                    </div>
                    {{--                        <div class="person-rating">--}}
                    {{--                            <img src="./images/icons/stars.svg" alt="img">--}}
                    {{--                        </div>--}}
                    <div class="person-name">
                        <h3>{{$advert->name}}
                            @if($advert->is_publish_surname == 1)
                                {{$advert->surname}}
                            @endif
                        </h3>
                    </div>
                    <div class="phone-dropdown">
                        <button class="btn-hover button-show-phone" type="submit">{{__('messages.show_phone')}}</button>
                    </div>
                    <br>
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
                            <span>{{$advert->user->city}}</span>
                        </div>
                        <div class="address">
                            <p>{{__('messages.country')}}:</p>
                            <span>{{$advert->user->country}}</span>
                        </div>
                    </div>
                    <a href="{{route('catalog.seller-ads', [$advert->user_id])}}" class="all-ads btn-hover-w">{{__('messages.all_seller_adverts')}}</a>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
