@extends('layouts.main')

@section('content')
    <section class="about">
        <div class="banner-wrap">
            <h2>{{__('messages.about_wwt')}}</h2>
            <p>{{__('messages.good_watches')}}</p>
        </div>
        <div class="container">
            <div class="info-items">
                <div class="item">
                    <img src="./images/icons/contacts.svg" alt="img">
                    <p>{{__('messages.contacts')}}</p>
                    <a href="tel:+380638746992">+38(063)874-69-92</a>
                    <span>Worldwatchtrade@gmail.com</span>
                </div>
                <div class="item">
                    <img src="./images/icons/visit-us.svg" alt="img">
                    <p>{{__('messages.visit_us')}}</p>
                    <span>{{__('messages.kyiv_address')}}</span>
                    <span>{{__('messages.kyiv_address_2')}}</span>
                </div>
                <div class="item">
                    <img src="./images/icons/find-job.svg" alt="img">
                    <p>{{__('messages.find_job')}}</p>
                    <span>{{__('messages.send_vc')}}</span>
                </div>
            </div>
            <div class="about-cont">
                <h2>{{__('messages.about_wwt_company')}} </h2>
                <span class="line"></span>
                <h3>{{__('messages.about_text_1')}}
                </h3>
                <p>{{__('messages.about_text_2')}}
                </p>
            </div>
            <form class="about-form" method="post" action="{{route('send_about')}}">
                @csrf
                <h2>{{__('messages.email_us')}}</h2>
                <label for="about-name">
                    {{__('messages.name')}} *
                    <input name="name" type="text" id="about-name">
                </label>
                <label for="about-surname">
                    {{__('messages.surname')}} *
                    <input name="surname" type="text" id="about-surname">
                </label>
                <label for="about-email">
                    {{__('messages.email')}} *
                    <input name="email" type="text" id="about-email">
                </label>
                <label for="about-message">
                    {{__('messages.message')}} *
                    <textarea name="message" type="text" id="about-message"></textarea>
                </label>
                <button class="send-form btn-hover" type="submit">{{__('messages.submit')}}</button>
            </form>
        </div>
    </section>
@endsection
