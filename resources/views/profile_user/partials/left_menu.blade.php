<div class="bg-cont">
    <div class="person-block">
        <img src="/images/icons/close.svg" alt="img" class="close">
        <div class="person-info">
            <div class="img-cont">
                <img
                    src="{{asset('/storage/images/profiles/'.auth()->user()->email.'/small_'.auth()->user()->avatar)}}"
                    alt="img">
            </div>
            <div class="peron-name">{{auth()->user()->name}}</div>
        </div>
        <ul class="link-items">
            <li><img src="/images/icons/my-order.svg" alt=""><a href="{{route('my_adverts')}}">Мои объявления</a></li>
            <li><img src="/images/icons/email.svg" alt=""><a href="#/">Сообщения</a></li>
            <li><img src="/images/icons/pay.svg" alt=""><a href="#/">Платежи</a></li>
            <li><img src="/images/icons/profile.svg" alt=""><a href="{{ route('editing-profile') }}">Профиль</a></li>
            <li><img src="/images/icons/setting.svg" alt=""><a href="{{route('profile-settings')}}">Настройки</a></li>
            <li><img src="/images/icons/favor.svg" alt=""><a href="{{route('favorite')}}">Избранное</a></li>
            <li><img src="/images/icons/ref-link.svg" alt=""><a href="{{route('referral')}}">Создать реферальную ссылку</a></li>
            <li><img src="/images/icons/exit.svg" alt=""><a href="{{route('logout')}}">Выход</a></li>
        </ul>
    </div>
</div>
