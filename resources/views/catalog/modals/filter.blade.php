<section class="filters">
{{--    <form action="/" class="filters-mob">--}}
{{--        <div class="filters-mob-btns">--}}
{{--            <button class="reset-filters-btn btn-hover" type="reset">Сбросить</button>--}}
{{--            <button class="open-mob-filter-btn" type="button">Фильтр</button>--}}
{{--        </div>--}}
{{--        <div class="filters-mob-content">--}}
{{--            <ul class="filters-mob-list">--}}
{{--                <li>--}}
{{--                    <p>Марка</p>--}}
{{--                    <div class="filters-mob-list__content">--}}
{{--                        <div class="filters-search">--}}
{{--                            <input class="filters-search-field" data-search-list="filters-mob-brand" type="text"--}}
{{--                                   placeholder="Поиск по фильтру">--}}
{{--                            <span class="clear-field-btn"></span>--}}
{{--                        </div>--}}
{{--                        <ul id="filters-mob-brand" class="checkboxes-list">--}}
{{--                            @foreach($brands as $brand)--}}
{{--                                <li>--}}
{{--                                    <div class="checkbox-block">--}}
{{--                                        <label class="checkbox-block__label">--}}
{{--                                            <input type="checkbox" name="brand" value="Victorinox">--}}
{{--                                            <p><span>{{ $brand->title.' ('.count($brand->watchAdverts).')'}}</span></p>--}}
{{--                                        </label>--}}
{{--                                    </div>--}}
{{--                                </li>--}}
{{--                            @endforeach--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <p>Модель</p>--}}
{{--                    <div class="filters-mob-list__content">--}}
{{--                        <div class="filters-search">--}}
{{--                            <input class="filters-search-field" data-search-list="filters-mob-model" type="text"--}}
{{--                                   placeholder="Поиск по фильтру">--}}
{{--                            <span class="clear-field-btn"></span>--}}
{{--                        </div>--}}
{{--                        <ul id="filters-mob-model" class="checkboxes-list">--}}
{{--                            @foreach($models as $model)--}}
{{--                                <li>--}}
{{--                                    <div class="checkbox-block">--}}
{{--                                        <label class="checkbox-block__label">--}}
{{--                                            <input type="checkbox" name="model" value="Victorinox">--}}
{{--                                            <p><span>{{$model->title.' ('.count($model->watchAdverts).')'}}</span></p>--}}
{{--                                        </label>--}}
{{--                                    </div>--}}
{{--                                </li>--}}
{{--                            @endforeach--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <p>Цена</p>--}}
{{--                    <div class="filters-mob-list__content">--}}
{{--                        <div class="price-slider price-slider_mob">--}}
{{--                            <div class="price-slider__line">--}}
{{--                                <input id="slider-price-mob" type="text" class="range-slider" name="price" value=""--}}
{{--                                       data-from="0"--}}
{{--                                       data-to="600" data-min="0" data-max="600"/>--}}
{{--                            </div>--}}
{{--                            <div class="price-slider__controls">--}}
{{--                                <input id="slider-price-mob-from" type="text" class="price-slider__from" value="0"/>--}}
{{--                                <p>uah</p>--}}
{{--                                <input id="slider-price-mob-to" type="text" class="price-slider__to" value="600"/>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <p>Диаметр</p>--}}
{{--                    <div class="filters-mob-list__content">--}}
{{--                        <div class="filters-search">--}}
{{--                            <input class="filters-search-field" data-search-list="filters-mob-diameter" type="text"--}}
{{--                                   placeholder="Поиск по фильтру">--}}
{{--                            <span class="clear-field-btn"></span>--}}
{{--                        </div>--}}
{{--                        <ul id="filters-mob-diameter" class="checkboxes-list">--}}
{{--                            @foreach($diameters as $diameter)--}}
{{--                                <li>--}}
{{--                                    <div class="checkbox-block">--}}
{{--                                        <label class="checkbox-block__label">--}}
{{--                                            <input type="checkbox" name="diameter" value="Victorinox">--}}
{{--                                            <p>--}}
{{--                                                <span>{{$diameter->height.' ('.count($diameter->watchAdverts).')'}}</span>--}}
{{--                                            </p>--}}
{{--                                        </label>--}}
{{--                                    </div>--}}
{{--                                </li>--}}
{{--                            @endforeach--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <p>Год</p>--}}
{{--                    <div class="filters-mob-list__content">--}}
{{--                        <div class="filters-search">--}}
{{--                            <input class="filters-search-field" data-search-list="filters-mob-year" type="text"--}}
{{--                                   placeholder="Поиск по фильтру">--}}
{{--                            <span class="clear-field-btn"></span>--}}
{{--                        </div>--}}
{{--                        <ul id="filters-mob-year" class="checkboxes-list">--}}
{{--                            @foreach($watchAdverts as $watchAdvert)--}}
{{--                                <li>--}}
{{--                                    <div class="checkbox-block">--}}
{{--                                        <label class="checkbox-block__label">--}}
{{--                                            <input type="checkbox" name="year" value="Victorinox">--}}
{{--                                            <p><span>{{$watchAdvert->number.' ('.count($year->watchAdverts).')'}}</span></p>--}}
{{--                                            <p><span>{{$watchAdvert->number.' ('.count($year->watchAdverts).')'}}</span></p>--}}
{{--                                        </label>--}}
{{--                                    </div>--}}
{{--                                </li>--}}
{{--                            @endforeach--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <p>Местоположение</p>--}}
{{--                    <div class="filters-mob-list__content">--}}
{{--                        <div class="filters-search">--}}
{{--                            <input class="filters-search-field" data-search-list="filters-mob-location" type="text"--}}
{{--                                   placeholder="Поиск по фильтру">--}}
{{--                            <span class="clear-field-btn"></span>--}}
{{--                        </div>--}}
{{--                        <ul id="filters-mob-location" class="checkboxes-list">--}}
{{--                            @foreach($provinces as $province)--}}
{{--                                <li>--}}
{{--                                    <div class="checkbox-block">--}}
{{--                                        <label class="checkbox-block__label">--}}
{{--                                            <input type="checkbox" name="province" value="Victorinox">--}}
{{--                                            <p>--}}
{{--                                                <span>{{$province->title.' ('.count($province->adverts->where('type', 'watch')).')'}}</span>--}}
{{--                                            </p>--}}
{{--                                        </label>--}}
{{--                                    </div>--}}
{{--                                </li>--}}
{{--                            @endforeach--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </li>--}}
{{--                <li class="title">--}}
{{--                    <h5>Общие данные</h5>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <p>Тип часов</p>--}}
{{--                    <div class="filters-mob-list__content">--}}
{{--                        <ul id="filters-mob-model" class="checkboxes-list">--}}
{{--                            @foreach($types as $type)--}}
{{--                                <li>--}}
{{--                                    <div class="checkbox-block">--}}
{{--                                        <label class="checkbox-block__label">--}}
{{--                                            <input type="checkbox" name="type" value="Victorinox">--}}
{{--                                            <p><span>{{$type->title.' ('.count($type->watchAdverts).')'}}</span></p>--}}
{{--                                        </label>--}}
{{--                                    </div>--}}
{{--                                </li>--}}
{{--                            @endforeach--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <p>Категория</p>--}}
{{--                    <div class="filters-mob-list__content">--}}
{{--                        <ul id="filters-mob-model" class="checkboxes-list">--}}
{{--                            @foreach($categories as $category)--}}
{{--                                <li>--}}
{{--                                    <div class="checkbox-block">--}}
{{--                                        <label class="checkbox-block__label">--}}
{{--                                            <input type="checkbox" name="category" value="Victorinox">--}}
{{--                                            <p><span>{{$category->title.' ('.count($category->watchModels).')'}}</span>--}}
{{--                                            </p>--}}
{{--                                        </label>--}}
{{--                                    </div>--}}
{{--                                </li>--}}
{{--                            @endforeach--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <p>Идентификационный номер</p>--}}
{{--                    <div class="filters-mob-list__content">--}}
{{--                        <ul id="filters-mob-model" class="checkboxes-list">--}}
{{--                            @foreach($watchModels as $watchModel)--}}
{{--                                <li>--}}
{{--                                    <div class="checkbox-block">--}}
{{--                                        <label class="checkbox-block__label">--}}
{{--                                            <input type="checkbox" name="model_code" value="Victorinox">--}}
{{--                                            <p>--}}
{{--                                                <span>{{$watchModel->model_code.' ('.count($watchModel->watchAdverts).')'}}</span>--}}
{{--                                            </p>--}}
{{--                                        </label>--}}
{{--                                    </div>--}}
{{--                                </li>--}}
{{--                            @endforeach--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <p>Состояние</p>--}}
{{--                    <div class="filters-mob-list__content">--}}
{{--                        <ul id="filters-mob-model" class="checkboxes-list">--}}
{{--                            @foreach($states as $state)--}}
{{--                                <li>--}}
{{--                                    <div class="checkbox-block">--}}
{{--                                        <label class="checkbox-block__label">--}}
{{--                                            <input type="checkbox" name="state" value="Victorinox">--}}
{{--                                            <p><span>{{$state->title.' ('.count($state->watchAdverts).')'}}</span>--}}
{{--                                            </p>--}}
{{--                                        </label>--}}
{{--                                    </div>--}}
{{--                                </li>--}}
{{--                            @endforeach--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <p>Обьем доставки</p>--}}
{{--                    <div class="filters-mob-list__content">--}}
{{--                        <ul id="filters-mob-model" class="checkboxes-list">--}}
{{--                            @foreach($deliveryVolumes as $deliveryVolume)--}}
{{--                                <li>--}}
{{--                                    <div class="checkbox-block">--}}
{{--                                        <label class="checkbox-block__label">--}}
{{--                                            <input type="checkboxdelivery_volume" value="Victorinox">--}}
{{--                                            <p>--}}
{{--                                                <span>{{$deliveryVolume->title.' ('.count($deliveryVolume->adverts).')'}}</span>--}}
{{--                                            </p>--}}
{{--                                        </label>--}}
{{--                                    </div>--}}
{{--                                </li>--}}
{{--                            @endforeach--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <p>Пол</p>--}}
{{--                    <div class="filters-mob-list__content">--}}
{{--                        <ul id="filters-mob-model" class="checkboxes-list">--}}
{{--                            <li>--}}
{{--                                <div class="checkbox-block">--}}
{{--                                    <label class="checkbox-block__label">--}}
{{--                                        <input type="checkbox" name="sex[]" value="Victorinox">--}}
{{--                                        <p>--}}
{{--                                            <span>Мужские {{' ('.count($sex_man->watchAdverts).')'}}</span>--}}
{{--                                        </p>--}}
{{--                                    </label>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <div class="checkbox-block">--}}
{{--                                    <label class="checkbox-block__label">--}}
{{--                                        <input type="checkbox" name="sex[]" value="Victorinox">--}}
{{--                                        <p>--}}
{{--                                            <span>Женские {{' ('.count($sex_woman->watchAdverts).')'}}</span>--}}
{{--                                        </p>--}}
{{--                                    </label>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </li>--}}
{{--                <li class="title">--}}
{{--                    <h5>Параметры и функции</h5>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <p>Тип механизма</p>--}}
{{--                    <div class="filters-mob-list__content">--}}
{{--                        <ul id="filters-mob-model" class="checkboxes-list">--}}
{{--                            @foreach($mechanismTypes as $mechanismType)--}}
{{--                                <li>--}}
{{--                                    <div class="checkbox-block">--}}
{{--                                        <label class="checkbox-block__label">--}}
{{--                                            <input type="checkbox" name="Victorinox" value="Victorinox">--}}
{{--                                            <p>--}}
{{--                                                <span>{{$mechanismType->title.' ('.count($mechanismType->watchAdverts).')'}}</span>--}}
{{--                                            </p>--}}
{{--                                        </label>--}}
{{--                                    </div>--}}
{{--                                </li>--}}
{{--                            @endforeach--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <p>Материал корпуса</p>--}}
{{--                    <div class="filters-mob-list__content">--}}
{{--                        <ul id="filters-mob-model" class="checkboxes-list">--}}
{{--                            @foreach($watchMaterials as $watchMaterial)--}}
{{--                                <li>--}}
{{--                                    <div class="checkbox-block">--}}
{{--                                        <label class="checkbox-block__label">--}}
{{--                                            <input type="checkbox" name="Victorinox" value="Victorinox">--}}
{{--                                            <p>--}}
{{--                                                <span>{{$watchMaterial->title.' ('.count($watchMaterial->watchAdverts).')'}}</span>--}}
{{--                                            </p>--}}
{{--                                        </label>--}}
{{--                                    </div>--}}
{{--                                </li>--}}
{{--                            @endforeach--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <p>Циферблат</p>--}}
{{--                    <div class="filters-mob-list__content">--}}
{{--                        <ul id="filters-mob-model" class="checkboxes-list">--}}
{{--                            @foreach($watchDials as $watchDial)--}}
{{--                                <li>--}}
{{--                                    <div class="checkbox-block">--}}
{{--                                        <label class="checkbox-block__label">--}}
{{--                                            <input type="checkbox" name="Victorinox" value="Victorinox">--}}
{{--                                            <p>--}}
{{--                                                <span>{{$watchDial->title.' ('.count($watchDial->watchAdverts).')'}}</span>--}}
{{--                                            </p>--}}
{{--                                        </label>--}}
{{--                                    </div>--}}
{{--                                </li>--}}
{{--                            @endforeach--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <p>Стекло</p>--}}
{{--                    <div class="filters-mob-list__content">--}}
{{--                        <ul id="filters-mob-model" class="checkboxes-list">--}}
{{--                            @foreach($glasses as $glass)--}}
{{--                                <li>--}}
{{--                                    <div class="checkbox-block">--}}
{{--                                        <label class="checkbox-block__label">--}}
{{--                                            <input type="checkbox" name="Victorinox" value="Victorinox">--}}
{{--                                            <p><span>{{$glass->title.' ('.count($glass->watchAdverts).')'}}</span></p>--}}
{{--                                        </label>--}}
{{--                                    </div>--}}
{{--                                </li>--}}
{{--                            @endforeach--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <p>Функции</p>--}}
{{--                    <div class="filters-mob-list__content">--}}
{{--                        <ul id="filters-mob-model" class="checkboxes-list">--}}
{{--                            @foreach($options as $option)--}}
{{--                                <li>--}}
{{--                                    <div class="checkbox-block">--}}
{{--                                        <label class="checkbox-block__label">--}}
{{--                                            <input type="checkbox" name="Victorinox" value="Victorinox">--}}
{{--                                            <p><span>{{$option->title.' ('.count($option->watchAdverts).')'}}</span></p>--}}
{{--                                        </label>--}}
{{--                                    </div>--}}
{{--                                </li>--}}
{{--                            @endforeach--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <p>Толщина корпуса</p>--}}
{{--                    <div class="filters-mob-list__content">--}}
{{--                        <ul id="filters-mob-model" class="checkboxes-list">--}}
{{--                            @foreach($thicknesses as $thickness)--}}
{{--                                <li>--}}
{{--                                    <div class="checkbox-block">--}}
{{--                                        <label class="checkbox-block__label">--}}
{{--                                            <input type="checkbox" name="Victorinox" value="Victorinox">--}}
{{--                                            <p>--}}
{{--                                                <span>{{$thickness->title.' ('.count($thickness->watchAdverts).')'}}</span>--}}
{{--                                            </p>--}}
{{--                                        </label>--}}
{{--                                    </div>--}}
{{--                                </li>--}}
{{--                            @endforeach--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <p>Безель</p>--}}
{{--                    <div class="filters-mob-list__content">--}}
{{--                        <ul id="filters-mob-model" class="checkboxes-list">--}}
{{--                            @foreach($bezels as $bezel)--}}
{{--                                <li>--}}
{{--                                    <div class="checkbox-block">--}}
{{--                                        <label class="checkbox-block__label">--}}
{{--                                            <input type="checkbox" name="Victorinox" value="Victorinox">--}}
{{--                                            <p><span>{{$bezel->title.' ('.count($bezel->watchAdverts).')'}}</span></p>--}}
{{--                                        </label>--}}
{{--                                    </div>--}}
{{--                                </li>--}}
{{--                            @endforeach--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <p>Числа</p>--}}
{{--                    <div class="filters-mob-list__content">--}}
{{--                        <ul id="filters-mob-model" class="checkboxes-list">--}}
{{--                            @foreach($figures as $figure)--}}
{{--                                <li>--}}
{{--                                    <div class="checkbox-block">--}}
{{--                                        <label class="checkbox-block__label">--}}
{{--                                            <input type="checkbox" name="Victorinox" value="Victorinox">--}}
{{--                                            <p><span>{{$figure->title.' ('.count($figure->watchAdverts).')'}}</span></p>--}}
{{--                                        </label>--}}
{{--                                    </div>--}}
{{--                                </li>--}}
{{--                            @endforeach--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <p>Водонепроницаемость</p>--}}
{{--                    <div class="filters-mob-list__content">--}}
{{--                        <ul id="filters-mob-model" class="checkboxes-list">--}}
{{--                            @foreach($waterproofs as $waterproof)--}}
{{--                                <li>--}}
{{--                                    <div class="checkbox-block">--}}
{{--                                        <label class="checkbox-block__label">--}}
{{--                                            <input type="checkbox" name="Victorinox" value="Victorinox">--}}
{{--                                            <p>--}}
{{--                                                <span>{{$waterproof->title.' ('.count($waterproof->watchAdverts).')'}}</span>--}}
{{--                                            </p>--}}
{{--                                        </label>--}}
{{--                                    </div>--}}
{{--                                </li>--}}
{{--                            @endforeach--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </li>--}}
{{--                <li class="title">--}}
{{--                    <h5>Ремешок</h5>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <p>Застежка</p>--}}
{{--                    <div class="filters-mob-list__content">--}}
{{--                        <ul id="filters-mob-model" class="checkboxes-list">--}}
{{--                            @foreach($clasps as $clasp)--}}
{{--                                <li>--}}
{{--                                    <div class="checkbox-block">--}}
{{--                                        <label class="checkbox-block__label">--}}
{{--                                            <input type="checkbox" name="$clasp" value="Victorinox">--}}
{{--                                            <p><span>{{$clasp->title.' ('.count($clasp->watchAdverts).')'}}</span></p>--}}
{{--                                        </label>--}}
{{--                                    </div>--}}
{{--                                </li>--}}
{{--                            @endforeach--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <p>Ширина застежки</p>--}}
{{--                    <div class="filters-mob-list__content">--}}
{{--                        <ul id="filters-mob-model" class="checkboxes-list">--}}
{{--                            @foreach($widthClasps as $widthClasp)--}}
{{--                                <li>--}}
{{--                                    <div class="checkbox-block">--}}
{{--                                        <label class="checkbox-block__label">--}}
{{--                                            <input type="checkbox" name="width_clasp" value="Victorinox">--}}
{{--                                            <p>--}}
{{--                                                <span>{{$widthClasp->title.' mm ('.count($widthClasp->watchAdverts).')'}}</span>--}}
{{--                                            </p>--}}
{{--                                        </label>--}}
{{--                                    </div>--}}
{{--                                </li>--}}
{{--                            @endforeach--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <p>Ширина у ушек</p>--}}
{{--                    <div class="filters-mob-list__content">--}}
{{--                        <ul id="filters-mob-model" class="checkboxes-list">--}}
{{--                            @foreach($widthClasps as $widthClasp)--}}
{{--                                <li>--}}
{{--                                    <div class="checkbox-block">--}}
{{--                                        <label class="checkbox-block__label">--}}
{{--                                            <input type="checkbox" name="width_clasp" value="Victorinox">--}}
{{--                                            <p>--}}
{{--                                                <span>{{$widthClasp->title.' mm ('.count($widthClasp->watchAdverts).')'}}</span>--}}
{{--                                            </p>--}}
{{--                                        </label>--}}
{{--                                    </div>--}}
{{--                                </li>--}}
{{--                            @endforeach--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <p>Материал браслета</p>--}}
{{--                    <div class="filters-mob-list__content">--}}
{{--                        <ul id="filters-mob-model" class="checkboxes-list">--}}
{{--                            @foreach($bracelets as $bracelet)--}}
{{--                                <li>--}}
{{--                                    <div class="checkbox-block">--}}
{{--                                        <label class="checkbox-block__label">--}}
{{--                                            <input type="checkbox" name="bracelet_material" value="Victorinox">--}}
{{--                                            <p><span>{{$bracelet->title.' ('.count($bracelet->watchAdverts).')'}}</span>--}}
{{--                                            </p>--}}
{{--                                        </label>--}}
{{--                                    </div>--}}
{{--                                </li>--}}
{{--                            @endforeach--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <p>Метериал затяжки</p>--}}
{{--                    <div class="filters-mob-list__content">--}}
{{--                        <ul id="filters-mob-model" class="checkboxes-list">--}}
{{--                            @foreach($materialsClasps as $materialsClasp)--}}
{{--                                <li>--}}
{{--                                    <div class="checkbox-block">--}}
{{--                                        <label class="checkbox-block__label">--}}
{{--                                            <input type="checkbox" name="materials_clasp" value="Victorinox">--}}
{{--                                            <p>--}}
{{--                                                <span>{{$materialsClasp->title.' ('.count($materialsClasp->watchAdverts).')'}}</span>--}}
{{--                                            </p>--}}
{{--                                        </label>--}}
{{--                                    </div>--}}
{{--                                </li>--}}
{{--                            @endforeach--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <p>Цвет браслета</p>--}}
{{--                    <div class="filters-mob-list__content">--}}
{{--                        <ul id="filters-mob-model" class="checkboxes-list">--}}
{{--                            @foreach($braceletColors as $braceletColor)--}}
{{--                                <li>--}}
{{--                                    <div class="checkbox-block">--}}
{{--                                        <label class="checkbox-block__label">--}}
{{--                                            <input type="checkbox" name="bracelet_color" value="Victorinox">--}}
{{--                                            <p>--}}
{{--                                                <span>{{$braceletColor->title.' ('.count($braceletColor->watchAdverts).')'}}</span>--}}
{{--                                            </p>--}}
{{--                                        </label>--}}
{{--                                    </div>--}}
{{--                                </li>--}}
{{--                            @endforeach--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--            <div class="filters-buttons">--}}
{{--                <button class="filters-save-btn btn-hover-w" type="button">Сохранить фильтр</button>--}}
{{--                <button class="filters-submit-btn btn-hover" type="submit">Применить (327)</button>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </form>--}}
{{--    <form id="filter" class="filters-desc" method="get" action="{{route('catalog.filter-json')}}">--}}
{{--    <form id="filter" class="filters-desc" method="get" action="{{route('catalog.filter')}}">--}}
    <form id="filter" class="filters-desc" method="get" action="{{route('catalog.filter')}}">
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
                                        <input type="checkbox" name="brands[]" value="{{$brand->watch_make_title}}" id="{{$brand->watch_make_title}}">
                                        <p><span>{{$brand->watch_make_title.' ('.$brand->count_watch_make_title.')'}}</span></p>
                                    </label>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    <div class="filters-buttons">
                        <button data-fancybox data-src="#password-modal" href="javascript:;" class="filters-save-btn btn-hover-w" type="button">Сохранить поисковый запрос</button>
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
                                        <input type="checkbox" name="models[]" value="{{$model->watch_model_title}}" id="{{$model->watch_model_title}}">
                                        <p><span>{{$model->watch_model_title.' ('.$model->count_watch_model_title.')'}}</span></p>
                                    </label>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    <div class="filters-buttons">
                        <button data-fancybox data-src="#password-modal" href="javascript:;" class="filters-save-btn btn-hover-w" type="button">Сохранить поисковый запрос</button>
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
                    <button data-fancybox data-src="#password-modal" href="javascript:;" class="filters-save-btn btn-hover-w" type="button">Сохранить поисковый запрос</button>
                    <button class="filters-submit-btn btn-hover" type="submit">Применить (327)</button>
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
                                            <input type="checkbox" name="diameters[]" value="{{$diameter->height}}" id="{{$diameter->height}}">
                                            <p>
                                                <span>{{$diameter->height.' ('.$diameter->count_height.')'}}</span>
                                            </p>
                                        @else
                                            <input type="checkbox" name="diameters[]" value="{{$diameter->height.'/'.$diameter->width}}" id="{{$diameter->height.'/'.$diameter->width}}">
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
                                        <input type="checkbox" name="years[]" value="{{$year->release_year}}" id="{{$year->release_year}}">
                                        <p><span>{{$year->release_year.' ('.$year->count_release_year.')'}}</span></p>
                                    </label>
                                </div>
                            </li>
                        @endforeach
{{--                        <li>--}}
{{--                            <div class="checkbox-block">--}}
{{--                                <label class="checkbox-block__label">--}}
{{--                                    <input type="checkbox" name="years[]" value="Victorinox">--}}
{{--                                    <p>--}}
{{--                                        <span>Неизвесто{{' ('.count($watchAdverts->where('is_release_year_confirmed', 0)).')'}}</span>--}}
{{--                                    </p>--}}
{{--                                </label>--}}
{{--                            </div>--}}
{{--                        </li>--}}
                    </ul>
                    <div class="filters-buttons">
                        <button data-fancybox data-src="#password-modal" href="javascript:;" class="filters-save-btn btn-hover-w" type="button">Сохранить поисковый запрос</button>
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
                                        <input type="checkbox" name="regions[]" value="{{$region->region}}" id="{{$region->region}}">
                                        <p><span>{{$region->region.' ('.$region->count_region.')'}}</span></p>
                                    </label>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    <div class="filters-buttons">
                        <button data-fancybox data-src="#password-modal" href="javascript:;" class="filters-save-btn btn-hover-w" type="button">Сохранить поисковый запрос</button>
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
                                        <p>Марка</p>
                                        <ul>
                                            @foreach($brands as $brand)
                                                <li>
                                                    <div class="checkbox-block">
                                                        <label class="checkbox-block__label">
                                                            <input type="checkbox" name="brands[]" value="{{$brand->watch_make_title}}" id="{{$brand->watch_make_title}}">
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
                                                            <input type="checkbox" name="models[]" value="{{$model->watch_model_title}}" id="{{$model->watch_model_title}}">
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
                                                                <input type="checkbox" name="diameters[]" value="{{$diameter->height}}" id="{{$diameter->height}}">
                                                                <p>
                                                                    <span>{{$diameter->height.' ('.$diameter->count_height.')'}}</span>
                                                                </p>
                                                            @else
                                                                <input type="checkbox" name="diameters[]" value="{{$diameter->height.'/'.$diameter->width}}" id="{{$diameter->height.'/'.$diameter->width}}">
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
                                                            <input type="checkbox" name="years[]" value="{{$year->release_year}}" id="{{$year->release_year}}">
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
                                                            <input type="checkbox" name="regions[]" value="{{$region->region}}" id="{{$region->region}}">
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
                                                            <input type="checkbox" name="mechanismTypes[]" value="{{$mechanismType->mechanism_type_title}}" id="{{$mechanismType->mechanism_type_title}}">
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
                                                            <input type="checkbox" name="states[]" value="{{$state->watch_state}}" id="{{$state->watch_state}}">
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
                                                            <input type="checkbox" name="deliveryVolumes[]" value="{{$deliveryVolume->delivery_volume}}" id="{{$deliveryVolume->delivery_volume}}">
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
                                                            <input type="checkbox" name="sexes[]" value="{{$sex->sex_title}}" id="{{$sex->sex_title}}">
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
                                                            <input type="checkbox" name="types[]" value="{{$type->watch_type_title}}" id="{{$type->watch_type_title}}">
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
                        {{//todo popap to save search query}}
                        <button data-fancybox data-src="#password-modal" href="javascript:;" class="filters-save-btn btn-hover-w" type="button">Сохранить поисковый запрос</button>
                        <button class="filters-submit-btn btn-hover" type="submit">Применить (327)</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>
