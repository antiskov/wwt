@extends('profile_user.layouts.main')

@section('profile-content')
    <section class="profile prof-control">
        <div class="">
            <div class="container-wrap">
                @include('profile_user.partials.left_menu')
                <form action="{{ route('editing-profile-form') }}" method="post" class="block-profile"
                      enctype='multipart/form-data'>
                    @csrf
                    <h2 class="name-lk">Профиль</h2>
                    <div class="profile-header">
                        <div class="name-cont">
                            <h2>{{auth()->user()->name}} {{auth()->user()->surname}}</h2>
                            <div class="cont">
                                <div class="percent">
                                    <div class="chart" id="graph" data-percent="63"></div>
                                </div>
                                <div class="person-img">
                                    <img
                                        src="{{asset($avatarPath)}}"
                                        alt="img">
                                </div>
                            </div>
                        </div>
                        <div class="name-setting">
                            <div class="photo-set">
                                <span>Отредактировать фото профиля</span>
                                <input type="file" name="avatar" accept="image/x-png,image/gif,image/jpeg">
                                <br><br>
                                <a href="{{ route('delete-avatar') }}" class="delete-photo">Удалить фото</a>
                            </div>
                            <div class="load-prof">
                                <p>Профиль заполнен</p>
                                <p>на <span>{{$percentage + 10}}%</span></p>
                            </div>
                        </div>
                    </div>
                    <div class="person-date">
                        <h2>Личные данные </h2>
                        <label for="prof-surname">
                            Фамилия
                            <input name="surname" type="text" id="prof-surname" value="{{auth()->user()->surname}}">
                        </label>
                        <label for="prof-name">
                            Имя
                            <input name="name" type="text" id="prof-name" value="{{auth()->user()->name}}">
                        </label>
                        <div class="select-price">
                            <p>Пол</p>
                            <input name="sex" type="hidden" value={{auth()->user()->sex}}>
                            <div class="select-value rotate">
                                @if(auth()->user()->sex == 'man')
                                    <span>Мужской</span>
                                @else
                                    <span>Женский</span>
                                @endif
                                <ul class="value-items">
                                    <li>Женский</li>
                                    <li>Мужской</li>
                                </ul>
                            </div>
                        </div>
                        <label for="calendar">
                            Дата рождения
                            <input name="birthday_date" type="date" id="calendar" value="{{auth()->user()->birthday_date}}">
                        </label>
                    </div>
                    <div class="contact-date">
                        <h2>Контактные данные</h2>
                        <label for="prof-email">
                            Адрес эл. почты *
                            <input name="email" type="email" id="prof-email" value="{{ auth()->user()->email }}">
                        </label>
                        <label for="prof-phone">
                            Телефон
                            <input name="phone" type="tel" id="prof-phone" value="{{ auth()->user()->phone }}">
                        </label>
                    </div>
                    <div class="address-date">
                        <h2>Адресные данные</h2>

                        <!--    Двіжуха з автокомплітами       -->
                        <label for="route">
                            Введите ваш адрес
                            <input
                                id="autocomplete"
                                placeholder="Введите ваш адрес"
                                type="text"
                            />
                        </label>

                        <label for="route">
                            Улица *
                            <input type="text" id="route" readonly="true" name='street' value="{{ auth()->user()->street }}">
                        </label>
                        <label for="street_number">
                            Адресное дополнение
                            <input type="text" id="street_number" readonly="true" name="street_addition"
                                   value="{{auth()->user()->street_addition}}">
                        </label>
                        <label for="postal_code">
                            Почтовый индекс
                            <input type="text" id="postal_code" readonly="true" name="zip_code" value="{{auth()->user()->zip_code}}">
                        </label>
                        <label for="locality">
                            Населенный пункт
                            <input type="text" id="locality" readonly="true" name="city" value="{{auth()->user()->city}}">
                        </label>
                        <label for="street_number">
                            Страна *
                            <input type="text" id="country" readonly="true" name="country" value="{{auth()->user()->country}}">
                        </label>
                        <label for="street_number">
                            Область
                            <input type="text" id="administrative_area_level_1" readonly="true" name="region" value="{{auth()->user()->region}}">
                        </label>



                        <!--       автокоплит, вдруг надо будет             -->
                        <!--                    <div class="autocomplete-input" data-autocomplete>-->
                        <!--                        <p>Область</p>-->
                        <!--                        <div class="autocomplete-input__block">-->
                        <!--                            <div class="autocomplete-input__holder">-->
                        <!--                                <input type="text">-->
                        <!--                            </div>-->
                        <!--                            <div class="autocomplete-input__content">-->
                        <!--                                <ul data-id="dropdownContent"></ul>-->
                        <!--                            </div>-->
                        <!--                        </div>-->
                        <!--                    </div>-->

                        <!--   Двіжуха з корами               -->
                        <input type="hidden" name="lat" data-id="lat">
                        <input type="hidden" name="lng" data-id="lng">

                    </div>
                    <div class="about-me">
                        <h2>Больше обо мне</h2>
                        <label for="prof-profession">
                            Профессия
                            <input name="specialisation" type="text" id="prof-profession"
                                   value="{{auth()->user()->specialisation}}">
                        </label>
                        <div class="select-price">
                            <p>Часовой пояс</p>
                            <input name="timezone_id" type="hidden" name=""
                                   @if(auth()->user()->timezone_id)
                                   value="{{auth()->user()->timezone->title.' '.auth()->user()->timezone->time_difference}}"
                                   @else
                                   value=""
                                @endif>
                            <div class="select-value rotate">
                                @if(auth()->user()->timezone_id)
                                    <span>{{auth()->user()->timezone->title.' '.auth()->user()->timezone->time_difference}}</span>
                                @else
                                    <span>Выберите</span>
                                @endif
                                <ul class="value-items">
                                    @foreach($timezones as $zone)
                                        <li>{{$zone->title.' '.$zone->time_difference}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="select-price aline">
                            <p>Язык</p>
                            <div class="lang-wrap">
                                <input type="hidden" name="" value="">
                                <div class="select-value select-value_multi rotate">
                                    <span>Добавить язык</span>
                                    <ul class="value-items value-items_multi">
                                        <li>
                                            <label>
                                                <input name="lang[1]" type="checkbox" id="lang_1" value="Украинский"
                                                       @if(in_array('ua', $userLanguages))
                                                       checked
                                                    @endif
                                                >
                                                <span>Украинский</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input name="lang[2]" type="checkbox" id="lang_2" value="Русский"
                                                       @if(in_array('ru', $userLanguages))
                                                       checked
                                                    @endif>
                                                <span>Русский</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input name="lang[3]" type="checkbox" id="lang_3" value="English"
                                                       @if(in_array('en', $userLanguages))
                                                       checked
                                                    @endif>
                                                <span>English</span>
                                            </label>
                                        </li>
                                    </ul>
                                </div>
                                <div class="lang-result">
                                    @if(in_array('ua', $userLanguages))
                                        <label for="lang_1">
                                            <span>Украинский</span>
                                            <img src="/images/icons/close.svg" alt="">
                                        </label>
                                    @endif
                                    @if(in_array('ru', $userLanguages))
                                        <label for="lang_2">
                                            <span>Русский</span>
                                            <img src="/images/icons/close.svg" alt="">
                                        </label>
                                    @endif
                                    @if(in_array('en', $userLanguages))
                                        <label for="lang_3">
                                            <span>English</span>
                                            <img src="/images/icons/close.svg" alt="">
                                        </label>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <label for="description" class="textarea">
                            Описание
                            <textarea name="description" id="description">{{auth()->user()->description}}</textarea>
                        </label>
                    </div>
                    <div class="option-prof">
                        <div class="cont">
                            <a href="{{route('forgot_password')}}" class="change-pass">
                                Изменить пароль
                            </a>
                        </div>
                        <button type="submit" class="save-profile btn-hover">
                            Сохранить
                        </button>
                    </div>
                    <a href="{{ route('delete-user') }}" class="delete-account-btn">
                        удалить аккаунт пользователя
                    </a>
                </form>
            </div>
        </div>
    </section>
    <script src="https://maps.google.com/maps/api/js?key=AIzaSyA-M4C5q7VMtAjsrGwrf2rh1_rcRXi67zk&libraries=places&language=ru"
            type="text/javascript"></script>
    <script src="/js/g-autocomplete.js"></script>
@endsection
