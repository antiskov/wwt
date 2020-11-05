@extends('profile_user.layouts.main')

@section('profile-content')
    <form class="block-setting" method="post" action="{{ route('settings-form') }}">
        @csrf
        <h2 class="name-lk mob">Настройки</h2>
        <h2 class="name-lk des">Все о Вашем аккаунте</h2>
        <div class="chek_cont_set">
            <label class="checkbox-other">
                @if($check)
                    <input name="stay_logged_in" type="checkbox" checked value="1">
                @else
                    <input name="stay_logged_in" type="checkbox">
                @endif
                <span>Оставаться залогиненным</span>
            </label>
            <span>Если Вы выберите опцию «Оставаться залогиненным», то Вам нужно будет реже
                        регистрироваться на данном устройстве.
                        В целях безопасности используйте эту опцию только на Ваших личных устройствах.
                    </span>
        </div>
        <h2 class="name-lk">Уведомления по эл. почте</h2>
        {{--        <div class="chek_cont_set">--}}
        {{--            <label class="checkbox-other">--}}
        {{--                <input name="receive_service_info" type="checkbox" checked="">--}}
        {{--                <span>Я хочу получать информацию о сервисах и продуктах World Watch Trade</span>--}}
        {{--            </label>--}}
        {{--            <span>Не пропускать больше ничего важного!</span>--}}
        {{--        </div>--}}
        <div class="more-sett">
            <div class="chek_cont_set">
                <label class="checkbox-other">
                    <input name="receive_service_info" type="checkbox" checked="" value="1">
                    <span>Я хочу получать информацию о сервисах и продуктах World Watch Trade</span>
                </label>
                <span>Информация и предложения World Watch Trade в Вашем почтовом ящике.</span>
            </div>
            <div class="chek_cont_set">
                <label class="checkbox-other">
                    <input name="receive_partners_adverts" type="checkbox" checked="" value="1">
                    <span>Актуальные объявления наших партнеров</span>
                </label>
                <span>Наши партнеры регулярно делают нам привлекательные предложения, которые мы с удовольствием перенаправляем нашим клиентам.</span>
                <div class="sep-cont">
                    <p>Мои предпочитаемые языки:</p>
{{--                    <select name="language" class="custom-select" required="required">--}}
{{--                        <option value="ru">Русский</option>--}}
{{--                        <option value="en">Английский</option>--}}
{{--                    </select>--}}
                    <div class="lang-wrap">
                        <input type="hidden" name="" value="">
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
            </div>
        </div>
        <button type="submit" class="save-setting btn-hover">Сохранить</button>
    </form>
@endsection
