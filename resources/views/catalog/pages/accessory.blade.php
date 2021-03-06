@extends('catalog.layouts.main')

@section('catalog-content')
    @include('catalog.modals.filter_accessory')
    <section class="main-items">
        <div class="main-items-wrap">
            <div class="tabs">
                <div class="change-option">
                    <div class="chek_cont">
                        <input type="checkbox" id="check_call" required checked>
                        <label class="caption placeholder" for="check_call"><p>Новые <span>/неношеные</span></p></label>
                    </div>
                </div>
                <input type="radio" name="tab-btn" id="tab-btn-1" value="" checked>
                <label for="tab-btn-1" class="block-1"><img src="/images/icons/block-item.svg" alt=""></label>
                <input type="radio" name="tab-btn" id="tab-btn-2" value="" >
                <label for="tab-btn-2" class="block-2"><img src="/images/icons/line-item.svg" alt=""></label>

                <div class="wrap2">
                    <div class="currency-block">
                        <a href="#/">USD</a>
                        <a href="#/">UAH</a>
                        <a href="#/">EUR</a>
                    </div>
                    <div class="select-price">
                        <p>Сортировать:</p>
                        <div class="select-value">Самые дорогие</div>
                        <ul class="value-items">
                            <li><a href="#/">Самые дорогие</a></li>
                            <li><a href="#/">по релевантности</a></li>
                            <li><a href="#/">по возрастанию цены</a></li>
                            <li><a href="#/">по убыванию цены</a></li>
                            <li><a href="#/">по популярности</a></li>
                        </ul>
                    </div>
                </div>

                <span class="vip">VIP</span>

                <div class="counter-more">
                    <a href="#/" class="item-more">50</a>
                    <a href="#/" class="item-more">100</a>
                    <a href="#/" class="item-more">150</a>
                </div>

                <div id="content-1" class="items-block">
                    <div class="block-view items-cont">
                        @include('catalog.modals.item-cart', ['adverts' => $adverts])
                    </div>
                </div>

                <div id="content-2" class="items-block">
                    <div class="items-cont inline-view">
                        @include('catalog.modals.inline-item-cart', ['adverts' => $adverts])
                    </div>
                </div>
                @include('catalog.modals.pagination')
            </div>
        </div>
    </section>
@endsection
