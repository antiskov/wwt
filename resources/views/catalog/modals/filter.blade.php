<section class="filters">
    @if(isset($user))
        <form class="filters-mob filter-search" method="get" action="{{route('catalog.seller-ads', $user)}}">
    @elseif(isset($vipHome))
        <form class="filters-mob filter-search" method="get" action="{{route('result_for_home')}}">
    @else
        <form class="filters-mob filter-search" method="get" action="{{route('catalog')}}">
    @endif
        <div class="filters-mob-btns">
            <button class="reset-filters-btn btn-hover" type="reset">Сбросить</button>
            <button class="open-mob-filter-btn" type="button">Фильтр</button>
        </div>
        <div class="filters-mob-content">
            <ul class="filters-mob-list">
                <li class="title">
                    <h5>Общие данные</h5>
                </li>
                <li>
                    <p>Марка</p>
                    <div class="filters-mob-list__content">
                        <div class="filters-search">
                            <input class="filters-search-field" data-search-list="filters-mob-brand" type="text"
                                   placeholder="Поиск по фильтру">
                            <span class="clear-field-btn"></span>
                        </div>
                        <ul id="filters-mob-brand" class="checkboxes-list">
                            @foreach($brands as $brand)
                                <li>
                                    <div class="checkbox-block">
                                        <label class="checkbox-block__label">
                                            <input class="watch-filter mobile-filter" type="checkbox" name="brands[]" value="{{$brand->watch_make_title}}" id="{{rand(1, 20000)}}"
                                                @if(isset(request()->brands))
                                                    {{in_array($brand->watch_make_title, request()->brands)  ? 'checked' : ''}}
                                                @endif
                                            >
                                            <p><span>{{$brand->watch_make_title.' ('.$brand->count_watch_make_title.')'}}</span></p>
                                        </label>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </li>
                <li>
                    <p>Модель</p>
                    <div class="filters-mob-list__content">
                        <div class="filters-search">
                            <input class="filters-search-field" data-search-list="filters-mob-model" type="text"
                                   placeholder="Поиск по фильтру">
                            <span class="clear-field-btn"></span>
                        </div>
                        <ul id="filters-mob-model" class="checkboxes-list">
                            @foreach($models as $model)
                                <li>
                                    <div class="checkbox-block">
                                        <label class="checkbox-block__label">
                                            <input class="watch-filter mobile-filter" type="checkbox" name="models[]" value="{{$model->watch_model_title}}" id="{{rand(20001, 40000)}}"
                                            @if(isset(request()->models))
                                                {{in_array($model->watch_model_title, request()->models)  ? 'checked' : ''}}
                                                @endif
                                            >
                                            <p><span>{{$model->watch_model_title.' ('.$model->count_watch_model_title.')'}}</span></p>
                                        </label>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </li>
                <li>
                    <p>Цена</p>
                    <div class="filters-mob-list__content">
                        <div class="price-slider price-slider_mob">
                            <div class="price-slider__line">
                                <input id="slider-price-mob" type="text" class="range-slider watch-filter mobile-filter" value=""
                                       data-from="0" data-to="{{$maxPrice}}" data-min="0" data-max="{{$maxPrice}}"/>
                            </div>
                            <div class="price-slider__controls">
                                <input id="slider-price-mob-from" type="text" class="price-slider__from watch-filter mobile-filter" name="prices[0]" value="0"/>
                                <p>uah</p>
                                <input id="slider-price-mob-to" type="text" class="price-slider__to watch-filter mobile-filter" name="prices[1]" value="300"/>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <p>Диаметр</p>
                    <div class="filters-mob-list__content">
                        <div class="filters-search">
                            <input class="filters-search-field" data-search-list="filters-mob-diameter" type="text"
                                   placeholder="Поиск по фильтру">
                            <span class="clear-field-btn"></span>
                        </div>
                        <ul id="filters-mob-diameter" class="checkboxes-list">
                            @foreach($diameters as $diameter)
                                <li>
                                    <div class="checkbox-block">
                                        <label class="checkbox-block__label">
                                            @if($diameter->height == $diameter->width)
                                                <input class="watch-filter mobile-filter" type="checkbox" name="diameters[]" value="{{$diameter->height}}" id="{{rand(40001, 60000)}}"
                                                @if(isset(request()->diameters))
                                                    {{in_array($diameter->height, request()->diameters)  ? 'checked' : ''}}
                                                    @endif
                                                >
                                                <p>
                                                    <span>{{$diameter->height}}</span>
                                                </p>
                                            @else
                                                <input class="watch-filter mobile-filter" type="checkbox" name="diameters[]" value="{{$diameter->height.'/'.$diameter->width}}" id="{{rand(60001, 80000)}}"
                                                @if(isset(request()->diameters))
                                                    {{in_array($diameter->height.'/'.$diameter->width, request()->diameters)  ? 'checked' : ''}}
                                                    @endif
                                                >
                                                <p>
                                                    <span>{{$diameter->height.'/'.$diameter->width}}</span>
                                                </p>
                                            @endif
                                        </label>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </li>
                <li>
                    <p>Год</p>
                    <div class="filters-mob-list__content">
                        <div class="filters-search">
                            <input class="filters-search-field" data-search-list="filters-mob-year" type="text"
                                   placeholder="Поиск по фильтру">
                            <span class="clear-field-btn"></span>
                        </div>
                        <ul id="filters-mob-year" class="checkboxes-list">
                            @foreach($years as $year)
                                <li>
                                    <div class="checkbox-block">
                                        <label class="checkbox-block__label">
                                            <input class="watch-filter mobile-filter" type="checkbox" name="years[]" value="{{$year->release_year}}" id="{{rand(80001, 100000)}}"
                                            @if(isset(request()->years))
                                                {{in_array($year->release_year, request()->years)  ? 'checked' : ''}}
                                                @endif
                                            >
                                            <p><span>{{$year->release_year.' ('.$year->count_release_year.')'}}</span></p>
                                        </label>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </li>
                <li>
                    <p>Местоположение</p>
                    <div class="filters-mob-list__content">
                        <div class="filters-search">
                            <input class="filters-search-field" data-search-list="filters-mob-location" type="text"
                                   placeholder="Поиск по фильтру">
                            <span class="clear-field-btn"></span>
                        </div>
                        <ul id="filters-mob-location" class="checkboxes-list">
                            @foreach($regions as $region)
                                <li>
                                    <div class="checkbox-block">
                                        <label class="checkbox-block__label">
                                            <input class="watch-filter mobile-filter" type="checkbox" name="regions[]" value="{{$region->region}}" id="{{rand(100001, 120000)}}"
                                                @if(request()->regions)
                                                {{in_array($region->region, request()->regions)  ? 'checked' : ''}}
                                                @endif
                                                >
                                            <p><span>{{$region->region.' ('.$region->count_region.')'}}</span></p>
                                        </label>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </li>
                <li class="title">
                    <h5>Дополнительно</h5>
                </li>
                <li>
                    <p>Тип механизма</p>
                    <div class="filters-mob-list__content">
                        <div class="filters-search">
                            <input class="filters-search-field" data-search-list="filters-mob-model" type="text"
                                   placeholder="Поиск по фильтру">
                            <span class="clear-field-btn"></span>
                        </div>
                        <ul id="filters-mob-model" class="checkboxes-list">
                            @foreach($mechanismTypes as $mechanismType)
                                <li>
                                    <div class="checkbox-block">
                                        <label class="checkbox-block__label">
                                            <input  class="watch-filter mobile-filter" type="checkbox" name="mechanismTypes[]" value="{{$mechanismType->mechanism_type_title}}" id="{{rand(120001, 140000)}}"
                                                @if(request()->mechanismTypes)
                                                {{in_array($mechanismType->mechanism_type_title, request()->mechanismTypes)  ? 'checked' : ''}}
                                                @endif
                                                >
                                            <p><span>{{$mechanismType->mechanism_type_title.' ('.$mechanismType->count_mechanism_type_title.')'}}</span></p>
                                        </label>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </li>
                <li>
                    <p>Состояние</p>
                    <div class="filters-mob-list__content">
                        <div class="filters-search">
                            <input class="filters-search-field" data-search-list="filters-mob-model" type="text"
                                   placeholder="Поиск по фильтру">
                            <span class="clear-field-btn"></span>
                        </div>
                        <ul>
                            @foreach($states as $state)
                                <li>
                                    <div class="checkbox-block">
                                        <label class="checkbox-block__label">
                                            <input class="watch-filter mobile-filter" type="checkbox" name="states[]" value="{{$state->watch_state}}" id="{{rand(140001, 160000)}}"
                                                @if(request()->states)
                                                {{in_array($state->watch_state, request()->states)  ? 'checked' : ''}}
                                                @endif
                                                >
                                            <p><span>{{$state->watch_state.' ('.$state->count_watch_state.')'}}</span></p>
                                        </label>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </li>
                <li>
                    <p>Обьем доставки</p>
                    <div class="filters-mob-list__content">
                        <div class="filters-search">
                            <input class="filters-search-field" data-search-list="filters-mob-model" type="text"
                                   placeholder="Поиск по фильтру">
                            <span class="clear-field-btn"></span>
                        </div>
                        <ul>
                            @foreach($deliveryVolumes as $deliveryVolume)
                                <li>
                                    <div class="checkbox-block">
                                        <label class="checkbox-block__label">
                                            <input class="watch-filter mobile-filter" type="checkbox" name="deliveryVolumes[]" value="{{$deliveryVolume->delivery_volume}}" id="{{rand(160001, 180000)}}"
                                                @if(request()->deliveryVolumes)
                                                {{in_array($deliveryVolume->delivery_volume, request()->deliveryVolumes)  ? 'checked' : ''}}
                                                @endif
                                                >
                                            <p><span>{{$deliveryVolume->delivery_volume.' ('.$deliveryVolume->count_delivery_volume.')'}}</span></p>
                                        </label>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </li>
                <li>
                    <p>Пол</p>
                    <div class="filters-mob-list__content">
                        <div class="filters-search">
                            <input class="filters-search-field" data-search-list="filters-mob-model" type="text"
                                   placeholder="Поиск по фильтру">
                            <span class="clear-field-btn"></span>
                        </div>
                        <ul>
                            @foreach($sexes as $sex)
                                <li>
                                    <div class="checkbox-block">
                                        <label class="checkbox-block__label">
                                            <input class="watch-filter mobile-filter" type="checkbox" name="sexes[]" value="{{$sex->sex_title}}" id="{{$sex->sex_title}}"
                                                @if(request()->sexes)
                                                {{in_array($sex->sex_title, request()->sexes)  ? 'checked' : ''}}
                                                @endif
                                                >
                                            <p><span>{{$sex->sex_title.' ('.$sex->count_sex_title.')'}}</span></p>
                                        </label>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </li>
                <li>
                    <p>Тип часов</p>
                    <div class="filters-mob-list__content">
                        <div class="filters-search">
                            <input class="filters-search-field" data-search-list="filters-mob-model" type="text"
                                   placeholder="Поиск по фильтру">
                            <span class="clear-field-btn"></span>
                        </div>
                        <ul>
                            @foreach($types as $type)
                                <li>
                                    <div class="checkbox-block">
                                        <label class="checkbox-block__label">
                                            <input class="watch-filter mobile-filter" type="checkbox" name="types[]" value="{{$type->watch_type_title}}" id="{{rand(180001, 200000)}}"
                                                @if(request()->types)
                                                {{in_array($type->watch_type_title, request()->types)  ? 'checked' : ''}}
                                                @endif
                                                >
                                            <p><span>{{$type->watch_type_title.' ('.$type->count_watch_type_title.')'}}</span></p>
                                        </label>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </li>
            </ul>
            <div class="filters-buttons">
                @auth
                    <button data-fancybox data-src="#save-filter-modal" href="javascript:;" class="filters-save-btn btn-hover-w" type="button">Сохранить поисковый запрос</button>
                @endauth
                <button class="filters-submit-btn btn-hover mobile-submit-btn" type="submit">Применить</button>
            </div>
        </div>
    </form>
    @if(isset($user))
        <form class="filters-desc filter-search" method="get" action="{{route('catalog.seller-ads', $user)}}">
    @elseif(isset($vipHome))
        <form class="filters-desc filter-search" method="get" action="{{route('result_for_home')}}">
    @else
        <form class="filters-desc filter-search" method="get" action="{{route('catalog')}}">
    @endif
        <div class="filters-desc-tabs">
            <button class="reset-filters-btn btn-hover" type="reset">Сбросить</button>
            <ul class="filters-desc-nav">
                <li data-tab="filters-desc-brand">Марка</li>
                <li data-tab="filters-desc-model">Модель</li>
                <li data-tab="filters-desc-price">Цена</li>
                <li data-tab="filters-desc-diameter">Диаметр</li>
                <li data-tab="filters-desc-year">Год</li>
                <li data-tab="filters-desc-location">Местоположение</li>
                <li data-tab="filters-desc-more">Больше</li>
            </ul>
        </div>
        <div id="save-filter-modal" class="modal">
            <div class="modal__content">
                <h5 class="modal__title">Сохранение фильтра</h5>
                <p class="modal__text">
                    Введите, пожалуйста, название фильтра для сохранения.
                </p>
                <div id="save-filter-form" class="change-pass-mail">
                    <input id="input-save-search" name="title_search" type="text" placeholder="Введите название фильтра">
                    <span>Обязательное поле*</span>
                    <a href="{{route('catalog.save-search')}}"><button id="button-save-search" class="btn-arrow" type="button">Сохранить запрос</button></a>
                </div>
            </div>
        </div>
        <div class="filters-desc-categories">
            <div id="filters-desc-brand" class="filters-desc-category">
                <span class="filters-desc__close-btn"></span>
                <div class="filters-desc-choices">
                    <div class="filters-desc-choices__items">
                        <h4>ВАШ ВЫБОР<span class="clear-filter-choices-btn"></span></h4>
                        <ul data-list="filters-desc-diameter-list" class="filters-desc-choices-list">

                        </ul>
                    </div>

                </div>
                <div class="filters-desc-inputs">
                    <div class="filters-search">
                        <input class="filters-search-field" data-search-list="filters-desc-brand-list" type="text"
                               placeholder="Поиск по фильтру">
                        <span class="clear-field-btn"></span>
                    </div>
                    <ul id="filters-desc-brand-list" class="checkboxes-list">
                        @foreach($brands as $brand)
                            <li>
                                <div class="checkbox-block">
                                    <label class="checkbox-block__label">
                                        <input class="watch-filter desc-filter" type="checkbox" name="brands[]" value="{{$brand->watch_make_title}}" id="{{rand(1, 20000)}}"
                                            @if(request()->brands)
                                            {{in_array($brand->watch_make_title, request()->brands)  ? 'checked' : ''}}
                                            @endif
                                            >
                                        <p><span>{{$brand->watch_make_title.' ('.$brand->count_watch_make_title.')'}}</span></p>
                                    </label>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    <div class="filters-buttons">
                        @auth
                        <button data-fancybox data-src="#save-filter-modal" href="javascript:;" class="filters-save-btn btn-hover-w" type="button">Сохранить поисковый запрос</button>
                        @endauth
                        <button class="filters-submit-btn desc-submit-btn btn-hover" type="submit">Применить</button>
                    </div>
                </div>
            </div>
            <div id="filters-desc-model" class="filters-desc-category">
                <span class="filters-desc__close-btn"></span>
                <div class="filters-desc-choices">
                    <div class="filters-desc-choices__items">
                        <h4>ВАШ ВЫБОР<span class="clear-filter-choices-btn"></span></h4>
                        <ul data-list="filters-desc-brand-list" class="filters-desc-choices-list">
                        </ul>
                    </div>

                </div>
                <div class="filters-desc-inputs">
                    <div class="filters-search">
                        <input class="filters-search-field" data-search-list="filters-desc-model-list" type="text"
                               placeholder="Поиск по фильтру">
                        <span class="clear-field-btn"></span>
                    </div>
                    <ul id="filters-desc-model-list" class="checkboxes-list">
                        @foreach($models as $model)
                            <li>
                                <div class="checkbox-block">
                                    <label class="checkbox-block__label">
                                        <input class="watch-filter desc-filter" type="checkbox" name="models[]" value="{{$model->watch_model_title}}" id="{{rand(20001, 40000)}}"
                                            @if(request()->models)
                                            {{in_array($model->watch_model_title, request()->models)  ? 'checked' : ''}}
                                            @endif
                                            >
                                        <p><span>{{$model->watch_model_title.' ('.$model->count_watch_model_title.')'}}</span></p>
                                    </label>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    <div class="filters-buttons">
                        @auth
                            <button data-fancybox data-src="#save-filter-modal" href="javascript:;" class="filters-save-btn btn-hover-w" type="button">Сохранить поисковый запрос</button>
                        @endauth
                        <button class="filters-submit-btn desc-submit-btn btn-hover" type="submit">Применить</button>
                    </div>
                </div>
            </div>
            <div id="filters-desc-price" class="filters-desc-category filters-desc-category_price">
                <span class="filters-desc__close-btn"></span>
                <div class="price-slider">
                    <div class="price-slider__line">
                        <input id="slider-price-desc" type="text" class="range-slider watch-filter desc-filter" value=""
                               data-from="0"
                               data-to="{{$maxPrice}}" data-min="0" data-max="{{$maxPrice}}"/>
                    </div>
                    <div class="price-slider__controls">
                        <input id="slider-price-desc-from" type="text" class="price-slider__from watch-filter desc-filter" name="prices[0]" value="0"/>
                        <p>{{$filter_currency}}</p>
                        <input id="slider-price-desc-to" type="text" class="price-slider__to watch-filter desc-filter" name="prices[1]" value="{{$maxPrice}}"/>
                    </div>
                </div>
                <div class="filters-buttons">
                    <button data-fancybox data-src="#save-filter-modal" href="javascript:;" class="filters-save-btn btn-hover-w" type="button">Сохранить поисковый запрос</button>
                    <button class="filters-submit-btn desc-submit-btn btn-hover" type="submit">Применить</button>
                </div>
            </div>
            <div id="filters-desc-diameter" class="filters-desc-category">
                <span class="filters-desc__close-btn"></span>
                <div class="filters-desc-choices">
                    <div class="filters-desc-choices__items">
                        <h4>ВАШ ВЫБОР<span class="clear-filter-choices-btn"></span></h4>
                        <ul data-list="filters-desc-diameter-list" class="filters-desc-choices-list">
                        </ul>
                    </div>

                </div>
                <div class="filters-desc-inputs">
                    <div class="filters-search">
                        <input class="filters-search-field" data-search-list="filters-desc-diameter-list" type="text"
                               placeholder="Поиск по фильтру">
                        <span class="clear-field-btn"></span>
                    </div>
                    <ul id="filters-desc-diameter-list" class="checkboxes-list">
                        @foreach($diameters as $diameter)
                            <li>
                                <div class="checkbox-block">
                                    <label class="checkbox-block__label">
                                        @if($diameter->height == $diameter->width)
                                            <input class="watch-filter desc-filter" type="checkbox" name="diameters[]" value="{{$diameter->height}}" id="{{rand(40001, 60000)}}"
                                                @if(request()->diameters)
                                                {{in_array($diameter->height, request()->diameters)  ? 'checked' : ''}}
                                                @endif
                                                >
                                            <p>
                                                <span>{{$diameter->height}}</span>
                                            </p>
                                        @else
                                            <input class="watch-filter desc-filter" type="checkbox" name="diameters[]" value="{{$diameter->height.'/'.$diameter->width}}" id="{{rand(60001, 80000)}}"
                                                @if(request()->diameters)
                                                {{in_array($diameter->height.'/'.$diameter->width, request()->diameters)  ? 'checked' : ''}}
                                                @endif
                                                >
                                            <p>
                                                <span>{{$diameter->height.'/'.$diameter->width}}</span>
                                            </p>
                                        @endif
                                    </label>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    <div class="filters-buttons">
                        @auth
                            <button data-fancybox data-src="#save-filter-modal" href="javascript:;" class="filters-save-btn btn-hover-w" type="button">Сохранить поисковый запрос</button>
                        @endauth
                        <button class="filters-submit-btn desc-submit-btn btn-hover" type="submit">Применить</button>
                    </div>
                </div>
            </div>
            <div id="filters-desc-year" class="filters-desc-category">
                <span class="filters-desc__close-btn"></span>
                <div class="filters-desc-choices">
                    <div class="filters-desc-choices__items">
                        <h4>ВАШ ВЫБОР<span class="clear-filter-choices-btn"></span></h4>
                        <ul data-list="filters-desc-year-list" class="filters-desc-choices-list">
                        </ul>
                    </div>

                </div>
                <div class="filters-desc-inputs">
                    <div class="filters-search">
                        <input class="filters-search-field" data-search-list="filters-desc-year-list" type="text"
                               placeholder="Поиск по фильтру">
                        <span class="clear-field-btn"></span>
                    </div>
                    <ul id="filters-desc-brand-year" class="checkboxes-list">
                        @foreach($years as $year)
                            <li>
                                <div class="checkbox-block">
                                    <label class="checkbox-block__label">
                                        <input class="watch-filter desc-filter" type="checkbox" name="years[]" value="{{$year->release_year}}" id="{{rand(60001, 80000)}}"
                                            @if(request()->years)
                                            {{in_array($year->release_year, request()->years)  ? 'checked' : ''}}
                                            @endif
                                            >
                                        <p><span>{{$year->release_year.' ('.$year->count_release_year.')'}}</span></p>
                                    </label>
                                </div>
                            </li>
                        @endforeach
{{--                        <li>--}}
{{--                            <div class="checkbox-block">--}}
{{--                                <label class="checkbox-block__label">--}}
{{--                                    <input class="watch-filter desc-filter" type="checkbox" name="years[]" value="Victorinox">--}}
{{--                                    <p>--}}
{{--                                        <span>Неизвесто{{' ('.count($watchAdverts->where('is_release_year_confirmed', 0)).')'}}</span>--}}
{{--                                    </p>--}}
{{--                                </label>--}}
{{--                            </div>--}}
{{--                        </li>--}}
                    </ul>
                    <div class="filters-buttons">
                        @auth
                            <button data-fancybox data-src="#save-filter-modal" href="javascript:;" class="filters-save-btn btn-hover-w" type="button">Сохранить поисковый запрос</button>
                        @endauth
                        <button class="filters-submit-btn desc-submit-btn btn-hover" type="submit">Применить</button>
                    </div>
                </div>
            </div>
            <div id="filters-desc-location" class="filters-desc-category">
                <span class="filters-desc__close-btn"></span>
                <div class="filters-desc-choices">
                    <div class="filters-desc-choices__items">
                        <h4>ВАШ ВЫБОР<span class="clear-filter-choices-btn"></span></h4>
                        <ul data-list="filters-desc-location-list" class="filters-desc-choices-list">
                        </ul>
                    </div>

                </div>
                <div class="filters-desc-inputs">
                    <div class="filters-search">
                        <input class="filters-search-field" data-search-list="filters-desc-location-list" type="text"
                               placeholder="Поиск по фильтру">
                        <span class="clear-field-btn"></span>
                    </div>
                    <ul id="filters-desc-location-list" class="checkboxes-list">
                        @foreach($regions as $region)
                            <li>
                                <div class="checkbox-block">
                                    <label class="checkbox-block__label">
                                        <input class="watch-filter desc-filter" type="checkbox" name="regions[]" value="{{$region->region}}" id="{{rand(80001, 100000)}}"
                                            @if(request()->regions)
                                            {{in_array($region->region, request()->regions)  ? 'checked' : ''}}
                                            @endif
                                            >
                                        <p><span>{{$region->region.' ('.$region->count_region.')'}}</span></p>
                                    </label>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    <div class="filters-buttons">
                        @auth
                            <button data-fancybox data-src="#save-filter-modal" href="javascript:;" class="filters-save-btn btn-hover-w" type="button">Сохранить поисковый запрос</button>
                        @endauth
                        <button class="filters-submit-btn desc-submit-btn btn-hover" type="submit">Применить</button>
                    </div>
                </div>
            </div>
            <div id="filters-desc-more" class="filters-desc-category">
                <span class="filters-desc__close-btn"></span>
                <div class="filters-more">
                    <div class="filters-more__content">
                        <div class="filters-more-item filters-more__item">
                            <div class="filters-more-item__title">
                                <h4>Дополнительно</h4>
                            </div>
                            <div class="filters-more-item__content">
                                <div>
                                    <div class="filters-more-item__list">
                                        <p>Тип механизма</p>
                                        <ul>
                                            @foreach($mechanismTypes as $mechanismType)
                                                <li>
                                                    <div class="checkbox-block">
                                                        <label class="checkbox-block__label">
                                                            <input  class="watch-filter desc-filter" type="checkbox" name="mechanismTypes[]" value="{{$mechanismType->mechanism_type_title}}" id="{{rand(100001, 120000)}}"
                                                                @if(request()->mechanismTypes)
                                                                {{in_array($mechanismType->mechanism_type_title, request()->mechanismTypes)  ? 'checked' : ''}}
                                                                @endif
                                                                >
                                                            <p><span>{{$mechanismType->mechanism_type_title.' ('.$mechanismType->count_mechanism_type_title.')'}}</span></p>
                                                        </label>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="filters-more-item__list">
                                        <p>Состояние</p>
                                        <ul>
                                            @foreach($states as $state)
                                                <li>
                                                    <div class="checkbox-block">
                                                        <label class="checkbox-block__label">
                                                            <input class="watch-filter desc-filter" type="checkbox" name="states[]" value="{{$state->watch_state}}" id="{{rand(120001, 140000)}}"
                                                                @if(request()->states)
                                                                {{in_array($state->watch_state, request()->states)  ? 'checked' : ''}}
                                                                @endif
                                                                >
                                                            <p><span>{{$state->watch_state.' ('.$state->count_watch_state.')'}}</span></p>
                                                        </label>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="filters-more-item__list">
                                        <p>Обьем доставки</p>
                                        <ul>
                                            @foreach($deliveryVolumes as $deliveryVolume)
                                                <li>
                                                    <div class="checkbox-block">
                                                        <label class="checkbox-block__label">
                                                            <input class="watch-filter desc-filter" type="checkbox" name="deliveryVolumes[]" value="{{$deliveryVolume->delivery_volume}}" id="{{rand(140001, 160000)}}"
                                                                @if(request()->deliveryVolumes)
                                                                {{in_array($deliveryVolume->delivery_volume, request()->deliveryVolumes)  ? 'checked' : ''}}
                                                                @endif
                                                                >
                                                            <p><span>{{$deliveryVolume->delivery_volume.' ('.$deliveryVolume->count_delivery_volume.')'}}</span></p>
                                                        </label>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>

                                </div>
                                <div class="filters-more-item__lists">
                                    <div class="filters-more-item__list">
                                        <p>Пол</p>
                                        <ul>
                                            @foreach($sexes as $sex)
                                                <li>
                                                    <div class="checkbox-block">
                                                        <label class="checkbox-block__label">
                                                            <input class="watch-filter desc-filter" type="checkbox" name="sexes[]" value="{{$sex->sex_title}}" id="{{rand(160001, 180000)}}"
                                                                @if(request()->sexes)
                                                                {{in_array($sex->sex_title, request()->sexes)  ? 'checked' : ''}}
                                                                @endif
                                                                >
                                                            <p><span>{{$sex->sex_title.' ('.$sex->count_sex_title.')'}}</span></p>
                                                        </label>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="filters-more-item__list">
                                        <p>Тип часов</p>
                                        <ul>
                                            @foreach($types as $type)
                                                <li>
                                                    <div class="checkbox-block">
                                                        <label class="checkbox-block__label">
                                                            <input class="watch-filter desc-filter" type="checkbox" name="types[]" value="{{$type->watch_type_title}}" id="{{rand(180001, 200000)}}"
                                                                @if(request()->types)
                                                                {{in_array($type->watch_type_title, request()->types)  ? 'checked' : ''}}
                                                                @endif
                                                                >
                                                            <p><span>{{$type->watch_type_title.' ('.$type->count_watch_type_title.')'}}</span></p>
                                                        </label>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="filters-buttons">
                        @auth
                            <button data-fancybox data-src="#save-filter-modal" href="javascript:;" class="filters-save-btn btn-hover-w" type="button">Сохранить поисковый запрос</button>
                        @endauth
                         <button class="filters-submit-btn desc-submit-btn btn-hover" type="submit">Применить</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>


