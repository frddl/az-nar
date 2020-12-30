<!DOCTYPE html>
<html lang="az">

<head>
    <title>HOME PAGE</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="content-language" content="az" />
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon shortcut" href="/images/favico.png" />
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/css/bootstrap-grid.css">
    <link rel="stylesheet" type="text/css" href="/css/jquery.fancybox.css">
    <link rel="stylesheet" type="text/css" href="/css/jquery.mCustomScrollbar.css">
    <link rel="stylesheet" type="text/css" href="/css/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="/css/owl.theme.default.min.css">
    <link rel="stylesheet" type="text/css" href="/css/chosen.css">
    <link rel="stylesheet" type="text/css" href="/css/daterangepicker.css">
    <link rel="stylesheet" type="text/css" href="/css/magnific-popup.css">
    <link rel="stylesheet" type="text/css" href="/css/datepicker.css">
    <link rel="stylesheet" type="text/css" href="/css/default.css">
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <link rel="stylesheet" type="text/css" href="/css/responsive.css">
    <script src="/js/jquery-latest.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>


</head>
<!-- header-->
<header class="header full">
    <div class="container">
        <div class="header_container full">
            <div class="header_top full">
                <div class="header_top_left">
                    <ul>
                        <li><a href="/purchase_terms">@lang('Условия покупки')</a></li>
                        <li><a href="/wholesalers">@lang('Оптовикам')</a></li>
                        <li><a href="/advantages">@lang('Преимущества')</a></li>
                        <li><a href="{{route('articles')}}">@lang('Статьи')</a></li>
                        <li><a href="{{route('news')}}">@lang('Новости')</a></li>
                        <li><a href="{{route('reviews')}}">@lang('Отзывы')</a></li>
                        <li><a href="/payment_info">@lang('Оплата')</a></li>
                    </ul>
                </div>
                <div class="header_top_right">
                    <a class="header_call popup_btn" href="#order_call" data-effect="mfp-zoom-in">@lang('Заказать звонок')</a>
                    <a href="/" class="header_tel"><img src="/images/htel.svg" alt="">+ 994 2027 4 05 17</a>
                    <div class="langbar">
                        <a href="/lang/az" class="{{(app()->getLocale()=="az") ? "active" : ""}}">AZ</a>
                        <a href="/lang/en" class="{{(app()->getLocale()=="en") ? "active" : ""}}">En</a>
                        <a href="/lang/ru" class="{{(app()->getLocale()=="ru") ? "active" : ""}}">Ru</a>
                    </div>
                </div>
            </div>
            <div class="header_bottom full">
                <a href="/" class="logo">
                    <img src="/images/logo.svg" alt="">
                </a>
                <nav class="main_menu">
                    <ul>
                        <li class="{{request()->segment(2) == null ? "active" : ""}}">
                            <a href="/">@lang('Главная')</a>
                        </li>
                        <li class="{{request()->segment(2) == "new_products" ? "active" : ""}}">
                            <a href="{{route('product.new')}}">@lang('Новинки')</a>
                        </li>
                        <li>
                            <a href="{{route('share.all')}}">@lang('Акции')</a>
                        </li>
                        <li>
                            <a href="#">@lang('Распродажа')</a>
                        </li>
                        <li>
                            <a href="{{route('points')}}">@lang('Точки продаж')</a>
                        </li>
                        <li>
                            <a href="{{route('delivery')}}">@lang('Доставка')</a>
                        </li>
                        <li>
                            <a href="{{route('contact')}}">@lang('Контакты')</a>
                        </li>
                    </ul>
                </nav>

                <div class="header_bottom_right">
                    <div class="header_search_box">
                        <form action="">
                            <input type="text" placeholder="@lang('Поиск по сайту')" class="header_search_inp inp_0">
                            <button class="header_search"></button>
                        </form>
                    </div>
                    <div class="header_user_box">
                        <a href="/#" class="header_user"></a>
                        <div class="header_user_drop">
                            @guest()
                                <div class="header_drop_inner">
                                <a class=" popup_btn" href="#login-popup" data-effect="mfp-zoom-in">
                                    <img src="/images/login.svg" alt="">
                                    @lang('Вход')
                                </a>
                                <a class=" popup_btn" href="#reg-popup" data-effect="mfp-zoom-in">
                                    <img src="/images/reg.svg" alt="">
                                    @lang('Регистрация')
                                </a>
                            </div>
                            @endguest
                            @auth()
                                <div class="header_drop_inner">
                                        <a href="{{route('user.profile')}}">
                                            <img src="/images/user_down_user.svg" alt="">
                                            @lang('Личные данные')
                                        </a>
                                        <a href="{{route('user.purchases')}}">
                                            <img src="/images/user_down_bag.svg" alt="">
                                            @lang('Мои покупки')
                                        </a>
                                        <a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <img src="/images/log_out.svg" alt="">
                                            @lang('Выход')
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </div>
                            @endauth
                        </div>
                    </div>
                    @auth()
                    <a href="{{route('user.wishList')}}" class="header_wishlist">
                        <span>{{\Illuminate\Support\Facades\Auth::user()->favorites->count()}}</span>
                    </a>
                    @endauth
                    <a href="{{route('basket')}}" class="header_basket">
                            @if($cartCount > 0)
                                <span>{{$cartCount}}</span></a>
                            @endif
                    <button type="button" class="menu_open"></button>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- header end-->
