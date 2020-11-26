@extends('layouts.main')
@section('content')
    <div class="site-holder">
        @widget('slider')
        @widget('man_woman_pictures')
        <section class="brands-slider swiper-container">
            <div class="swiper-wrapper">
                <a href="#" class="brands-slider-item swiper-slide">
                    <img src="./images/content/partners/1.png" alt="партнер">
                </a>
                <a href="#" class="brands-slider-item swiper-slide">
                    <img src="./images/content/partners/2.png" alt="партнер">
                </a>
                <a href="#" class="brands-slider-item swiper-slide">
                    <img src="./images/content/partners/3.png" alt="партнер">
                </a>
                <a href="#" class="brands-slider-item swiper-slide">
                    <img src="./images/content/partners/5.png" alt="партнер">
                </a>
                <a href="#" class="brands-slider-item swiper-slide">
                    <img src="./images/content/partners/7.png" alt="партнер">
                </a>
                <a href="#" class="brands-slider-item swiper-slide">
                    <img src="./images/content/partners/8.png" alt="партнер">
                </a>
                <a href="#" class="brands-slider-item swiper-slide">
                    <img src="./images/content/partners/9.png" alt="партнер">
                </a>
                <a href="#" class="brands-slider-item swiper-slide">
                    <img src="./images/content/partners/1.png" alt="партнер">
                </a>
                <a href="#" class="brands-slider-item swiper-slide">
                    <img src="./images/content/partners/2.png" alt="партнер">
                </a>
            </div>
        </section>
{{--        @include('catalog.modals.filter')--}}
{{--        @include('catalog.modals.global.tabs')--}}
    </div>
@endsection
