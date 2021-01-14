@extends('layouts.main')

@section('content')
    <section class="about">
        <div class="banner-wrap">
            <h2>Узнайте больше о World Watch Trade</h2>
            <p>Роскошные часы очаровывают нас</p>
        </div>
        <div class="container">
            <div class="info-items">
                <div class="item">
                    <img src="./images/icons/contacts.svg" alt="img">
                    <p>Контакты</p>
                    <span>+38(063)874-69-92 </span>
                    <span>Worldwatchtrade@gmail.com</span>
                </div>
                <div class="item">
                    <img src="./images/icons/visit-us.svg" alt="img">
                    <p>Посетите нас</p>
                    <span>Киев, ул.</span>
                    <span>Михаила Грушевского, 26/1</span>
                </div>
                <div class="item">
                    <img src="./images/icons/find-job.svg" alt="img">
                    <p>Ищите работу?</p>
                    <span>Отправьте нам свое резюме</span>
                </div>
            </div>
            <div class="about-cont">
                <h2>О компании </h2>
                <span class="line"></span>
                <h3>People who love luxury watches inspire us as much as precious timepieces.
                    That’s why sellers and buyers of luxury watches have our undivided attention.
                </h3>
                <p>	We know that our company wouldn’t exist without valuable
                    watches and enthusiastic watch lovers. But we are not
                    only fond of high-quality timepieces and their admirers.
                    The complexities of information technology and the challenges of
                    global markets also motivate us to push ourselves further every
                    day. Because web and mobile technologies are our core competencies.
                </p>
            </div>
            <form class="about-form" method="post" action="{{route('send_about')}}">
                @csrf
                <h2>Напишите нам</h2>
                <label for="about-name">
                    Имя *
                    <input name="name" type="text" id="about-name">
                </label>
                <label for="about-surname">
                    Фамилия *
                    <input name="surname" type="text" id="about-surname">
                </label>
                <label for="about-email">
                    E-MAIL *
                    <input name="email" type="text" id="about-email">
                </label>
                <label for="about-message">
                    Сообщение *
                    <textarea name="message" type="text" id="about-message"></textarea>
                </label>
                <button class="send-form btn-hover" type="submit">Отправить</button>
            </form>
        </div>
    </section>
@endsection