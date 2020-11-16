@extends('profile_user.layouts.main')

@section('profile-content')

<div class="block-content">
    <h2 class="name-lk">Мои объявления </h2>
    <div class="radio-wrap">
        <input type="radio" name="tab-btn" id="abu-1" value="" checked>
        <label for="abu-1" class="anu-rad">Активные</label>
        <input type="radio" name="tab-btn" id="abu-2" value="" >
        <label for="abu-2" class="anu-rad">На модерации</label>
        <input type="radio" name="tab-btn" id="abu-3" value="" >
        <label for="abu-3" class="anu-rad">Архивные</label>
        <input type="radio" name="tab-btn" id="abu-4" value="">
        <label for="abu-4" class="anu-rad">Черновики</label>

        <div id="cont-1" class="items-anno">
            <div class="items-wrap">
                <div class="announce-item">

                    <div class="chek_cont_set">
                        <label class="checkbox-other">
                            <input type="checkbox" checked>
                            <span></span>
                        </label>
                    </div>

                    <!--    <div class="chek_cont">-->
                    <!--        <input type="checkbox" id="check_per" required checked>-->
                    <!--        <label for="check_per"></label>-->
                    <!--    </div>-->
                    <div class="cont">
                        <div class="img-wrap">
                            <img src="/images/content/watch-1.png" alt="img">
                            <img src="/images/content/watch-2.png" alt="img">
                        </div>
                        <div class="ad-cont">
                            <div class="name-block">
                                <h2>Hublot Big Bang 44MM Evolution Steel Ceramic Watch 301.SM.1770.RX</h2>
                                <div class="data">
                                    <p>
                                        <span>С: 26. 07. 12</span>
                                        <span>По: 26. 07. 12</span>
                                    </p>
                                    <button class="advertice">Реклама</button>
                                </div>
                            </div>
                            <div class="price-block">
                                <div class="price">
                                    <div class="new">
                                        1500$
                                    </div>
                                    <div class="old">
                                        1500$
                                    </div>
                                    <div class="soc-block">
                                        <a href="#/" class="soc-icon"></a>
                                        <a href="#/" class="soc-icon"></a>
                                    </div>
                                </div>
                                <div class="data">
                                    <p>
                                        <span>С: 26. 07. 12</span>
                                        <span>По: 26. 07. 12</span>
                                    </p>
                                    <button class="advertice">Реклама</button>
                                </div>
                                <div class="set-block">
                                    <a href="#/" class="sett">посмотреть</a>
                                    <a href="#/" class="sett">редактировать</a>
                                    <a href="#/" class="sett">деактивировать</a>
                                    <div class="soc-block">
                                        <a href="#/" class="sett">Поделиться</a>
                                    </div>
                                </div>
                            </div>
                            <div class="statistics-cont">
                                <div class="set-mob">
                                    <a href="#/" class="sett">осмотреть</a>
                                    <a href="#/" class="sett">редактировать</a>
                                    <a href="#/" class="sett">деактивировать</a>
                                </div>
                                <div class="static-items">
                                    <div class="name-static">Статистика:</div>
                                    <div class="text"><img src="/images/icons/viewing.svg" alt="img"> <p>Просмотров: </p><span>11</span></div>
                                    <div class="text"><img src="/images/icons/phone.svg" alt="img"> <p>Тел: </p><span>11</span></div>
                                    <div class="text"><img src="/images/icons/lk-star.svg" alt="img"> <p>В избранном: </p><span>8</span></div>
                                    <div class="text"><img src="/images/icons/email.svg" alt="img"> <p>: </p><span>7</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="statistics-cont">
                        <div class="set-mob">
                            <a href="#/" class="sett">осмотреть</a>
                            <a href="#/" class="sett">редактировать</a>
                            <a href="#/" class="sett">деактивировать</a>
                        </div>
                        <div class="static-items">
                            <div class="name-static">Статистика:</div>
                            <div class="text"><img src="/images/icons/viewing.svg" alt="img">: <p>Просмотров</p><span>11</span></div>
                            <div class="text"><img src="/images/icons/phone.svg" alt="img">: <p>Тел: </p><span>11</span></div>
                            <div class="text"><img src="/images/icons/lk-star.svg" alt="img">: <p>В избранном: </p><span>8</span></div>
                            <div class="text"><img src="/images/icons/email.svg" alt="img">: <p>: </p><span>7</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
