<div class="bg-cont">
    <div class="person-block">
        <img src="/images/icons/close.svg" alt="img" class="close">
        <div class="person-info">
            <div class="img-cont">
                <img
                    src="{{asset((new \App\Services\ProfileService())->getAvatar(auth()->user()->id))}}"
                    alt="img">
            </div>
            <div class="peron-name">{{auth()->user()->name}}</div>
        </div>
        <ul class="link-items">
            <li><img src="/images/icons/my-order.svg" alt=""><a href="{{route('my_adverts')}}">{{__('messages.menu_my_adverts')}}</a></li>
            <li><img src="/images/icons/email.svg" alt=""><a href="#/">{{__('messages.menu_messages')}}</a></li>
            <li><img src="/images/icons/pay.svg" alt=""><a href="{{route('payments')}}">{{__('messages.menu_payments')}}</a></li>
            <li><img src="/images/icons/profile.svg" alt=""><a href="{{ route('editing-profile') }}">{{__('messages.menu_editing_profile')}}</a></li>
            <li><img src="/images/icons/setting.svg" alt=""><a href="{{route('profile-settings')}}">{{__('messages.menu_profile_settings')}}</a></li>
            <li><img src="/images/icons/favor.svg" alt=""><a href="{{route('favorite')}}">{{__('messages.menu_favorite')}}</a></li>
            <li><img src="/images/icons/ref-link.svg" alt=""><a href="{{route('referral')}}">{{__('messages.menu_referral')}}</a></li>
            <li><img src="/images/icons/exit.svg" alt=""><a href="{{route('logout')}}">{{__('messages.menu_logout')}}</a></li>
        </ul>
    </div>
</div>
