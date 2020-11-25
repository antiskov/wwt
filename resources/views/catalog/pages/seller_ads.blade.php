@extends('catalog.layouts.main')

@section('catalog-content')
<section class="seller-ads">
    <div class="seller-prod">
        <div class="prs-cont">
            <div class="img-wrap">
                <img src="./images/content/person.png" alt="img">
            </div>
            <div class="cont">
                <div class="person-name">LUXE WARE (HK) LIMITED</div>
                <span>699 объявлений </span>
            </div>

        </div>
    </div>
    <section class="main-items">
        <div class="main-items-wrap">
            <div class="choose-filter">
                <ul class="choose-filter__content">
{{--                    <li class="active"><a href="#">Все</a></li>--}}
                    <li class="active"><a href="#">Часы</a></li>
                    <li><a href="#">Аксессуары</a></li>
                    <li><a href="#">Запчасти</a></li>
                </ul>
            </div>
            @include('catalog.modals.filter')
            @include('catalog.modals.global.tabs')
        </div>
    </section>
</section>
@endsection
