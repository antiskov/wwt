@extends('layouts.main')
@section('content')
    <section class="submitting">
        <div class="form-cont">
            <div class="tabs-mess">
                <ul class="tabs__caption">
                    <li class="">шаг 1</li>
                    <li class="">шаг 2</li>
                    <li class="">шаг 3</li>
                    <li class="active">шаг 4</li>
                </ul>
                <div class="tabs__content ">
                    <div class="tabs-item">
                        <h2>Предложение <span>* обязательное поле</span></h2>
                        <div class="input-case">
                            <div class="select-price">
                                <p>Тип часов *</p>
                                <div class="select-value rotate">
                                    <span>Выберите</span>
                                    <ul class="value-items">
                                        <li>Наручные</li>
                                        <li>Наручные</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="select-price">
                                <p>Марка *</p>
                                <div class="cont">
                                    <input type="hidden" name="">
                                    <div class="select-value rotate">
                                        <span>Выберите</span>
                                        <ul class="value-items">
                                            <li>Casio</li>
                                            <li>R&R</li>
                                            <li>Orion</li>
                                        </ul>
                                    </div>

                                    <span>
                                    Производитель не включен в список?
                                </span>
                                </div>
                            </div>
                            <div class="select-price">
                                <p>Модель *
                                    <img src="./images/icons/information-icon.svg" alt="img" class="info-icon">
                                    <span class="input-info">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                    Dolores earum, ipsa ipsum iste laborum nihil tempore? Ea
                                    laboriosam officiis possimus quam quas quod sed totam?
                                </span>
                                </p>
                                <div class="cont">
                                    <input type="hidden" name="">
                                    <div class="select-value rotate">
                                        <span>Выберите</span>
                                        <ul class="value-items">
                                            <li>Casio</li>
                                            <li>R&R</li>
                                            <li>Orion</li>
                                        </ul>
                                    </div>

                                    <span>
                                    Вы можете добавить к названию модели дополнительную
                                    информацию, например, конкретный вариант модели.
                                </span>
                                </div>
                            </div>
                            <div class="select-price">
                                <p>Идент. номер
                                    <img src="./images/icons/information-icon.svg" alt="img" class="info-icon">
                                    <span class="input-info">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                    Dolores earum, ipsa ipsum iste laborum nihil tempore? Ea
                                    laboriosam officiis possimus quam quas quod sed totam?
                                </span>
                                </p>
                                <input type="hidden" name="">
                                <div class="select-value rotate">
                                    <span>Выберите</span>
                                    <ul class="value-items">
                                        <li>0000 0000 0000 0000</li>
                                        <li>0000 0000 0000 0000</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="select-price">
                                <p>Состояние *
                                    <img src="./images/icons/information-icon.svg" alt="img" class="info-icon">
                                    <span class="input-info">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                    Dolores earum, ipsa ipsum iste laborum nihil tempore? Ea
                                    laboriosam officiis possimus quam quas quod sed totam?
                                </span>
                                </p>
                                <input type="hidden" name="">
                                <div class="select-value rotate">
                                    <span>Выберите</span>
                                    <ul class="value-items">
                                        <li>Новое</li>
                                        <li>Б/У</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="select-price">
                                <p>Объем доставки *
                                    <img src="./images/icons/information-icon.svg" alt="img" class="info-icon">
                                    <span class="input-info">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                    Dolores earum, ipsa ipsum iste laborum nihil tempore? Ea
                                    laboriosam officiis possimus quam quas quod sed totam?
                                </span>
                                </p>
                                <input type="hidden" name="">
                                <div class="select-value rotate">
                                    <span>Выберите</span>
                                    <ul class="value-items">
                                        <li>Доставка</li>
                                        <li>Доставка</li>
                                        <li>Доставка</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <h2>Базовые данные</h2>
                        <div class="select-price">
                            <p>Пол</p>
                            <input type="hidden" name="">
                            <div class="select-value rotate">
                                <span>Выберите</span>
                                <ul class="value-items">
                                    <li>Мужской</li>
                                    <li>Женский</li>
                                </ul>
                            </div>
                        </div>


                        <label for="made-watch">
                            Год выпуска *
                            <span class="cont-wrap">
                            <input type="text" id="made-watch">
                            <span class="check-cont">
                                <label class="checkbox-other">
                                    <input type="radio" name="year">
                                    <span>Приблизительно</span>
                                </label>
                                <label class="checkbox-other">
                                    <input type="radio" name="year" checked>
                                    <span>Неизвестно</span>
                                </label>
                            </span>
                        </span>
                        </label>
                        <label>
                            Диаметр *
                            <span class="size-cont">
                            <input type="number">
                            X
                            <input type="number">
                        </span>
                        </label>
                        <div class="select-price">
                            <p>Тип механизма</p>
                            <input type="hidden" name="">
                            <div class="select-value rotate">
                                <span>Выберите</span>
                                <ul class="value-items">
                                    <li>Автомат</li>
                                    <li>Механика</li>
                                </ul>
                            </div>
                        </div>
                        <label for="description" class="description">
                            Описание
                            <textarea id="description" placeholder="Примеры: Где Вы купили часы?"></textarea>
                        </label>

                        <h2>Цена</h2>

                        <div class="info-price">
                            <div class="select-price">
                                <p>Цена</p>
                                <input type="hidden" name="">
                                <div class="input-cont-price">
                                    <input type="number">
                                    <div class="select-value rotate">
                                        <span>UA</span>
                                        <ul class="value-items">
                                            <li>UA</li>
                                            <li>$</li>
                                            <li>RUB</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="price-modal-cont">
                                <div>Рекомендуемая цена: <span>4878.90 ₴</span> <img src="./images/icons/warning-lamp.svg"
                                                                                     alt="img"></div>
                                <p>
                                    Для определения актуальной стоимости ваших
                                    часов мы сравнили их с актуальными объявлениями на Сhrono24
                                </p>
                                <button class="price-chro btn-hover-w">Перенять цену</button>
                            </div>
                        </div>


                        <div class="btn-cont btn-cont_first">
                            <button class="save-edit btn-hover-w">Сохранить как черновик</button>

                            <button class="save-next btn-hover">Перейти к шагу 2</button>

                        </div>

                    </div>
                </div>

                <div class="tabs__content ">
                    <div class="tabs-item">
                        <h2>Изображение ваших часов <span>* обязательное поле</span></h2>
                        <p class="img-text">
                            Хорошие фотографии залог быстрой продажи вашего объявления.
                            Сфотографируйте ваши часы с разных ракурсов, чтобы предоставить
                            вашему покупателю более полное впечатление о ваших часах.
                        </p>
                        <div class="add-img-wrap">
                            <p>Загрузите от 2х фотографий</p>
                            <div class="cont-img">
                                <form method="post" enctype="multipart/form-data" id="uploadImages">
                                    <ul id="uploadImagesList">
                                        <li class="added-images">
                                            <img src="./images/icons/add-img.svg" alt="img">
                                            <span>Загрузить фото или вставить сюда</span>
                                            <input type="file" id="addImages" multiple="">

                                            <input type="hidden" name="azaza" value="zazaza">
                                        </li>
                                        <li class="item template">
                                        <span class="img-wrap">
                                            <img src="" alt="">
                                        </span>
                                            <span class="delete-link" title="Удалить"></span>
                                        </li>
                                    </ul>
                                    <p>Загружено <span>0</span> из <span>10</span> фото</p>
                                </form>
                            </div>
                        </div>

                        <!-- <p class="img-text">
                            Просим Вас загрузить фото часов, на которых на
                            часах установлено следующее время. Тем самым
                            Вы докажете, что часы действительно находятся
                            в Вашем владении.
                        </p>

                        <div class="control-block-wrap">
                            <div class="control-photo">
                                <h3>Загрузить 1 контрольную фотографию *</h3>
                                <div class="head-cont">
                                    <div class="info-cont">
                                        <img src="./images/icons/watch-img.svg" alt="img">
                                        <span>1 : 40 h</span>
                                    </div>
                                    <div class="person-cont one-cont">
                                        <label for="lab"><img class="preview one-img"
                                                src='./images/icons/add-img.svg'></label>
                                        <span>Загрузить фото или вставить сюда</span>
                                        <input type="file" class="load" id="lab">
                                    </div>
                                </div>
                            </div>
                            <div class="control-photo">
                                <h3>Загрузить 2 контрольную фотографию *</h3>
                                <div class="head-cont">
                                    <div class="info-cont">
                                        <img src="./images/icons/watch-img.svg" alt="img">
                                        <span>1 : 50 h</span>
                                    </div>
                                    <div class="person-cont two-cont">
                                        <label for="lab-2"><img class="preview two-img"
                                                src='./images/icons/add-img.svg'></label>
                                        <span>Загрузить фото или вставить сюда</span>
                                        <input type="file" class="load" id="lab-2">
                                    </div>
                                </div>
                            </div>
                        </div> -->

                        <div class="btn-cont step-2-cont">
                            <button class="prev-step btn-hover">Вернуться к шагу 1</button>

                            <button class="save-edit btn-hover-w">Сохранить как черновик</button>

                            <button class="save-next btn-hover">Перейти к шагу 3</button>
                        </div>
                    </div>
                </div>

                <div class="tabs__content ">
                    <div class="tabs-item">
                        <h2>Личные данные<span>* обязательное поле</span></h2>
                        <label for="prof-surname-sub">
                            Фамилия *
                            <input type="text" id="prof-surname-sub">
                        </label>
                        <label for="prof-name-sub">
                            Имя *
                            <input type="text" id="prof-name-sub">
                        </label>
                        <label for="calendar">
                            Дата рождения *
                            <input type="date" id="calendar">
                        </label>

                        <h2>Местоположение часов</h2>
                        <!-- <label for="prof-stret">
                            Улица *
                            <input type="text" id="prof-stret">
                        </label> -->

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
                        <!-- <label for="prof-region">
                            Область
                            <input type="text" id="prof-region">
                        </label> -->
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
                        <label for="prof-phone">
                            Телефон *
                            <input type="email" id="prof-phone">
                        </label>
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

                        <div class="check-cont">
                            <label class="checkbox-other">
                                <input type="checkbox" checked>
                                <span>я не хочу, чтобы моя фамилия была указана в объявлении *</span>
                            </label>
                        </div>

                        <div class="block-data-cont">
                            <div class="text-cont">
                                <h3>Ваши данные в надежных руках</h3>
                                <p class="text-item">
                                    Мы строго придерживаемся законов о защите информации.
                                </p>
                                <p class="text-item">
                                    Все данные, которые Вы вносите на наш сайт, зашифрованы и передаются по надежному
                                    интернет соединению.
                                </p>
                                <div class="text-item">
                                    Ваши личные данные будут использованы исключительно для продажи артикулов на сайте и не
                                    будут опубликованы.
                                    <div class="img-cont">
                                        <img src="./images/icons/secure-data.svg" alt="img">
                                        <img src="./images/icons/shild.svg" alt="img">
                                    </div>
                                </div>
                            </div>
                            <div class="img-cont">
                                <img src="./images/icons/secure-data.svg" alt="img">
                                <img src="./images/icons/shild.svg" alt="img">
                            </div>
                        </div>

                        <div class="btn-cont step-3-cont">
                            <button class="prev-step btn-hover">Вернуться к шагу 2</button>

                            <button class="save-edit btn-hover-w">Сохранить как черновик</button>

                            <button class="save-next btn-hover">Перейти к шагу 4</button>

                        </div>
                    </div>
                </div>

                <div class="tabs__content active">
                    <div class="tabs-item">
                        <h2>Личные данные<span>* обязательное поле</span></h2>
                        <p class="tabs-item__subtitle">предварительный просмотр</p>
                        //= template/inline-item-cart.html

                        <div class="ad-cost">
                            <div class="ad-cost__price-block">
                                <h2>Стоимость объявления</h2>
                                <div class="ad-cost-price ad-cost__price">
                                    <ul class="ad-cost-price__list">
                                        <li>
                                            <p>Стоимость объявления</p>
                                            <p>0.00 ₴</p>
                                        </li>
                                        <li>
                                            <p>Срок публикации объявления</p>
                                            <p>3 месяца</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="sale-premium ad-cost__sale-premium">
                                <h5 class="sale-premium__title">Быстрая продажа при помощи объявления Premium</h5>
                                <p class="sale-premium__price">45</p>

                                <ul class="sale-premium__list">
                                    <li>Метка VIP увеличит Ваши шансы на продажу.</li>
                                    <li>Метка VIP увеличит Ваши шансы на продажу.</li>
                                </ul>
                            </div>

                            <div class="rules-user ad-cost__rules-user">
                                <h5 class="rules-user__title">Правила для пользователей World Watch Trade</h5>
                                <ul class="rules-user__list">
                                    <li>Продавцы обязаны немедлено сообщить об успешных продажах.</li>
                                    <li>Втечении 3 месяцев артикул не разрешено продавать другим способом.</li>
                                    <li>Не разрешено предлагать подделки и реплики.</li>
                                    <li>Вы можете бесплатно опубликовать объявление на World Watch Trade. После успешной
                                        продажи Вам в счет будет выставлена комиссия.</li>
                                </ul>
                            </div>
                        </div>

                        <div class="checkbox-block checkbox-block_submitting-page">
                            <label class="checkbox-block__label">
                                <input type="checkbox" name="Victorinox" value="Nouvelle Horlogerie Calabrese (NHC)">
                                <p><span>я не хочу, чтобы моя фамилия была указана в объявлении</span></p>
                            </label>
                        </div>

                        <div class="btn-cont step-4-cont">
                            <button class="prev-step btn-hover">Вернуться к шагу 3</button>

                            <button class="save-edit btn-hover-w">Сохранить как черновик</button>

                            <button class="save-next btn-hover">Опубликовать</button>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
