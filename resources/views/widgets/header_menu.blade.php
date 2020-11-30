<header class="header">
    <div class="header-mob">
        <div class="container">
            <div class="header-mob__top">
                <div class="mob-menu-btn">
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
                <a href="#" class="header-mob-logo">
                    <img src="/images/logo.png" alt="logo">World Watch Trade
                </a>
                <a data-fancybox data-src="#password-modal" href="javascript:;" class="header-mob__login-btn login-btn">
                    <img src="/images/person.png" alt="account">
                    <span class="notification-btn">2</span>
                </a>
            </div>
            <div class="search">
                <form action="/" class="search-field">
                    <div class="search-input-holder">
                        <input type="text" name="search" placeholder="Поиск...">
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
                                    <a href="#"><span>Hublot</span> Big Bang Fusion Dark Brown Alligator Strap</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="mob-menu">
            <div class="mob-menu__top">
                <div class="mob-menu-btn-close"></div>
                <div class="languages-btns">
                    <a href="#" class="active">ру</a>
                    <a href="#">en</a>
                </div>
            </div>
            <nav class="catalog-mob">
                <ul class="catalog-mob__gen-list">
                    <li class="has-menu">
                        <span>Швейцарские часы</span>
                        <ul class="catalog-mob__menu">
                            <li class="has-menu">
                                <span>Купить</span>
                                <ul class="catalog-mob__list">
                                    <a href="{{route('catalog')}}">Показать все результаты</a>
                                    <li>
                                        <span>Марки</span>
                                        <ul>
                                            @foreach($brands as $brand)
                                            <li>
                                                <a href="#">{{ $brand->title.' ('.count($brand->watchAdverts).')'}}</a>
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
                                <a data-fancybox data-src="#referral_number" href="javascript:;" class="thisMe">Продать</a>
                            </li>
                        </ul>
                    </li>
                    <li class="has-menu">
                        <span>Аксессуары</span>
                        <ul class="catalog-mob__menu">
                            <li class="has-menu">
                                <span>Купить</span>
                                <ul class="catalog-mob__list">
                                    <a href="{{route('catalog.accessory')}}">Показать все результаты</a>
                                    <li>
                                        <span>Марки</span>
                                        <ul>
                                            @foreach($accessoryMakes as $accessoryMake)
                                                <li>
                                                    <a href="#">{{$accessoryMake->title.' ('.count($accessoryMake->accessoryAdverts).')'}}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a data-fancybox data-src="#referral_number" href="javascript:;" class="thisMe">Продать</a>
                            </li>
                        <ul class="catalog-mob__list">
                            <a href="">Показать все результаты</a>
                        </ul>
                        </ul>
                    </li>
                    <li class="has-menu">
                        <span>Запчасти</span>
                        <ul class="catalog-mob__menu">
                            <li class="has-menu">
                                <span>Купить</span>
                                <ul class="catalog-mob__list">
                                    <a href="{{route('catalog.spare-parts')}}">Показать все результаты</a>
                                    <li>
                                        <span>Марки</span>
                                        <ul>
                                            @foreach($sparePartsMakes as $sparePartsMake)
                                                <li>
                                                    <a href="#">{{$sparePartsMake->title.' ('.count($sparePartsMake->sparePartsAdverts).')'}}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a data-fancybox data-src="#referral_number" href="javascript:;" class="thisMe">Продать</a>
                            </li>
                        <ul class="catalog-mob__list">
                            <a href="">Показать все результаты</a>
                        </ul>
                        </ul>
                    </li>
                    <li>
                        Контакты
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
                                                <a href="#"><span>Hublot</span> Big Bang Fusion Dark Brown Alligator Strap</a>
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
                                        <a data-fancybox data-src="#login-modal" href="javascript:;"  href="#">Войти</a>
                                        <a data-fancybox data-src="#registration-modal" href="javascript:;"  href="#">Регистрация</a>
                                    </div>
                                @else

                                <!-- Next block for personal cabinet -->

                                    <div class="header-login-block__portrait header-login-block__portrait_cabinet">
                                        <div class="header-cabinet-list-btn">
                                            <img src="/images/icons/profile-w.svg">
                                            <span class="notification-btn">1</span>
                                        </div>
                                        <ul class="header-cabinet-list">
                                            <li><a href="{{route('my_adverts')}}">Мои обьявления</a></li>
                                            <li><a href="#">Сообщения</a></li>
                                            <li><a href="#">Платежи</a></li>
                                            <li><a href="{{ route('editing-profile') }}">Профиль</a></li>
                                            <li><a href="{{ route('profile-settings') }}">Настройки</a></li>
                                            <li><a href="{{route('favorite')}}">Избранное</a></li>
                                            <li><a href="{{route('referral')}}">Создать реферальную ссылку</a></li>
                                            <li><a href="{{route('logout')}}">Выход</a></li>
                                        </ul>
                                    </div>
                                @endif
                            </div>
                            <form class="languages-btns">
                                @csrf
                                <label>
                                    <input type="radio" name="language" checked>
                                    <span>ру</span>
                                </label>
                                <label>
                                    <input type="radio" name="language">
                                    <span>en</span>
                                </label>
                            </form>
                        </div>
                    </div>
                    <nav class="header-desc__nav">
                        <ul class="header-desc-nav">
                            <li>
                                <a href="{{route('catalog')}}">Швейцарские часы</a>
                                <ul class="header-desc-nav__btns">
                                    <li class="list-btn">
                                        <a href="#"><span>Купить</span></a>
                                        <div class="header-nav-lists header-nav-lists_first">
                                            <div class="header-nav-list header-nav-list_few-columns">
                                                <h3>Марки</h3>
                                                <div>
                                                    <ul>
                                                        @foreach($brands as $brand)
                                                            <li>
                                                                <a href="#">{{ $brand->title.' ('.count($brand->watchAdverts).')'}}</a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
{{--                                            <div class="header-nav-list">--}}
{{--                                                <h3>Категории</h3>--}}
{{--                                                <ul>--}}
{{--                                                    @foreach($categories as $category)--}}
{{--                                                        <li>--}}
{{--                                                            <a href="#">{{$category->title.' ('.count($category->watchModels).')'}}</a>--}}
{{--                                                        </li>--}}
{{--                                                    @endforeach--}}
{{--                                                </ul>--}}
{{--                                            </div>--}}
                                        </div>
                                    </li>
                                    <li>
                                        <a data-fancybox data-src="#referral_number" href="javascript:;" ><span>Продать</span></a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="{{route('catalog.accessory')}}">Аксессуары</a>
                                <ul class="header-desc-nav__btns">
                                    <li class="list-btn">
                                        <a href="#"><span>Купить</span></a>
                                        <div class="header-nav-lists header-nav-lists_second">
                                            <div class="header-nav-list header-nav-list_few-columns">
                                                <h3>Марки</h3>
                                                <div>
                                                    <ul>
                                                        @foreach($accessoryMakes as $accessoryMake)
                                                            <li>
                                                                <a href="#">{{$accessoryMake->title.' ('.count($accessoryMake->accessoryAdverts).')'}}</a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
{{--                                            <div class="header-nav-list">--}}
{{--                                                <h3>Категории</h3>--}}
{{--                                                <ul>--}}
{{--                                                        <a href="#">Браслеты и ремешки / Детали и аксессуары</a>--}}
{{--                                                    </li>--}}
{{--                                                </ul>--}}
{{--                                            </div>--}}
                                        </div>
                                    </li>
                                    <li>
                                        <a data-fancybox data-src="#referral_number" href="javascript:;"><span>Продать</span></a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="{{route('catalog.spare-parts')}}">Запчасти</a>
                                <ul class="header-desc-nav__btns">
                                    <li class="list-btn">
                                        <a href="#"><span>Купить</span></a>
                                        <div class="header-nav-lists header-nav-lists_third">
                                            <div class="header-nav-list header-nav-list_few-columns">
                                                <h3>Марки</h3>
                                                <div>
                                                    <ul>
                                                        @foreach($sparePartsMakes as $sparePartsMake)
                                                            <li>
                                                                <a href="#">{{$sparePartsMake->title.' ('.count($sparePartsMake->sparePartsAdverts).')'}}</a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <a data-fancybox data-src="#referral_number" href="javascript:;"><span>Продать</span></a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Контакты</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>