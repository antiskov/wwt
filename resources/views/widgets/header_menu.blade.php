<header class="header">
    <div class="header-mob">
        <div class="container">
            <div class="header-mob__top">
                <div class="mob-menu-btn">
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
                <a href="{{route('home')}}" class="header-mob-logo">
                    <img src="/images/logo.png" alt="logo">World Watch Trade
                </a>
                @if(!\Illuminate\Support\Facades\Auth::check())
                    <a data-fancybox data-src="#password-modal" href="javascript:;"
                       class="header-mob__login-btn login-btn">
                        <img src="/images/person.png" alt="account">
                        <span class="notification-btn">2</span>
                    </a>
                @else

                <!-- Next block for personal cabinet -->

                    <div class="header-login-block__portrait header-login-block__portrait_cabinet">
                        <div class="header-cabinet-list-btn">
                            <img src="/images/icons/profile-w.svg">
                            <span class="notification-btn">1</span>
                        </div>
                        <ul class="header-cabinet-list">
                            <li><a href="{{route('my_adverts')}}">{{__('messages.menu_my_adverts')}}</a></li>
                            <li><a href="#">{{__('messages.menu_messages')}}</a></li>
                            <li><a href="{{route('payments')}}">{{__('messages.menu_payments')}}</a></li>
                            <li><a href="{{ route('editing-profile') }}">{{__('messages.menu_editing_profile')}}</a>
                            </li>
                            <li><a href="{{ route('profile-settings') }}">{{__('messages.menu_profile_settings')}}</a>
                            </li>
                            <li><a href="{{route('favorite')}}">{{__('messages.menu_favorite')}}</a></li>
                            <li><a href="{{route('referral')}}">{{__('messages.menu_referral')}}</a></li>
                            <li><a href="{{route('logout')}}">{{__('messages.menu_logout')}}</a></li>
                        </ul>
                    </div>
                @endif
            </div>
            <div class="search">
                <form class="search-field">
                    <div class="search-input-holder">
                        <input type="text" name="search" placeholder="Поиск...">
                        <div class="search-input-holder__buttons">
              <span class="clear-field-btn">
                <img src="/images/icons/close-dark.svg">
              </span>
                            <button class="search-field__send-btn" class="button">
                                <img src="/images/icons/search.svg" alt="{{__('messages.search')}}">
                            </button>
                        </div>
                    </div>
{{--                    <div class="search__result">--}}
{{--                        <div class="search__categories">--}}
{{--                            <label>--}}
{{--                                <input type="radio" name="category" checked>--}}
{{--                                <span>Часы</span>--}}
{{--                            </label>--}}
{{--                            <label>--}}
{{--                                <input type="radio" name="category">--}}
{{--                                <span>Аксессуары</span>--}}
{{--                            </label>--}}
{{--                            <label>--}}
{{--                                <input type="radio" name="category">--}}
{{--                                <span>Запчасти</span>--}}
{{--                            </label>--}}
{{--                        </div>--}}
{{--                        <div class="search__items">--}}
{{--                            <p style="display: none;">Ничего не найдено</p>--}}
{{--                            <!-- ДЛЯ БЭКА: Убрать атрибут стайл и выводить, если нет товаров -->--}}
{{--                            <ul>--}}
{{--                                <li>--}}
{{--                                    <a href="#"><span>Hublot</span> Big Bang</a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a href="#"><span>Hublot</span> Big Bang</a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a href="#"><span>Hublot</span> Big Bang</a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a href="#"><span>Hublot</span> Big Bang</a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a href="#"><span>Hublot</span> Big Bang Kroko Kautschukband</a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a href="#"><span>Hublot</span> Big Bang Fusion Dark Brown Alligator Strap</a>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </form>
            </div>
        </div>
        <div class="mob-menu">
            <div class="mob-menu__top">
                <div class="mob-menu-btn-close"></div>
                <form class="languages-btns">
                    @csrf
                    @if(Cookie::get('language') == 'ru')
                        <label>
                            <input type="radio" name="language" checked value="ru">
                            <span>ру</span>
                        </label>
                        <label>
                            <input type="radio" name="language" value="en">
                            <span>en</span>
                        </label>
                    @else
                        <label>
                            <input type="radio" name="language" value="ru">
                            <span>ру</span>
                        </label>
                        <label>
                            <input type="radio" name="language" checked value="en">
                            <span>en</span>
                        </label>
                    @endif
                </form>
            </div>
            <nav class="catalog-mob">
                <ul class="catalog-mob__gen-list">
                    <li class="has-menu">
                        <span>{{__('messages.watches')}}</span>
                        <ul class="catalog-mob__menu">
                            <li class="has-menu">
                                <span>{{__('messages.buy')}}</span>
                                <ul class="catalog-mob__list">
                                    <a href="{{route('catalog')}}">{{__('messages.show_all_results')}}</a>
                                    <li>
                                        <span>{{__('messages.brands')}}</span>
                                        <ul>
                                            @foreach($brands as $brand)
                                                <li>
                                                    <a href="{{route('catalog', ['brands[]' => $brand->title])}}&">{{ $brand->title.' ('.count($brand->watchAdverts).')'}}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    {{--                                    <li>--}}
                                    {{--                                        <span>Категории</span>--}}
                                    {{--                                        <ul>--}}
                                    {{--                                            @foreach($categories as $category)--}}
                                    {{--                                                <li>--}}
                                    {{--                                                    <a href="#">{{$category->title.' ('.count($category->watchModels).')'}}</a>--}}
                                    {{--                                                </li>--}}
                                    {{--                                            @endforeach--}}
                                    {{--                                        </ul>--}}
                                    {{--                                    </li>--}}
                                </ul>
                            </li>
                            <li>
                                @if(Auth::check())
                                    <a class="sell" href='{{route('submitting')}}'><span>{{__('messages.sell')}}</span></a>
                                @else
                                    <a data-fancybox data-src="#need_authorization" href="javascript:;"
                                       href="#">{{__('messages.sell')}}</a>
                                @endif
                            </li>
                        </ul>
                    </li>
                    <li class="has-menu">
                        <span>{{__('messages.accessories')}}</span>
                        <ul class="catalog-mob__menu">
                            <li class="has-menu">
                                <span>{{__('messages.buy')}}</span>
                                {{--                                                    <ul class="catalog-mob__list">--}}
                                {{--                                                        <a href="{{route('catalog.accessory')}}">{{__('messages.show_all_results')}}</a>--}}
                                {{--                                                        <li>--}}
                                {{--                                                            <span>Марки</span>--}}
                                {{--                                                            <ul>--}}
                                {{--                                                                @foreach($accessoryMakes as $accessoryMake)--}}
                                {{--                                                                    <li>--}}
                                {{--                                                                        <a href="#">{{$accessoryMake->title.' ('.count($accessoryMake->accessoryAdverts).')'}}</a>--}}
                                {{--                                                                    </li>--}}
                                {{--                                                                @endforeach--}}
                                {{--                                                            </ul>--}}
                                {{--                                                        </li>--}}
                                {{--                                                    </ul>--}}
                            </li>
                            <li>
                                <a data-fancybox data-src="#referral_number" href="javascript:;" class="thisMe">{{__('messages.sell')}}</a>
                            </li>
                            <ul class="catalog-mob__list">
                                <a href="">{{__('messages.show_all_results')}}</a>
                            </ul>
                        </ul>
                    </li>
                    <li class="has-menu">
                        <span>{{__('messages.spare_parts')}}</span>
                        <ul class="catalog-mob__menu">
                            <li class="has-menu">
                                <span>{{__('messages.buy')}}</span>
                                {{--                                                    <ul class="catalog-mob__list">--}}
                                {{--                                                        <a href="{{route('catalog.spare-parts')}}">{{__('messages.show_all_results')}}</a>--}}
                                {{--                                                        <li>--}}
                                {{--                                                            <span>Марки</span>--}}
                                {{--                                                            <ul>--}}
                                {{--                                                                @foreach($sparePartsMakes as $sparePartsMake)--}}
                                {{--                                                                    <li>--}}
                                {{--                                                                        <a href="#">{{$sparePartsMake->title.' ('.count($sparePartsMake->sparePartsAdverts).')'}}</a>--}}
                                {{--                                                                    </li>--}}
                                {{--                                                                @endforeach--}}
                                {{--                                                            </ul>--}}
                                {{--                                                        </li>--}}
                                {{--                                                    </ul>--}}
                            </li>
                            <li>
                                <a data-fancybox data-src="#referral_number" href="javascript:;" class="thisMe">{{__('messages.sell')}}</a>
                            </li>
                            <ul class="catalog-mob__list">
                                <a href="">{{__('messages.show_all_results')}}</a>
                            </ul>
                        </ul>
                    </li>
                    <li>
                        <a href="{{route('about')}}">{{__('messages.contacts')}}</a>
                    </li>
                </ul>
            </nav>
            <div class="mob-menu-social">
                <h3>Мы в соцсетях</h3>
                <div class="mob-menu-social__content">
                    <a href="#/" class="social-wrap_link">
                        <img src="/images/icons/facebock.svg" alt="img">
                    </a>
                    <a href="#/" class="social-wrap_link">
                        <img src="/images/icons/insta.svg" alt="img">
                    </a>
                    <a href="#/" class="social-wrap_link">
                        <img src="/images/icons/youtube.svg" alt="img">
                    </a>
                    <a href="#/" class="social-wrap_link">
                        <img src="/images/icons/twiter.svg" alt="img">
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="header-desc">
        <div class="container">
            <div class="header-desc__content">
                <a href='{{route('home')}}' class="header-desc-logo">
                    <div class="header-desc-logo__img">
                        <img src="/images/logo.png" alt="logo">
                    </div>
                    <p class="header-desc-logo__subtext">welcome to</p>
                    <p class="header-desc-logo__text">World Watch Trade</p>
                </a>
                <div class="header-desc__main">
                    <div class="header-desc__top">
                        <div class="search search_desc">
                            <form action="/" class="search-field">
                                <div class="search-input-holder">
                                    <input type="text" name="search" placeholder="Поиск">
                                    <div class="search-input-holder__buttons">
                    <span class="clear-field-btn">
                      <img src="/images/icons/close-dark.svg" alt="Очистить поиск">
                    </span>
                                        <button class="search-field__send-btn">
                                            <img src="/images/icons/search.svg" alt="Поиск">
                                        </button>
                                    </div>
                                </div>
                                <div class="search__result">
                                    <div class="search__categories">
                                        <label>
                                            <input type="radio" name="category" checked>
                                            <span>Часы</span>
                                        </label>
                                        <label>
                                            <input type="radio" name="category">
                                            <span>Аксессуары</span>
                                        </label>
                                        <label>
                                            <input type="radio" name="category">
                                            <span>Запчасти</span>
                                        </label>
                                    </div>
                                    <div class="search__items">
                                        <p style="display: none;">Ничего не найдено</p>
                                        <!-- ДЛЯ БЭКА: Убрать атрибут стайл и выводить, если нет товаров -->
                                        <ul>
                                            <li>
                                                <a href="#"><span>Hublot</span> Big Bang</a>
                                            </li>
                                            <li>
                                                <a href="#"><span>Hublot</span> Big Bang</a>
                                            </li>
                                            <li>
                                                <a href="#"><span>Hublot</span> Big Bang</a>
                                            </li>
                                            <li>
                                                <a href="#"><span>Hublot</span> Big Bang</a>
                                            </li>
                                            <li>
                                                <a href="#"><span>Hublot</span> Big Bang Kroko Kautschukband</a>
                                            </li>
                                            <li>
                                                <a href="#"><span>Hublot</span> Big Bang Fusion Dark Brown Alligator
                                                    Strap</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="header-login-block">
                            <div class="header-login-block__btns">
                                @if(!\Illuminate\Support\Facades\Auth::check())
                                    <div>
                                        <a data-fancybox data-src="#login-modal" href="javascript:;"
                                           href="#">{{__('messages.login')}}</a>
                                        <a data-fancybox data-src="#registration-modal" href="javascript:;"
                                           href="#">{{__('messages.registration')}}</a>
                                    </div>
                                @else

                                <!-- Next block for personal cabinet -->

                                    <div class="header-login-block__portrait header-login-block__portrait_cabinet">
                                        <div class="header-cabinet-list-btn">
                                            <img src="/images/icons/profile-w.svg">
                                            <span class="notification-btn">1</span>
                                        </div>
                                        <ul class="header-cabinet-list">
                                            <li><a href="{{route('my_adverts')}}">{{__('messages.menu_my_adverts')}}</a>
                                            </li>
                                            <li><a href="#">{{__('messages.menu_messages')}}</a></li>
                                            <li><a href="{{route('payments')}}">{{__('messages.menu_payments')}}</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('editing-profile') }}">{{__('messages.menu_editing_profile')}}</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('profile-settings') }}">{{__('messages.menu_profile_settings')}}</a>
                                            </li>
                                            <li><a href="{{route('favorite')}}">{{__('messages.menu_favorite')}}</a>
                                            </li>
                                            <li><a href="{{route('referral')}}">{{__('messages.menu_referral')}}</a>
                                            </li>
                                            <li><a href="{{route('logout')}}">{{__('messages.menu_logout')}}</a></li>
                                        </ul>
                                    </div>
                                @endif
                            </div>
                            <form class="languages-btns">
                                @csrf
                                @if(Cookie::get('language') == 'ru')
                                    <label>
                                        <input type="radio" name="language" checked value="ru">
                                        <span>ру</span>
                                    </label>
                                    <label>
                                        <input type="radio" name="language" value="en">
                                        <span>en</span>
                                    </label>
                                @else
                                    <label>
                                        <input type="radio" name="language" value="ru">
                                        <span>ру</span>
                                    </label>
                                    <label>
                                        <input type="radio" name="language" checked value="en">
                                        <span>en</span>
                                    </label>
                                @endif
                            </form>
                        </div>
                    </div>
                    <nav class="header-desc__nav">
                        <ul class="header-desc-nav">
                            <li>
                                <a href="{{route('catalog')}}">{{__('messages.watches')}}</a>
                                <ul class="header-desc-nav__btns">
                                    <li class="list-btn">
                                        <a href="#"><span>{{__('messages.buy')}}</span></a>
                                        {{--                                        <div class="header-nav-lists header-nav-lists_first">--}}
                                        {{--                                            <div class="header-nav-list header-nav-list_few-columns">--}}
                                        {{--                                                <h3>Марки</h3>--}}
                                        {{--                                                <div>--}}
                                        {{--                                                    <ul>--}}
                                        {{--                                                        @foreach($brands as $brand)--}}
                                        {{--                                                            <li>--}}
                                        {{--                                                                <a href="#">{{ $brand->title.' ('.count($brand->watchAdverts).')'}}</a>--}}
                                        {{--                                                            </li>--}}
                                        {{--                                                        @endforeach--}}
                                        {{--                                                    </ul>--}}
                                        {{--                                                </div>--}}
                                        {{--                                            </div>--}}
                                        {{--                                            --}}{{--                                            <div class="header-nav-list">--}}
                                        {{--                                            --}}{{--                                                <h3>Категории</h3>--}}
                                        {{--                                            --}}{{--                                                <ul>--}}
                                        {{--                                            --}}{{--                                                    @foreach($categories as $category)--}}
                                        {{--                                            --}}{{--                                                        <li>--}}
                                        {{--                                            --}}{{--                                                            <a href="#">{{$category->title.' ('.count($category->watchModels).')'}}</a>--}}
                                        {{--                                            --}}{{--                                                        </li>--}}
                                        {{--                                            --}}{{--                                                    @endforeach--}}
                                        {{--                                            --}}{{--                                                </ul>--}}
                                        {{--                                            --}}{{--                                            </div>--}}
                                        {{--                                        </div>--}}
                                    </li>
                                    <li>
                                        @if(Auth::check())
                                            <a class="sell" href='{{route('submitting')}}'><span>{{__('messages.sell')}}</span></a>
                                        @else
                                            <a data-fancybox data-src="#need_authorization" href="javascript:;"
                                               href="#">{{__('messages.sell')}}</a>
                                        @endif
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">{{__('messages.accessories')}}</a>
                                {{--                                                            <ul class="header-desc-nav__btns">--}}
                                {{--                                                                <li class="list-btn">--}}
                                {{--                                                                    <a href="#"><span>{{__('messages.buy')}}</span></a>--}}
                                {{--                                                                    <div class="header-nav-lists header-nav-lists_second">--}}
                                {{--                                                                        <div class="header-nav-list header-nav-list_few-columns">--}}
                                {{--                                                                            <h3>Марки</h3>--}}
                                {{--                                                                            <div>--}}
                                {{--                                                                                <ul>--}}
                                {{--                                                                                    @foreach($accessoryMakes as $accessoryMake)--}}
                                {{--                                                                                        <li>--}}
                                {{--                                                                                            <a href="#">{{$accessoryMake->title.' ('.count($accessoryMake->accessoryAdverts).')'}}</a>--}}
                                {{--                                                                                        </li>--}}
                                {{--                                                                                    @endforeach--}}
                                {{--                                                                                </ul>--}}
                                {{--                                                                            </div>--}}
                                {{--                                                                        </div>--}}
                                {{--                                                                        <div class="header-nav-list">--}}
                                {{--                                                                            <h3>Категории</h3>--}}
                                {{--                                                                            <ul>--}}
                                {{--                                                                                    <a href="#">Браслеты и ремешки / Детали и аксессуары</a>--}}
                                {{--                                                                                </li>--}}
                                {{--                                                                            </ul>--}}
                                {{--                                                                        </div>--}}
                                {{--                                                                    </div>--}}
                                {{--                                                                </li>--}}
                                {{--                                                                <li>--}}
                                {{--                                                                    <a data-fancybox data-src="#referral_number" href="javascript:;"><span>{{__('messages.sell')}}</span></a>--}}
                                {{--                                                                </li>--}}
                                {{--                                                            </ul>--}}
                            </li>
                            <li>
                                <a href="#">{{__('messages.spare_parts')}}</a>
                                {{--                                                            <ul class="header-desc-nav__btns">--}}
                                {{--                                                                <li class="list-btn">--}}
                                {{--                                                                    <a href="#"><span>{{__('messages.buy')}}</span></a>--}}
                                {{--                                                                    <div class="header-nav-lists header-nav-lists_third">--}}
                                {{--                                                                        <div class="header-nav-list header-nav-list_few-columns">--}}
                                {{--                                                                            <h3>Марки</h3>--}}
                                {{--                                                                            <div>--}}
                                {{--                                                                                <ul>--}}
                                {{--                                                                                    @foreach($sparePartsMakes as $sparePartsMake)--}}
                                {{--                                                                                        <li>--}}
                                {{--                                                                                            <a href="#">{{$sparePartsMake->title.' ('.count($sparePartsMake->sparePartsAdverts).')'}}</a>--}}
                                {{--                                                                                        </li>--}}
                                {{--                                                                                    @endforeach--}}
                                {{--                                                                                </ul>--}}
                                {{--                                                                            </div>--}}
                                {{--                                                                        </div>--}}
                                {{--                                                                    </div>--}}
                                {{--                                                                </li>--}}
                                {{--                                                                <li>--}}
                                {{--                                                                    <a data-fancybox data-src="#referral_number" href="javascript:;"><span>{{__('messages.sell')}}</span></a>--}}
                                {{--                                                                </li>--}}
                                {{--                                                            </ul>--}}
                            </li>
                            <li>
                                <a href="{{route('about')}}">{{__('messages.contacts')}}</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
<script>
    document.addEventListener("DOMContentLoaded", function (event) {
        document.querySelectorAll('.languages-btns input').forEach(function (item) {
            item.addEventListener('change', function (e) {
                $.ajax({
                    url: '/set_locale/' + this.value,
                    success: function (data) {
                        // $('#advert').empty();
                        // $('#advert').html(data.output);
                        window.location.reload();
                    },
                })
            })
        })

        $('#registration-form').on('submit', function (e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: '/register-user',
                data: $('#registration-form').serializeArray(),
                datatype: 'html',
                success: function (data) {
                    $('#registration-div').empty();
                    $('#registration-div').html(data.output);
                },
                error: function (xhr) {
                    console.log(xhr.responseJSON.errors.email[0]);
                    if (xhr.status === 422) {
                        if (xhr.responseJSON.errors.email[0] === 'The email must be a valid email address.') {
                            $('#reg-form-email').addClass('form-elem_err').removeClass('form-elem_success');
                            $('#reg-form-email + span').text(xhr.responseJSON.errors.email[0]);
                        }

                        if (xhr.responseJSON.errors.email[0] === 'The email has already been taken.') {
                            $('#reg-form-email').addClass('form-elem_err').removeClass('form-elem_success');
                            $('#reg-form-email + span').text(xhr.responseJSON.errors.email[0]);
                        }

                    }
                }
            }).done(function () {
                $(this).addClass("done");
            })
        });

        $('#login-form').on('submit', function (e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: '/check-login-email',
                data: $('#login-form').serializeArray(),
                datatype: 'html',
                success: function (data) {
                    if (data.email) {
                        $('#password-form-email').val(data.email);
                        $.fancybox.close({
                            src: '#login-modal',
                        });
                        $.fancybox.open({
                            src: '#password-modal',
                        });
                    }
                    if (data.status == 'error') {
                        $('#login-email-form').addClass('form-elem_err').removeClass('form-elem_success');
                        $('#login-email-form + span').text(data.message);
                    }
                }
            }).done(function () {
                $(this).addClass("done");
            })
        });

        $('#password-form').on('submit', function (e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: '/login-password',
                data: $('#password-form').serializeArray(),
                datatype: 'html',
                success: function (data) {
                    $('#password-form').html(data.output);
                    if (data.status == 'success') {
                        window.location.replace(document.location.href);
                    }
                    if (data.status == 'error') {
                        $('#password-login-form').addClass('form-elem_err').removeClass('form-elem_success');
                        $('#password-login-form + span').text(data.message);
                    }
                },
            }).done(function () {
                $(this).addClass("done");
            })
        });
    });
</script>
