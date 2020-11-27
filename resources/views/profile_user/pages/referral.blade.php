@extends('profile_user.layouts.main')

@section('profile-content')
    <section class="referral">
        <div class="">
                <div class="block-referral">
                    <h2 class="name-lk">Создать реферальную ссылку</h2>
                    <p>
                        Если вы хотите порекомендовать кому-то нашу платформу -
                        вы можете создать реферальную ссылку введя данные нового пользователя
                    </p>
                    <form action="#" class="referral">
                        <label for="referral-email">
                            Введите email
                            <input type="email" id="referral-email">
                        </label>
                        <label for="referral-name">
                            Введите Имя
                            <input type="email" id="referral-name">
                        </label>
                        <button class="referral-save btn-hover">Сформировать ссылку</button>


                    </form>

                    <div class="referral-link">
                        <a href="#/">
                            https://www.WWT.com.ru/referral link/referral link/34875934
                        </a>
                    </div>

                    <div class="block-thanks">
                        <p>
                            Спасибо, за то что рекомендуете нашу платформу своим родным, , близким, друзьям, коллегам.
                        </p>
                        <p>
                            После того как тот кому вы отправили ссылку создаст своё первое платное объявление-
                            вы получите бонус в виде публикация бесплатного объявления.
                        </p>
                    </div>
                </div>
        </div>
    </section>
@endsection
