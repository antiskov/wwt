@extends('profile_user.layouts.main')

@section('profile-content')
    <section class="messages">
        <div class="">
            <div class="container-wrap">
                <div class="bg-cont">
                    <div class="person-block">
                        <img src="./images/icons/close.svg" alt="img" class="close">
                        <div class="person-info">
                            <div class="img-cont">
                                <img src="./images/content/person.png" alt="img">
                            </div>
                            <div class="peron-name">LUXE WARE (HK) LIMITED</div>
                        </div>
                        <ul class="link-items">
                            <li><img src="./images/icons/my-order.svg" alt=""><a href="#/">Мои объявления</a></li>
                            <li><img src="./images/icons/email.svg" alt=""><a href="#/">Сообщения</a></li>
                            <li><img src="./images/icons/pay.svg" alt=""><a href="#/">Платежи</a></li>
                            <li><img src="./images/icons/profile.svg" alt=""><a href="#/">Профиль</a></li>
                            <li><img src="./images/icons/setting.svg" alt=""><a href="#/">Настройки</a></li>
                            <li><img src="./images/icons/favor.svg" alt=""><a href="#/">Избранное</a></li>
                            <li><img src="./images/icons/ref-link.svg" alt=""><a href="#/">Создать реферальную ссылку</a></li>
                            <li><img src="./images/icons/exit.svg" alt=""><a href="#/">Выход</a></li>
                        </ul>
                    </div>
                </div>

                <div class="block-messages">
                    <h2 class="name-lk">Сообщения</h2>
                    <div class="tabs-mess">
                        <div class="chat-types">
                            <span class="chat-types__choose" data-choose="all-messages">Все сообщения</span>
                            <ul class="chat-types__dropdown">
                                <li data-id="all-messages" class="active">Все сообщения</li>
                                <li data-id="unread">Непрочитаные</li>
                                <li data-id="unanswered">Неотвеченые</li>
                            </ul>
                        </div>
                        <ul class="mess-items">
                            <li class="item-messages">
                                <div class="img-wrap">
                                    <img src="./images/content/watch-1.png" alt="img">
                                </div>
                                <div class="item-cont">
                                    <div class="from">
                                        Chronometrie Stäuble AG
                                    </div>
                                    <div class="item-name">
                                        Hublot Big Bang 44MM Evolution Steel Ceramic Watch 301.SM.1770.RX
                                        <span>Ivan</span>
                                    </div>
                                    <div class="price-wrap">
                                        <div class="new">
                                            1500 $
                                        </div>
                                        <div class="data">
                                            05.10.20
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="item-messages unread">
                                <div class="img-wrap">
                                    <img src="./images/content/watch-1.png" alt="img">
                                </div>
                                <div class="item-cont">
                                    <div class="from">
                                        Chronometrie Stäuble AG
                                    </div>
                                    <div class="item-name">
                                        Hublot Big Bang 44MM Evolution Steel Ceramic Watch 301.SM.1770.RX
                                        <span>Ivan</span>
                                    </div>
                                    <div class="price-wrap">
                                        <div class="new">
                                            1500 $
                                        </div>
                                        <div class="data">
                                            05.10.20
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="item-messages unanswered">
                                <div class="img-wrap">
                                    <img src="./images/content/watch-1.png" alt="img">
                                </div>
                                <div class="item-cont">
                                    <div class="from">
                                        Chronometrie Stäuble AG
                                    </div>
                                    <div class="item-name">
                                        Hublot Big Bang 44MM Evolution Steel Ceramic Watch 301.SM.1770.RX
                                        <span>Ivan</span>
                                    </div>
                                    <div class="price-wrap">
                                        <div class="new">
                                            1500 $
                                        </div>
                                        <div class="data">
                                            05.10.20
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="item-messages">
                                <div class="img-wrap">
                                    <img src="./images/content/watch-1.png" alt="img">
                                </div>
                                <div class="item-cont">
                                    <div class="from">
                                        Chronometrie Stäuble AG
                                    </div>
                                    <div class="item-name">
                                        Hublot Big Bang 44MM Evolution Steel Ceramic Watch 301.SM.1770.RX
                                        <span>Ivan</span>
                                    </div>
                                    <div class="price-wrap">
                                        <div class="new">
                                            1500 $
                                        </div>
                                        <div class="data">
                                            05.10.20
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="item-messages unread">
                                <div class="img-wrap">
                                    <img src="./images/content/watch-1.png" alt="img">
                                </div>
                                <div class="item-cont">
                                    <div class="from">
                                        Chronometrie Stäuble AG
                                    </div>
                                    <div class="item-name">
                                        Hublot Big Bang 44MM Evolution Steel Ceramic Watch 301.SM.1770.RX
                                        <span>Ivan</span>
                                    </div>
                                    <div class="price-wrap">
                                        <div class="new">
                                            1500 $
                                        </div>
                                        <div class="data">
                                            05.10.20
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="item-messages unanswered">
                                <div class="img-wrap">
                                    <img src="./images/content/watch-1.png" alt="img">
                                </div>
                                <div class="item-cont">
                                    <div class="from">
                                        Chronometrie Stäuble AG
                                    </div>
                                    <div class="item-name">
                                        Hublot Big Bang 44MM Evolution Steel Ceramic Watch 301.SM.1770.RX
                                        <span>Ivan</span>
                                    </div>
                                    <div class="price-wrap">
                                        <div class="new">
                                            1500 $
                                        </div>
                                        <div class="data">
                                            05.10.20
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="chat-cont">
                        <div class="chat-person">
                            <button class="back-chat"></button>
                            <div class="name">
                                Chronometrie Stäuble AG
                            </div>
                            <div class="img-wrap">
                                <img src="./images/content/person.png" alt="img">
                            </div>
                        </div>
                        <div class="communication-items">
                            <div class="data">05. 06. 20</div>
                            <div class="communication-items-in">
                                <img src="./images/content/person.png" alt="img">
                                <div class="text-mas-in">
                                    <p>
                                        Вы купили эти часы? Я не покупал эти часы
                                    </p>
                                    <div class="time">18.06</div>
                                    <img class="label-del" src="images/icons/ok-white.svg">
                                </div>
                            </div>
                            <div class="communication-items-out">
                                <img src="./images/content/person.png" alt="img">
                                <div class="text-mas-in">
                                    <p>
                                        Вы купили эти часы? Я не покупал эти часы
                                    </p>
                                    <div class="time">18.06</div>
                                    <img class="label-del" src="./images/icons/ok-white.svg">
                                </div>
                            </div>

                            <div class="data">05. 06. 20</div>
                            <div class="communication-items-in">
                                <img src="./images/content/person.png" alt="img">
                                <div class="text-mas-in">
                                    <p>
                                        Вы купили эти часы? Я не покупал эти часы
                                    </p>
                                    <div class="time">18.06</div>
                                    <img class="label-del" src="images/icons/ok-white.svg">
                                </div>
                            </div>
                            <div class="communication-items-out">
                                <img src="./images/content/person.png" alt="img">
                                <div class="text-mas-in">
                                    <p>
                                        Вы купили эти часы? Я не покупал эти часы
                                    </p>
                                    <div class="time">18.06</div>
                                    <img class="label-del" src="./images/icons/ok-white.svg">
                                </div>
                            </div>

                            <div class="data">05. 06. 20</div>
                            <div class="communication-items-in">
                                <img src="./images/content/person.png" alt="img">
                                <div class="text-mas-in">
                                    <p>
                                        Вы купили эти часы? Я не покупал эти часы
                                    </p>
                                    <div class="time">18.06</div>
                                    <img class="label-del" src="images/icons/ok-white.svg">
                                </div>
                            </div>
                            <div class="communication-items-out">
                                <img src="./images/content/person.png" alt="img">
                                <div class="text-mas-in">
                                    <p>
                                        Вы купили эти часы? Я не покупал эти часы
                                    </p>
                                    <div class="time">18.06</div>
                                    <img class="label-del" src="./images/icons/ok-white.svg">
                                </div>
                            </div>
                            <div class="data">05. 06. 20</div>
                            <div class="communication-items-in">
                                <img src="./images/content/person.png" alt="img">
                                <div class="text-mas-in">
                                    <p>
                                        Вы купили эти часы? Я не покупал эти часы
                                    </p>
                                    <div class="time">18.06</div>
                                    <img class="label-del" src="images/icons/ok-white.svg">
                                </div>
                            </div>
                            <div class="communication-items-out">
                                <img src="./images/content/person.png" alt="img">
                                <div class="text-mas-in">
                                    <p>
                                        Вы купили эти часы? Я не покупал эти часы
                                    </p>
                                    <div class="time">18.06</div>
                                    <img class="label-del" src="./images/icons/ok-white.svg">
                                </div>
                            </div>
                            <div class="data">05. 06. 20</div>
                            <div class="communication-items-in">
                                <img src="./images/content/person.png" alt="img">
                                <div class="text-mas-in">
                                    <p>
                                        Вы купили эти часы? Я не покупал эти часы
                                    </p>
                                    <div class="time">18.06</div>
                                    <img class="label-del" src="images/icons/ok-white.svg">
                                </div>
                            </div>
                            <div class="communication-items-out">
                                <img src="./images/content/person.png" alt="img">
                                <div class="text-mas-in">
                                    <p>
                                        Вы купили эти часы? Я не покупал эти часы
                                    </p>
                                    <div class="time">18.06</div>
                                    <img class="label-del" src="./images/icons/ok-white.svg">
                                </div>
                            </div>
                        </div>
                        <form class="cont">
                            <textarea class="communication-mess" placeholder="Введите текст"></textarea>
                            <button type="submit" class="sent-comm btn-hover">Отправить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
