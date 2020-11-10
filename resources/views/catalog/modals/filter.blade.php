<section class="filters">
    <form class="filters-desc" method="post" action="{{route('catalog.filter')}}">
        @csrf
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
                        <ul data-list="filters-desc-brand-list" class="filters-desc-choices-list">
                            <li>
                                <div data-choice-value="Victorinox">Victorinox <span class="delete-choice-btn"></span>
                                </div>
                            </li>
                            <li>
                                <div data-choice-value="Nouvelle Horlogerie Calabrese (NHC)">Nouvelle Horlogerie
                                    Calabrese (NHC) <span class="delete-choice-btn"></span></div>
                            </li>
                        </ul>
                    </div>
                    <div class="filters-desc-choices__quick">
                        <h4>Быстрый выбор</h4>
                        <ul>
                            <li>Victorinox</li>
                            <li>Wittnauer</li>
                            <li>Nouvelle</li>
                            <li>Victorinox</li>
                            <li>Wittnauer</li>
                            <li>Nouvelle</li>
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
                                    <input type="checkbox" name="brand" value="Victorinox">
                                    <p><span>{{ $brand->title.' ('.count($brand->watchAdverts).')'}}</span></p>
                                </label>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                    <div class="filters-buttons">
                        <button class="filters-save-btn btn-hover-w" type="button">Сохранить поисковый запрос</button>
                        <button class="filters-submit-btn btn-hover" type="submit">Применить (327)</button>
                    </div>
                </div>
            </div>
            <div id="filters-desc-model" class="filters-desc-category">
                <span class="filters-desc__close-btn"></span>
                <div class="filters-desc-choices">
                    <div class="filters-desc-choices__items">
                        <h4>ВАШ ВЫБОР<span class="clear-filter-choices-btn"></span></h4>
                        <ul data-list="filters-desc-brand-list" class="filters-desc-choices-list">
                            <li>
                                <div data-choice-value="Victorinox">Victorinox <span class="delete-choice-btn"></span>
                                </div>
                            </li>
                            <li>
                                <div data-choice-value="Nouvelle Horlogerie Calabrese (NHC)">Nouvelle Horlogerie
                                    Calabrese (NHC) <span class="delete-choice-btn"></span></div>
                            </li>
                        </ul>
                    </div>
                    <div class="filters-desc-choices__quick">
                        <h4>Быстрый выбор</h4>
                        <ul>
                            <li>Victorinox</li>
                            <li>Wittnauer</li>
                            <li>Nouvelle</li>
                            <li>Victorinox</li>
                            <li>Wittnauer</li>
                            <li>Nouvelle</li>
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
                                    <input type="checkbox" name="model" value="Victorinox">
                                    <p><span>{{$model->title.' ('.count($model->watchAdverts).')'}}</span></p>
                                </label>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                    <div class="filters-buttons">
                        <button class="filters-save-btn btn-hover-w" type="button">Сохранить поисковый запрос</button>
                        <button class="filters-submit-btn btn-hover" type="submit">Применить (327)</button>
                    </div>
                </div>
            </div>
            <div id="filters-desc-price" class="filters-desc-category filters-desc-category_price">
                <span class="filters-desc__close-btn"></span>
                <div class="price-slider">
                    <div class="price-slider__line">
                        <input id="slider-price-desc" type="text" class="range-slider" name="price" value=""
                               data-from="0"
                               data-to="600" data-min="0" data-max="600"/>
                    </div>
                    <div class="price-slider__controls">
                        <input id="slider-price-desc-from" type="text" class="price-slider__from" value="0"/>
                        <p>uah</p>
                        <input id="slider-price-desc-to" type="text" class="price-slider__to" value="600"/>
                    </div>
                </div>
                <div class="filters-buttons">
                    <button class="filters-save-btn btn-hover-w" type="button">Сохранить поисковый запрос</button>
                    <button class="filters-submit-btn btn-hover" type="submit">Применить (327)</button>
                </div>
            </div>
            <div id="filters-desc-diameter" class="filters-desc-category">
                <span class="filters-desc__close-btn"></span>
                <div class="filters-desc-choices">
                    <div class="filters-desc-choices__items">
                        <h4>ВАШ ВЫБОР<span class="clear-filter-choices-btn"></span></h4>
                        <ul data-list="filters-desc-diameter-list" class="filters-desc-choices-list">
                            <li>
                                <div data-choice-value="Victorinox">Victorinox <span class="delete-choice-btn"></span>
                                </div>
                            </li>
                            <li>
                                <div data-choice-value="Nouvelle Horlogerie Calabrese (NHC)">Nouvelle Horlogerie
                                    Calabrese (NHC) <span class="delete-choice-btn"></span></div>
                            </li>
                        </ul>
                    </div>
                    <div class="filters-desc-choices__quick">
                        <h4>Быстрый выбор</h4>
                        <ul>
                            <li>Victorinox</li>
                            <li>Wittnauer</li>
                            <li>Nouvelle</li>
                            <li>Victorinox</li>
                            <li>Wittnauer</li>
                            <li>Nouvelle</li>
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
                                    <input type="checkbox" name="diameter" value="Victorinox">
                                    <p><span>{{$diameter->height.' ('.count($diameter->watchAdverts).')'}}</span></p>
                                </label>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                    <div class="filters-buttons">
                        <button class="filters-save-btn btn-hover-w" type="button">Сохранить поисковый запрос</button>
                        <button class="filters-submit-btn btn-hover" type="submit">Применить (327)</button>
                    </div>
                </div>
            </div>
            <div id="filters-desc-year" class="filters-desc-category">
                <span class="filters-desc__close-btn"></span>
                <div class="filters-desc-choices">
                    <div class="filters-desc-choices__items">
                        <h4>ВАШ ВЫБОР<span class="clear-filter-choices-btn"></span></h4>
                        <ul data-list="filters-desc-year-list" class="filters-desc-choices-list">
                            <li>
                                <div data-choice-value="Victorinox">Victorinox <span class="delete-choice-btn"></span>
                                </div>
                            </li>
                            <li>
                                <div data-choice-value="Nouvelle Horlogerie Calabrese (NHC)">Nouvelle Horlogerie
                                    Calabrese (NHC) <span class="delete-choice-btn"></span></div>
                            </li>
                        </ul>
                    </div>
                    <div class="filters-desc-choices__quick">
                        <h4>Быстрый выбор</h4>
                        <ul>
                            <li>Victorinox</li>
                            <li>Wittnauer</li>
                            <li>Nouvelle</li>
                            <li>Victorinox</li>
                            <li>Wittnauer</li>
                            <li>Nouvelle</li>
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
                                    <input type="checkbox" name="year" value="Victorinox">
                                    <p><span>{{$year->number.' ('.count($year->watchAdverts).')'}}</span></p>
                                </label>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                    <div class="filters-buttons">
                        <button class="filters-save-btn btn-hover-w" type="button">Сохранить поисковый запрос</button>
                        <button class="filters-submit-btn btn-hover" type="submit">Применить (327)</button>
                    </div>
                </div>
            </div>
            <div id="filters-desc-location" class="filters-desc-category">
                <span class="filters-desc__close-btn"></span>
                <div class="filters-desc-choices">
                    <div class="filters-desc-choices__items">
                        <h4>ВАШ ВЫБОР<span class="clear-filter-choices-btn"></span></h4>
                        <ul data-list="filters-desc-location-list" class="filters-desc-choices-list">
                            <li>
                                <div data-choice-value="Victorinox">Victorinox <span class="delete-choice-btn"></span>
                                </div>
                            </li>
                            <li>
                                <div data-choice-value="Nouvelle Horlogerie Calabrese (NHC)">Nouvelle Horlogerie
                                    Calabrese (NHC) <span class="delete-choice-btn"></span></div>
                            </li>
                        </ul>
                    </div>
                    <div class="filters-desc-choices__quick">
                        <h4>Быстрый выбор</h4>
                        <ul>
                            <li>Victorinox</li>
                            <li>Wittnauer</li>
                            <li>Nouvelle</li>
                            <li>Victorinox</li>
                            <li>Wittnauer</li>
                            <li>Nouvelle</li>
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
                        @foreach($provinces as $province)
                        <li>
                            <div class="checkbox-block">
                                <label class="checkbox-block__label">
                                    <input type="checkbox" name="province" value="Victorinox">
                                    <p><span>{{$province->title.' ('.count($province->adverts->where('type', 'watch')).')'}}</span></p>
                                </label>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                    <div class="filters-buttons">
                        <button class="filters-save-btn btn-hover-w" type="button">Сохранить поисковый запрос</button>
                        <button class="filters-submit-btn btn-hover" type="submit">Применить (327)</button>
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
                                        <p>Тип часов</p>
                                        <ul>
                                            @foreach($types as $type)
                                            <li>
                                                <div class="checkbox-block">
                                                    <label class="checkbox-block__label">
                                                        <input type="checkbox" name="type" value="Victorinox">
                                                        <p><span>{{$type->title.' ('.count($type->watchAdverts).')'}}</span></p>
                                                    </label>
                                                </div>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="filters-more-item__list">
                                        <p>Категории</p>
                                        <ul>
                                            @foreach($categories as $category)
                                                <li>
                                                    <div class="checkbox-block">
                                                        <label class="checkbox-block__label">
                                                            <input type="checkbox" name="category" value="Victorinox">
                                                            <p><span>{{$category->title.' ('.count($category->watchModels).')'}}</span></p>
                                                        </label>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="filters-more-item__list">
                                        <p>Идентификационный номер</p>
                                        <ul>
                                            @foreach($watchModels as $watchModel)
                                                <li>
                                                    <div class="checkbox-block">
                                                        <label class="checkbox-block__label">
                                                            <input type="checkbox" name="model_code" value="Victorinox">
                                                            <p><span>{{$watchModel->model_code.' ('.count($watchModel->watchAdverts).')'}}</span></p>
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
                                                        <input type="checkbox" name="state" value="Victorinox">
                                                        <p><span>{{$state->title.' ('.count($state->watchAdverts).')'}}</span>
                                                        </p>
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
                                                            <input type="checkbox" name="delivery_volume" value="Victorinox">
                                                            <p><span>{{$deliveryVolume->title.' ('.count($deliveryVolume->adverts).')'}}</span>
                                                            </p>
                                                        </label>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="filters-more-item__lists">
                                        <div class="filters-more-item__list">
                                            <p>Пол</p>
                                            <ul>
                                                <li>
                                                    <div class="checkbox-block">
                                                        <label class="checkbox-block__label">
                                                            <input type="checkbox" name="sex[]" value="Victorinox">
                                                            <p>
                                                                <span>Мужские {{' ('.count($sex_man->watchAdverts).')'}}</span>
                                                            </p>
                                                        </label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="checkbox-block">
                                                        <label class="checkbox-block__label">
                                                            <input type="checkbox" name="sex[]" value="Victorinox">
                                                            <p>
                                                                <span>Женские {{' ('.count($sex_woman->watchAdverts).')'}}</span>
                                                            </p>
                                                        </label>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="filters-more-item filters-more__item">
                            <div class="filters-more-item__title">
                                <h4>Параметры и функции</h4>
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
                                                        <input type="checkbox" name="Victorinox" value="Victorinox">
                                                        <p><span>{{$mechanismType->title.' ('.count($mechanismType->watchAdverts).')'}}</span></p>
                                                    </label>
                                                </div>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="filters-more-item__list">
                                        <p>Материал корпуса</p>
                                        <ul>
                                            @foreach($watchMaterials as $watchMaterial)
                                            <li>
                                                <div class="checkbox-block">
                                                    <label class="checkbox-block__label">
                                                        <input type="checkbox" name="Victorinox" value="Victorinox">
                                                        <p><span>{{$watchMaterial->title.' ('.count($watchMaterial->watchAdverts).')'}}</span></p>
                                                    </label>
                                                </div>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="filters-more-item__list">
                                        <p>Циферблат</p>
                                        <ul>
                                            @foreach($watchDials as $watchDial)
                                            <li>
                                                <div class="checkbox-block">
                                                    <label class="checkbox-block__label">
                                                        <input type="checkbox" name="Victorinox" value="Victorinox">
                                                        <p><span>{{$watchDial->title.' ('.count($watchDial->watchAdverts).')'}}</span></p>
                                                    </label>
                                                </div>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="filters-more-item__list">
                                        <p>Стекло</p>
                                        <ul>
                                            @foreach($glasses as $glass)
                                            <li>
                                                <div class="checkbox-block">
                                                    <label class="checkbox-block__label">
                                                        <input type="checkbox" name="Victorinox" value="Victorinox">
                                                        <p><span>{{$glass->title.' ('.count($glass->watchAdverts).')'}}</span></p>
                                                    </label>
                                                </div>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="filters-more-item__list">
                                        <p>Функции</p>
                                        <ul>
                                            @foreach($options as $option)
                                                <li>
                                                    <div class="checkbox-block">
                                                        <label class="checkbox-block__label">
                                                            <input type="checkbox" name="Victorinox" value="Victorinox">
                                                            <p><span>{{$option->title.' ('.count($option->watchAdverts).')'}}</span></p>
                                                        </label>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="filters-more-item__list">
                                        <p>Толщина</p>
                                        <ul>
                                            @foreach($thicknesses as $thickness)
                                                <li>
                                                    <div class="checkbox-block">
                                                        <label class="checkbox-block__label">
                                                            <input type="checkbox" name="Victorinox" value="Victorinox">
                                                            <p><span>{{$thickness->title.' ('.count($thickness->watchAdverts).')'}}</span></p>
                                                        </label>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="filters-more-item__list">
                                        <p>Безель</p>
                                        <ul>
                                            @foreach($bezels as $bezel)
                                                <li>
                                                    <div class="checkbox-block">
                                                        <label class="checkbox-block__label">
                                                            <input type="checkbox" name="Victorinox" value="Victorinox">
                                                            <p><span>{{$bezel->title.' ('.count($bezel->watchAdverts).')'}}</span></p>
                                                        </label>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="filters-more-item__list">
                                        <p>Числа</p>
                                        <ul>
                                            @foreach($figures as $figure)
                                                <li>
                                                    <div class="checkbox-block">
                                                        <label class="checkbox-block__label">
                                                            <input type="checkbox" name="Victorinox" value="Victorinox">
                                                            <p><span>{{$figure->title.' ('.count($figure->watchAdverts).')'}}</span></p>
                                                        </label>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="filters-more-item__list">
                                        <p>Водонепроницаемость</p>
                                        <ul>
                                            @foreach($waterproofs as $waterproof)
                                                <li>
                                                    <div class="checkbox-block">
                                                        <label class="checkbox-block__label">
                                                            <input type="checkbox" name="Victorinox" value="Victorinox">
                                                            <p><span>{{$waterproof->title.' ('.count($waterproof->watchAdverts).')'}}</span></p>
                                                        </label>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div><div class="filters-more-item filters-more__item">
                            <div class="filters-more-item__title">
                                <h4>БРАСЛЕТ/РЕМЕШОК</h4>
                            </div>
                            <div class="filters-more-item__content">
                                <div>
                                    <div class="filters-more-item__list">
                                        <p>Материал браслета</p>
                                        <ul>
                                            @foreach($bracelets as $bracelet)
                                            <li>
                                                <div class="checkbox-block">
                                                    <label class="checkbox-block__label">
                                                        <input type="checkbox" name="bracelet_material" value="Victorinox">
                                                        <p><span>{{$bracelet->title.' ('.count($bracelet->watchAdverts).')'}}</span></p>
                                                    </label>
                                                </div>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="filters-more-item__list">
                                        <p>Застежка</p>
                                        <ul>
                                            @foreach($clasps as $clasp)
                                            <li>
                                                <div class="checkbox-block">
                                                    <label class="checkbox-block__label">
                                                        <input type="checkbox" name="$clasp" value="Victorinox">
                                                        <p><span>{{$clasp->title.' ('.count($clasp->watchAdverts).')'}}</span></p>
                                                    </label>
                                                </div>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="filters-more-item__list">
                                        <p>Метериал затяжки</p>
                                        <ul>
                                            @foreach($materialsClasps as $materialsClasp)
                                                <li>
                                                    <div class="checkbox-block">
                                                        <label class="checkbox-block__label">
                                                            <input type="checkbox" name="materials_clasp" value="Victorinox">
                                                            <p><span>{{$materialsClasp->title.' ('.count($materialsClasp->watchAdverts).')'}}</span></p>
                                                        </label>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="filters-more-item__list">
                                        <p>Цвет браслета</p>
                                        <ul>
                                            @foreach($braceletColors as $braceletColor)
                                                <li>
                                                    <div class="checkbox-block">
                                                        <label class="checkbox-block__label">
                                                            <input type="checkbox" name="bracelet_color" value="Victorinox">
                                                            <p><span>{{$braceletColor->title.' ('.count($braceletColor->watchAdverts).')'}}</span></p>
                                                        </label>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="filters-more-item__list">
                                        <p>Ширина застежки</p>
                                        <ul>
                                            @foreach($widthClasps as $widthClasp)
                                                <li>
                                                    <div class="checkbox-block">
                                                        <label class="checkbox-block__label">
                                                            <input type="checkbox" name="width_clasp" value="Victorinox">
                                                            <p><span>{{$widthClasp->title.' mm ('.count($widthClasp->watchAdverts).')'}}</span></p>
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
                        <button class="filters-save-btn btn-hover-w" type="button">Сохранить поисковый запрос</button>
                        <button class="filters-submit-btn btn-hover" type="submit">Применить (327)</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>
