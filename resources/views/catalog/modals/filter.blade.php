<section class="filters">
    <form action="/" class="filters-mob filter-search">
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
                                            <input class="watch-filter" type="checkbox" name="brands[]" value="{{$brand->watch_make_title}}" id="{{$brand->watch_make_title}}">
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
                                            <input class="watch-filter" type="checkbox" name="models[]" value="{{$model->watch_model_title}}" id="{{$model->watch_model_title}}">
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
                                <input id="slider-price-mob" type="text" class="range-slider" name="price" value=""
                                       data-from="0"
                                       data-to="600" data-min="0" data-max="600"/>
                            </div>
                            <div class="price-slider__controls">
                                <input id="slider-price-mob-from" type="text" class="price-slider__from" value="0"/>
                                <p>uah</p>
                                <input id="slider-price-mob-to" type="text" class="price-slider__to" value="600"/>
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
                                                <input class="watch-filter" type="checkbox" name="diameters[]" value="{{$diameter->height}}" id="{{$diameter->height}}">
                                                <p>
                                                    <span>{{$diameter->height.' ('.$diameter->count_height.')'}}</span>
                                                </p>
                                            @else
                                                <input class="watch-filter" type="checkbox" name="diameters[]" value="{{$diameter->height.'/'.$diameter->width}}" id="{{$diameter->height.'/'.$diameter->width}}">
                                                <p>
                                                    <span>{{$diameter->height.'/'.$diameter->width.' ('.$diameter->count_height.')'}}</span>
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
                                            <input class="watch-filter" type="checkbox" name="years[]" value="{{$year->release_year}}" id="{{$year->release_year}}">
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
                                            <input class="watch-filter" type="checkbox" name="regions[]" value="{{$region->region}}" id="{{$region->region}}">
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
                                            <input  class="watch-filter" type="checkbox" name="mechanismTypes[]" value="{{$mechanismType->mechanism_type_title}}" id="{{$mechanismType->mechanism_type_title}}">
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
                                            <input class="watch-filter" type="checkbox" name="states[]" value="{{$state->watch_state}}" id="{{$state->watch_state}}">
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
                                            <input class="watch-filter" type="checkbox" name="deliveryVolumes[]" value="{{$deliveryVolume->delivery_volume}}" id="{{$deliveryVolume->delivery_volume}}">
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
                                            <input class="watch-filter" type="checkbox" name="sexes[]" value="{{$sex->sex_title}}" id="{{$sex->sex_title}}">
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
                                            <input class="watch-filter" type="checkbox" name="types[]" value="{{$type->watch_type_title}}" id="{{$type->watch_type_title}}">
                                            <p><span>{{$type->watch_type_title.' ('.$type->count_watch_type_title.')'}}</span></p>
                                        </label>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </li>
            <div class="filters-buttons">
                <button class="filters-save-btn btn-hover-w" type="button">Сохранить фильтр</button>
                <button class="filters-submit-btn btn-hover" type="submit">Применить</button>
            </div>
        </div>
    </form>
{{--    <form id="filter" class="filters-desc" method="get" action="{{route('catalog.filter-json')}}">--}}
    <form class="filters-desc filter-search" method="get" action="{{route('catalog')}}">
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
                                        <input class="watch-filter" type="checkbox" name="brands[]" value="{{$brand->watch_make_title}}" id="{{$brand->watch_make_title}}">
                                        <p><span>{{$brand->watch_make_title.' ('.$brand->count_watch_make_title.')'}}</span></p>
                                    </label>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    <div class="filters-buttons">
                        <button data-fancybox data-src="#password-modal" href="javascript:;" class="filters-save-btn btn-hover-w" type="button">Сохранить поисковый запрос</button>
                        <button class="filters-submit-btn btn-hover" type="submit">Применить</button>
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
                                        <input class="watch-filter" type="checkbox" name="models[]" value="{{$model->watch_model_title}}" id="{{$model->watch_model_title}}">
                                        <p><span>{{$model->watch_model_title.' ('.$model->count_watch_model_title.')'}}</span></p>
                                    </label>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    <div class="filters-buttons">
                        <button data-fancybox data-src="#password-modal" href="javascript:;" class="filters-save-btn btn-hover-w" type="button">Сохранить поисковый запрос</button>
                        <button id="ajax_button" class="filters-save-btn btn-hover-w" type="submit"><a href="{{route('catalog.save-search')}}">Аjax</a></button>
                        <button class="filters-save-btn btn-hover-w" type="button"><a href="{{route('catalog.save-search')}}">with reload</a></button>
                        <button class="filters-submit-btn btn-hover" type="submit">Применить</button>
                    </div>
                </div>
            </div>
            <div id="filters-desc-price" class="filters-desc-category filters-desc-category_price">
                <span class="filters-desc__close-btn"></span>
                <div class="price-slider">
                    <div class="price-slider__line">
                        <input id="slider-price-desc" type="text" class="range-slider watch-filter" value=""
                               data-from="0"
                               data-to="{{$maxPrice}}" data-min="0" data-max="{{$maxPrice}}"/>
                    </div>
                    <div class="price-slider__controls">
                        <input id="slider-price-desc-from" type="text" class="price-slider__from watch-filter" name="prices[0]" value="0"/>
                        <p>uah</p>
                        <input id="slider-price-desc-to" type="text" class="price-slider__to watch-filter" name="prices[1]" value="300"/>
                    </div>
                </div>
                <div class="filters-buttons">
                    <button data-fancybox data-src="#password-modal" href="javascript:;" class="filters-save-btn btn-hover-w" type="button">Сохранить поисковый запрос</button>
                    <button class="filters-submit-btn btn-hover" type="submit">Применить</button>
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
                                            <input class="watch-filter" type="checkbox" name="diameters[]" value="{{$diameter->height}}" id="{{$diameter->height}}">
                                            <p>
                                                <span>{{$diameter->height.' ('.$diameter->count_height.')'}}</span>
                                            </p>
                                        @else
                                            <input class="watch-filter" type="checkbox" name="diameters[]" value="{{$diameter->height.'/'.$diameter->width}}" id="{{$diameter->height.'/'.$diameter->width}}">
                                            <p>
                                                <span>{{$diameter->height.'/'.$diameter->width.' ('.$diameter->count_height.')'}}</span>
                                            </p>
                                        @endif
                                    </label>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    <div class="filters-buttons">
                        <button data-fancybox data-src="#password-modal" href="javascript:;" class="filters-save-btn btn-hover-w" type="button">Сохранить поисковый запрос</button>
                        <button class="filters-submit-btn btn-hover" type="submit">Применить</button>
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
                                        <input class="watch-filter" type="checkbox" name="years[]" value="{{$year->release_year}}" id="{{$year->release_year}}">
                                        <p><span>{{$year->release_year.' ('.$year->count_release_year.')'}}</span></p>
                                    </label>
                                </div>
                            </li>
                        @endforeach
{{--                        <li>--}}
{{--                            <div class="checkbox-block">--}}
{{--                                <label class="checkbox-block__label">--}}
{{--                                    <input class="watch-filter" type="checkbox" name="years[]" value="Victorinox">--}}
{{--                                    <p>--}}
{{--                                        <span>Неизвесто{{' ('.count($watchAdverts->where('is_release_year_confirmed', 0)).')'}}</span>--}}
{{--                                    </p>--}}
{{--                                </label>--}}
{{--                            </div>--}}
{{--                        </li>--}}
                    </ul>
                    <div class="filters-buttons">
                        <button data-fancybox data-src="#password-modal" href="javascript:;" class="filters-save-btn btn-hover-w" type="button">Сохранить поисковый запрос</button>
                        <button class="filters-submit-btn btn-hover" type="submit">Применить</button>
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
                                        <input class="watch-filter" type="checkbox" name="regions[]" value="{{$region->region}}" id="{{$region->region}}">
                                        <p><span>{{$region->region.' ('.$region->count_region.')'}}</span></p>
                                    </label>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    <div class="filters-buttons">
                        <button data-fancybox data-src="#password-modal" href="javascript:;" class="filters-save-btn btn-hover-w" type="button">Сохранить поисковый запрос</button>
                        <button class="filters-submit-btn btn-hover" type="submit">Применить</button>
                    </div>
                </div>
            </div>
            <div id="filters-desc-more" class="filters-desc-category">
                <span class="filters-desc__close-btn"></span>
                <div class="filters-more">
                    <div class="filters-more__content">
                        <div class="filters-more-item filters-more__item">
                            <div class="filters-more-item__title">
                                <h4>Общие данные</h4>
                            </div>
                            <div class="filters-more-item__content">
                                <div>
                                    <div class="filters-more-item__list">
                                        <p>Марка</p>
                                        <ul>
                                            @foreach($brands as $brand)
                                                <li>
                                                    <div class="checkbox-block">
                                                        <label class="checkbox-block__label">
                                                            <input class="watch-filter" type="checkbox" name="brands[]" value="{{$brand->watch_make_title}}" id="{{$brand->watch_make_title}}">
                                                            <p><span>{{$brand->watch_make_title.' ('.$brand->count_watch_make_title.')'}}</span></p>
                                                        </label>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="filters-more-item__list">
                                        <p>Модель</p>
                                        <ul>
                                            @foreach($models as $model)
                                                <li>
                                                    <div class="checkbox-block">
                                                        <label class="checkbox-block__label">
                                                            <input class="watch-filter" type="checkbox" name="models[]" value="{{$model->watch_model_title}}" id="{{$model->watch_model_title}}">
                                                            <p><span>{{$model->watch_model_title.' ('.$model->count_watch_model_title.')'}}</span></p>
                                                        </label>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="filters-more-item__list">
                                        <p>Диаметры</p>
                                        <ul>
                                            @foreach($diameters as $diameter)
                                                <li>
                                                    <div class="checkbox-block">
                                                        <label class="checkbox-block__label">
                                                            @if($diameter->height == $diameter->width)
                                                                <input  class="watch-filter" type="checkbox" name="diameters[]" value="{{$diameter->height}}" id="{{$diameter->height}}">
                                                                <p>
                                                                    <span>{{$diameter->height.' ('.$diameter->count_height.')'}}</span>
                                                                </p>
                                                            @else
                                                                <input class="watch-filter" type="checkbox" name="diameters[]" value="{{$diameter->height.'/'.$diameter->width}}" id="{{$diameter->height.'/'.$diameter->width}}">
                                                                <p>
                                                                    <span>{{$diameter->height.'/'.$diameter->width.' ('.$diameter->count_height.')'}}</span>
                                                                </p>
                                                            @endif
                                                        </label>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <div class="filters-more-item__lists">
                                    <div class="filters-more-item__list">
                                        <p>Год</p>
                                        <ul>
                                            @foreach($years as $year)
                                                <li>
                                                    <div class="checkbox-block">
                                                        <label class="checkbox-block__label">
                                                            <input class="watch-filter" type="checkbox" name="years[]" value="{{$year->release_year}}" id="{{$year->release_year}}">
                                                            <p><span>{{$year->release_year.' ('.$year->count_release_year.')'}}</span></p>
                                                        </label>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="filters-more-item__list">
                                        <p>Местоположение</p>
                                        <ul>
                                            @foreach($regions as $region)
                                                <li>
                                                    <div class="checkbox-block">
                                                        <label class="checkbox-block__label">
                                                            <input class="watch-filter" type="checkbox" name="regions[]" value="{{$region->region}}" id="{{$region->region}}">
                                                            <p><span>{{$region->region.' ('.$region->count_region.')'}}</span></p>
                                                        </label>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                                                            <input  class="watch-filter" type="checkbox" name="mechanismTypes[]" value="{{$mechanismType->mechanism_type_title}}" id="{{$mechanismType->mechanism_type_title}}">
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
                                                            <input class="watch-filter" type="checkbox" name="states[]" value="{{$state->watch_state}}" id="{{$state->watch_state}}">
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
                                                            <input class="watch-filter" type="checkbox" name="deliveryVolumes[]" value="{{$deliveryVolume->delivery_volume}}" id="{{$deliveryVolume->delivery_volume}}">
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
                                                            <input class="watch-filter" type="checkbox" name="sexes[]" value="{{$sex->sex_title}}" id="{{$sex->sex_title}}">
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
                                                            <input class="watch-filter" type="checkbox" name="types[]" value="{{$type->watch_type_title}}" id="{{$type->watch_type_title}}">
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
                        <button data-fancybox data-src="#password-modal" href="javascript:;" class="filters-save-btn btn-hover-w" type="button">Сохранить поисковый запрос</button>
                        <button class="filters-submit-btn btn-hover" type="submit">Применить</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>
