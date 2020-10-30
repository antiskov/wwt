@extends('profile_user.layouts.main')

@section('profile-content')
    <form action="{{ route('editing-profile-form') }}" method="post" class="block-profile" enctype='multipart/form-data'>
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
                        <img src="/images/content/person.png" alt="img">
                    </div>
                </div>
            </div>
            <div class="name-setting">
                <div class="photo-set">
                    <span>Отредактировать фото профиля</span>
                    <input type="file"  name="image" accept="image/x-png,image/gif,image/jpeg">
                    <a href="#/" class="delete-photo">Удалить фото</a>
                </div>
                <div class="load-prof">
                    <p>Профиль заполнен</p>
                    <p>на <span>65%</span></p>
                </div>
            </div>
        </div>
        <div class="person-date">
            <h2>Личные данные </h2>
            <label for="prof-surname">
                Фамилия
                <input type="text" id="prof-surname">
            </label>
            <label for="prof-name">
                Имя
                <input type="text" id="prof-name">
            </label>
            <div class="select-price">
                <p>Пол</p>
                <input type="hidden" name="" value="Женский">
                <div class="select-value rotate">
                    <span>Женский</span>
                    <ul class="value-items">
                        <li>Женский</li>
                        <li>Мужской</li>
                    </ul>
                </div>
            </div>
            <label for="calendar">
                Дата рождения
                <input type="date" id="calendar">
            </label>
        </div>
        <div class="contact-date">
            <h2>Контактные данные</h2>
            <label for="prof-email">
                Адрес эл. почты *
                <input type="email" id="prof-email">
            </label>
            <label for="prof-phone">
                Телефон
                <input type="email" id="prof-phone">
            </label>
        </div>
        <div class="address-date">
            <h2>Адресные данные</h2>
            <div class="select-price">
                <p>Улица *</p>
                <input type="hidden" name="">
                <div class="select-value rotate">
                    <span>Выберите</span>
                    <ul class="value-items">
                        <li>Ukraine</li>
                        <li>USA</li>
                        <li>Mexico</li>
                        <li>Italian</li>
                    </ul>
                </div>
            </div>
            <label for="prof-stret-more">
                Адресное дополнение
                <input type="text" id="prof-stret-more">
            </label>
            <label for="prof-stret-index">
                Почтовый индекс и населенный пункт *
                <span class="input-cont">
                            <input type="number" id="prof-stret-index">
                            <input type="number" id="prof-stret-index-2">
                        </span>
            </label>
            <div class="select-price">
                <p>Страна *</p>
                <input type="hidden" name="">
                <div class="select-value rotate">
                    <span>Выберите</span>
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
                <input type="hidden" name="">
                <div class="select-value rotate">
                    <span>Выберите</span>
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
                <input type="text" id="prof-profession">
            </label>
            <div class="select-price">
                <p>Часовой пояс</p>
                <input type="hidden" name="" value="Женский">
                <div class="select-value rotate">
                    <span>Выберите</span>
                    <ul class="value-items">
                        <li>(UTC -12:00) Всемирное координированное время -12</li>
                        <li>(UTC -13:00) Всемирное координированное время -12</li>
                        <li>(UTC -14:00) Всемирное координированное время -12</li>
                        <li>(UTC -15:00) Всемирное координированное время -12</li>
                    </ul>
                </div>
            </div>
            <div class="select-price aline">
                <p>Язык</p>
                <input type="hidden" name="" value="Женский">
                <div class="lang-wrap">
                    <div class="select-value rotate">
                        <span>Добавить язык</span>
                        <ul class="value-items">
                            <li>Украинский</li>
                            <li>Русский</li>
                            <li>English</li>
                        </ul>
                    </div>
                    <div class="lang-result">
                        <span>Украинский</span>
                        <span>Mexico</span>
                    </div>
                </div>
            </div>
            <label for="description" class="textarea">
                Описание
                <textarea id="description"></textarea>
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

        <a href="#/" class="delete-account-btn">
            удалить аккаунт пользователя
        </a>
    </form>
@endsection
