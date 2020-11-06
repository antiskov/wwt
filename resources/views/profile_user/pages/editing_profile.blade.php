@extends('profile_user.layouts.main')

@section('profile-content')
    <form action="{{ route('editing-profile-form') }}" method="post" class="block-profile"
          enctype='multipart/form-data'>
        @csrf
        <h2 class="name-lk">Профиль</h2>
        <div class="profile-header">
            <div class="name-cont">
                <h2>LUXE WARE (HK) LIMITED</h2>
                <div class="cont">
                    <div class="percent">
                        <div class="chart" id="graph" data-percent="63"></div>
                    </div>
                    <div class="person-img">
                        <img
                            src="{{asset('/storage/images/profiles/'.auth()->user()->email.'/small_'.auth()->user()->avatar)}}"
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
                    <p>на <span>65% написать калькулятор заполнения</span></p>
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
                <input name="sex" type="hidden" name="" value="Женский" value="">
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
            <div class="select-price">
                <p>Улица *</p>
                <label for="street">
                    <input name='street' type="text" value="{{ auth()->user()->street }}">
                </label>
{{--                <div class="select-value rotate">--}}
{{--                    @if(auth()->user()->country)--}}
{{--                        <span>{{auth()->user()->country}}</span>--}}
{{--                    @else--}}
{{--                        <span>Выберите</span>--}}
{{--                    @endif--}}
{{--                    <ul class="value-items">--}}
{{--                        <li>Ukraine</li>--}}
{{--                        <li>USA</li>--}}
{{--                        <li>Mexico</li>--}}
{{--                        <li>Italian</li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
            </div>
            <label for="prof-stret-more">
                Адресное дополнение
                <input type="text" id="prof-stret-more" name="street_addition" value="{{auth()->user()->street_addition}}">
            </label>
            <label for="prof-stret-index">
                Почтовый индекс и населенный пункт *
                <span class="input-cont">
                    <input name="zip_code" type="number" id="prof-stret-index" value="{{auth()->user()->zip_code}}">
                    <input name="city" type="text" id="prof-stret-index-2" value="{{auth()->user()->city}}">
                </span>
            </label>
            <div class="select-price">
                <p>Страна *</p>
                <input name="country" type="hidden" value="{{auth()->user()->country}}">
                <div class="select-value rotate">
                    @if(auth()->user()->country)
                    <span>{{auth()->user()->country}}</span>
                    @else
                    <span>Выберите</span>
                    @endif
                    <ul class="value-items">
                        <li>Ukraine</li>
                        <li>USA</li>
                        <li>Mexico</li>
                        <li>Italian</li>
                    </ul>
                </div>
            </div>
            <div class="select-price">
                <p>Область</p>
                <input name="region" type="hidden" value="{{auth()->user()->region}}">
                <div class="select-value rotate">
                    @if(auth()->user()->region)
                        <span>{{auth()->user()->region}}</span>
                    @else
                        <span>Выберите</span>
                    @endif
                    <ul class="value-items">
                        <li>Ukraine</li>
                        <li>USA</li>
                        <li>Mexico</li>
                        <li>Italian</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="about-me">
            <h2>Больше обо мне</h2>
            <label for="prof-profession">
                Профессия
                <input name="specialisation" type="text" id="prof-profession" value="{{auth()->user()->specialisation}}">
            </label>
            <div class="select-price">
                <p>Часовой пояс</p>
                <input name="timezone_id" type="hidden" name="" value="">
                <div class="select-value rotate">
                    <span>Выберите</span>
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
                                    <input name="lang[1]" type="checkbox" id="lang_1" value="Украинский" checked>
                                    <span>Украинский</span>
                                </label>
                            </li>
                            <li>
                                <label>
                                    <input name="lang[2]" type="checkbox" id="lang_2" value="Русский">
                                    <span>Русский</span>
                                </label>
                            </li>
                            <li>
                                <label>
                                    <input name="lang[3]" type="checkbox" id="lang_3" value="English">
                                    <span>English</span>
                                </label>
                            </li>
                        </ul>

                    </div>
                    <div class="lang-result">
                        <label for="lang_1">
                            <span>Украинский</span>
                            <img src="/images/icons/close.svg" alt="">
                        </label>
                    </div>
                </div>
            </div>
            <label for="description" class="textarea">
                Описание
                <textarea name="description" id="description"></textarea>
            </label>
        </div>
        <div class="option-prof">
            <div class="cont">
                <a href="#/" class="change-pass">
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
@endsection
