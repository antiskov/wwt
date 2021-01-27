@extends('profile_user.layouts.main')

@section('profile-content')
    <section class="profile prof-control">
        <div class="">
            <div class="container-wrap">
                @include('profile_user.partials.left_menu')
                <form class="block-setting" method="post" action="{{ route('settings-form') }}">
                    @csrf
                    <h2 class="name-lk mob">{{__('messages.settings')}}</h2>
                    <h2 class="name-lk des">{{__('messages.settings_about_user')}}</h2>
                    <div class="chek_cont_set">
                        <label class="checkbox-other">
                            @if(isset($check['remember']))
                                <input name="stay_logged_in" type="checkbox" checked value="1">
                            @else
                                <input name="stay_logged_in" type="checkbox">
                            @endif
                            <span>{{__('messages.settings_will_be_login')}}</span>
                        </label>
                        <span>{{__('messages.settings_will_be_login_description')}}</span>
                    </div>
                    <h2 class="name-lk">{{__('messages.settings_notifications')}}</h2>
                    <div class="more-sett">
                        <div class="chek_cont_set">
                            <label class="checkbox-other">
                                @if($check['receive_service_info'])
                                    <input name="receive_service_info" type="checkbox" checked= value="1">
                                @else
                                    <input name="receive_service_info" type="checkbox">
                                @endif
                                <span>{{__('messages.settings_i_wont_get_info')}}</span>
                            </label>
                            <span>{{__('messages.settings_info_about_wwt_in_inbox')}}</span>
                        </div>
                        <div class="chek_cont_set">
                            <label class="checkbox-other">
                                @if($check['receive_partners_adverts'])
                                    <input name="receive_partners_adverts" type="checkbox" checked value="1">
                                @else
                                    <input name="receive_partners_adverts" type="checkbox">
                                @endif
                                <span>{{__('messages.settings_info_our_partners')}}</span>
                            </label>
                            <span>{{__('messages.settings_info_about_notification_our_partners')}}</span>
                            <div class="select-price">
                                <p>{{__('messages.settings_my_favorite_languages')}}</p>
                                <div class="cont">
                                    @if($check['language_communication'] == 'ru')
                                        <input name="language_communication" type="hidden" value="Русский">
                                    @else
                                        <input name="language_communication" type="hidden" value="">
                                    @endif
                                    <div class="select-value rotate">
                                        @if($check['language_communication'] == 'ru')
                                            <span>{{__('messages.russian')}}</span>
                                        @elseif($check['language_communication'] == 'en')
                                            <span>{{__('messages.english')}}</span>
                                        @else
                                            <span>{{__('messages.settings_choose')}}</span>
                                        @endif
                                        <ul class="value-items">
                                            <li>{{__('messages.russian')}}</li>
                                            <li>{{__('messages.english')}}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="save-setting btn-hover">{{__('messages.save')}}</button>
                </form>
            </div>
        </div>
    </section>
@endsection
