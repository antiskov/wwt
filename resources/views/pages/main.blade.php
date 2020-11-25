@extends('layouts.main')
@section('content')
    <div class="site-holder">
        <section class="main-slider swiper-container">
            <div class="swiper-wrapper">
                <div class="main-slider-item swiper-slide">
                    <img src="./images/content/main-slider_1-desc.jpg" alt="фото слайдера 1">
                    <div class="main-slider-item__content">
                        <div class="container">
                            <p>Время ограниченно!</p>
                            <h3>Элитные часы со скидкой 40%!</h3>
                            <a href="#">Перейти</a>
                        </div>
                    </div>
                </div>
                <div class="main-slider-item swiper-slide">
                    <img src="./images/content/main-slider_1-desc.jpg" alt="фото слайдера 1">
                    <div class="main-slider-item__content">
                        <div class="container">
                            <p>Время ограниченно!</p>
                            <h3>Элитные часы со скидкой 40%!</h3>
                            <a href="#">Перейти</a>
                        </div>
                    </div>
                </div>
                <div class="main-slider-item swiper-slide">
                    <img src="./images/content/main-slider_1-desc.jpg" alt="фото слайдера 1">
                    <div class="main-slider-item__content">
                        <div class="container">
                            <p>Время ограниченно!</p>
                            <h3>Элитные часы со скидкой 40%!</h3>
                            <a href="#">Перейти</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-pagination"></div>

            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </section>
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
