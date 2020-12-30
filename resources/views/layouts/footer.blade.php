
</main>

<!-- footer -->
<footer class="footer full">
    <section class="footer_section full">
        <div class="container">
            <div class="footer_container full">
                <div class="footer1">
                    <a href="#" class="footer_logo">
                        <img src="/images/footer_logo.svg" alt="">
                    </a>
                </div>
                <div class="footer2">
                    <ul class="footer_menu">
                        <li>
                            <a href="#">@lang('Точки продаж')</a>
                        </li>
                        <li>
                            <a href="#">@lang('Доставка')
                            </a>
                        </li>
                        <li>
                            <a href="#">@lang('Акции')</a>
                        </li>
                        <li>
                            <a href="#">@lang('Оптовикам')
                            </a>
                        </li>
                        <li>
                            <a href="#">@lang('Новинки')</a>
                        </li>
                        <li>
                            <a href="#">@lang('Отзывы')</a>
                        </li>
                        <li>
                            <a href="#">@lang('Условия покупки')
                            </a>
                        </li>
                        <li>
                            <a href="#">@lang('Статьи')
                            </a>
                        </li>

                    </ul>
                </div>
                <div class="footer3">
                    <div class="footer_social">
                        <a href="#" target="_blank">
                            <img src="/images/fb.svg" alt="">
                            Facebook
                        </a>
                        <a href="#" target="_blank">
                            <img src="/images/vk.svg" alt="">
                            VK
                        </a>
                        <a href="#" target="_blank">
                            <img src="/images/insta.svg" alt="">
                            Instagram
                        </a>
                        <a href="#" target="_blank">
                            <img src="/images/linked.svg" alt="">
                            Linkedin
                        </a>
                    </div>
                </div>
                <div class="footer4 footer_contact">
                    <ul class="main_contact_list full">

                        <li>
                            <a href="trl:+994 12 343 00 00">
                                <img src="/images/phone.svg" alt="">
                                +994 12 343 00 00
                            </a>
                        </li>
                        <li>
                            <a href="trl:+994 12 343 00 00">
                                <img src="/images/phone.svg" alt="">
                                +994 12 343 00 00
                            </a>
                        </li>
                        <li>
                            <a href="mailto:export@aznar.az">
                                <img src="/images/env.svg" alt="">
                                export@aznar.az
                            </a>
                        </li>
                        <li class="adddress">
                            <p>
                                <img src="/images/pin.svg" alt="">
                                120 Natavan street, Geokchai, AZ2300, Azerbaijan
                            </p>
                        </li>
                    </ul>
                </div>
                <div class="footer5">
                    <a href="#" class="mastercard" target="_blank">
                        <img src="/images/mastercard.svg" alt="">
                    </a>
                    <a href="#" class="visa" target="_blank">
                        <img src="/images/visa.svg" alt="">
                    </a>
                </div>
            </div>
            <div class="footer_bottom full">
                <p>© Aznar shop. Все права защищены</p>
            </div>
        </div>
    </section>
</footer>
<!-- footer end-->
<!-- login popup-->
<div class="login_popup reg_popup mfp-with-anim mfp-hide" id="login-popup">
    <div class="reg_popup_container">
        <a href="#">
            <img src="/images/login_logo.svg" alt="">
        </a>
        <h4 class="reg_pop_title">@lang('ВХОД НА СТРАНИЦУ')</h4>
        <form class="full" id="login_web">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <input type="email" name="email" class="floating-input" placeholder=" ">
                        <label class="animate_label">@lang('Email')</label>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <input type="password" name="password" class="floating-input" placeholder=" ">
                        <label class="animate_label">@lang('Пароль')</label>
                    </div>
                </div>
                <div class="col-md-12 reg_pop_submit">
                    <button type="submit" name="login">@lang('Войти')</button>
                </div>
                <div class="reg_popup_forget col-md-12">
                    <label class="login_check">
                        <input type="checkbox">
                        <p>Запомнить</p>
                    </label>
                    <a href="#">Забыли пароль?</a>
                </div>
                <div class="col-md-12 reg_popup_bottom">
                    <p>@lang('Если у вас нет личного кабинета на сайте')</p>
                    <a class=" popup_btn" href="#reg-popup" data-effect="mfp-zoom-in">@lang('ПРОЙДИТЕ РЕГИСТРАЦИЮ')</a>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- login popup end-->
<!-- reg popup-->
<div class="registration_popup reg_popup mfp-with-anim mfp-hide" id="reg-popup">
    <div class="reg_popup_container">
        <a href="#">
            <img src="/images/login_logo.svg" alt="">
        </a>
        <h4 class="reg_pop_title">@lang('РЕГИСТРАЦИЯ НА САЙТЕ')</h4>
        <form action="" class="full" id="form_reg">
            <div class="row">
                <div class="col-md-12 duo_inp">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" name="name" class="floating-input" placeholder=" ">
                                <label class="animate_label">@lang('Имя')</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" name="surname" class="floating-input" placeholder=" ">
                                <label class="animate_label">@lang('Фамилия')</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <input type="email" name="email" class="floating-input" placeholder=" ">
                        <label class="animate_label">Email</label>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group ">
                        <input type="tel" name="phone" class="floating-input" placeholder=" ">
                        <label class="animate_label">@lang('Мобильный номер')</label>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group ">
                        <input type="text" name="address[][address]" class="floating-input" placeholder=" ">
                        <label class="animate_label">@lang('Адрес')</label>
                    </div>
                    <div class="reg_add_address"></div>
                </div>
                <div class="col-md-12">
                    <div class="form-group  date">
                        <input type="date" name="birthday" class="floating-input datepick" placeholder=" ">
                        <label class="animate_label">@lang('Дата рождения')</label>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group ">
                        <input type="password" name="password" class="floating-input" placeholder=" ">
                        <label class="animate_label">@lang('Пароль')</label>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group ">
                        <input type="password" name="password_confirmation" class="floating-input" placeholder=" ">
                        <label class="animate_label">@lang('Подтвердите пароль')</label>
                    </div>
                </div>
                <div class="col-md-12 reg_pop_submit">
                    <button type="submit" name="register">@lang('Войти')</button>
                </div>

                <div class="col-md-12 reg_popup_bottom">
                    <p>@lang('Если вы зарегистрированы на сайте')
                    </p>
                    <a class=" popup_btn" href="#login-popup" data-effect="mfp-zoom-in">@lang('ВОЙТИ НА САЙТ')</a>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- reg popup end-->
<!-- order call popup-->
<div class="order_call_popup reg_popup mfp-with-anim mfp-hide" id="order_call">
    <div class="reg_popup_container">
        <h4 class="reg_pop_title">@lang('ЗАКАЗАТЬ ЗВОНОК')</h4>
        <form action="" class="full">
            <div class="row">
                <div class="col-md-12 duo_inp">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" name="name" class="floating-input" placeholder=" ">
                                <label class="animate_label">@lang('Имя')</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" name="surname" class="floating-input" placeholder=" ">
                                <label class="animate_label">@lang('Фамилия')</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group ">
                        <input type="text" name="phone" class="floating-input" placeholder=" ">
                        <label class="animate_label">@lang('Мобильный номер')</label>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group  date">
                        <input type="text" class="floating-input datepick" value="27.11.2020" placeholder=" ">
                        <label class="animate_label">@lang('Дата звонка')</label>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group  select_floating">
                        <select class="chosen-select">
                            <option value="от 11:00 до 14:00">@lang('от 11:00 до 14:00')</option>
                            <option value="от 16:00 до 18:00">@lang('от 16:00 до 18:00')</option>
                        </select>
                        <label class="animate_label select_animated">@lang('Время звонка')</label>
                    </div>
                </div>
                <div class="col-md-12 reg_pop_submit">
                    <button id="send-call-form">@lang('Подтведить')</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- order call popup end-->

<!-- mobile menu-->
<div class="mobile_menu">
    <div class="mobile_menu_container">
        <!-- mobile menu top-->
        <div class="header_bottom full">
            <a href="#" class="logo">
                <img src="/images/logo.svg" alt="">
            </a>
            <div class="header_bottom_right">
                <div class="header_search_box">
                    <form action="">
                        <input type="text" placeholder="Поиск по сайту" class="header_search_inp inp_0">
                        <button class="header_search"></button>
                    </form>
                </div>
                <div class="header_user_box">
                    <a href="#" class="header_user"></a>
                    <div class="header_user_drop">
                        <div class="header_drop_inner">
                            <a class="popup_btn" href="#login-popup" data-effect="mfp-zoom-in">
                                <img src="/images/login.svg" alt="">
                                @lang('Вход')
                            </a>
                            <a class=" popup_btn" href="#reg-popup" data-effect="mfp-zoom-in">
                                <img src="/images/reg.svg" alt="">
                                @lang('Регистрация')
                            </a>
                        </div>
                    </div>
                </div>
                <a href="#" class="header_wishlist">
                    <span>2</span>
                </a>
                <a href="#" class="header_basket"></a>
                <button type="button" class="menu_close"></button>
            </div>
        </div>
        <!-- mobile menu top-->
        <!-- mobile menu top second-->
        <div class="mobile_small_langbar">
            <div class="langbar">
                <a href="/lang/az" class="{{app()->getLocale()== "az" ? "active" : ""}}">AZ</a>
                <a href="/lang/en" class="{{app()->getLocale()== "en" ? "active" : ""}}">En</a>
                <a href="/lang/ru" class="{{app()->getLocale()== "ru" ? "active" : ""}}">Ru</a>
            </div>
        </div>
        <div class="header_top_right">
            <a href="tel:+ 994 2027 4 05 17" class="header_tel"><img src="/images/htel.svg" alt="">+ 994 2027 4 05 17</a>
            <a class="header_call popup_btn" href="#order_call" data-effect="mfp-zoom-in">@lang('Заказать звонок')</a>

            <div class="langbar">
                <a href="/lang/az" class="{{app()->getLocale()== "az" ? "active" : ""}}">AZ</a>
                <a href="/lang/en" class="{{app()->getLocale()== "en" ? "active" : ""}}">En</a>
                <a href="/lang/ru" class="{{app()->getLocale()== "ru" ? "active" : ""}}">Ru</a>
            </div>
        </div>
        <!-- mobile menu top second end-->
        <!-- mobile navbar-->
        <div class="mobile_navbar full">
            <ul class="full">
                <li class="active">
                    <a href="/">@lang('Главная')</a>
                </li>
                <li>
                    <a href="{{route('product.new')}}">@lang('Новинки')</a>
                </li>
                <li>
                    <a href="#">@lang('Акции')</a>
                </li>
                <li>
                    <a href="{{route('sale.all')}}">@lang('Распродажа')</a>
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
                <li><a href="/purchase_terms">@lang('Условия покупки')</a></li>
                <li><a href="/wholesalers">@lang('Оптовикам')</a></li>
                <li><a href="/advantages">@lang('Преимущества')</a></li>
                <li><a href="{{route('articles')}}">@lang('Статьи')</a></li>
                <li><a href="{{route('news')}}">@lang('Новости')</a></li>
                <li><a href="{{route('reviews')}}">@lang('Отзывы')</a></li>
                <li><a href="/payment_info">@lang('Оплата')</a></li>
            </ul>
        </div>
        <!-- mobile navbar end-->
    </div>
</div>
<!-- mobile menu end-->

<script>
    $('.reg_add_address').click(function() {
        var i = 0;
        $(this).prev('.form-group').append('<input type="text" name="address[][address]" class="floating-input added_ad" placeholder=" ">');
    })
</script>

<body>

    <script src="/js/bootstrap.bundle.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/jquery.fancybox.js"></script>
    <script src="/js/jquery.mCustomScrollbar.js"></script>
    <script src="/js/owl.carousel.js"></script>
    <script src="/js/chosen.jquery.js"></script>
    <script src="/js/jquery.magnific-popup.js"></script>
    <script src="/js/datepicker.js"></script>
    <script src="/js/daterangepicker.js"></script>
    <script src="/js/moment.min.js"></script>


    <script src="/js/main.js"></script>



</body>

</html>

<script>
    var login = $('button[name = "login"]');
    login.click(function (event) {
        event.preventDefault();
        var form = $(this).parents('form')
        var data = form.serializeArray();
        loginRequest(data)

    });

    function loginRequest(data){
        $.ajax({
            type: "POST",
            url:"/login",
            data: data,
            dataType: 'json',
            success: function(result){
                window.location = result.redirect;
            },
            error: function (result) {
                $.each(result.responseJSON.errors, function( index, value ) {
                    var parent = $('#login_web').find(`input[name = ${index}]`).parent()
                    parent.addClass('popup_error');
                    parent.val();
                    parent.append(value);
                });
            }
        })
    }

    var reg = $('button[name = "register"]');

    $('#form_reg').submit(function (event) {
        event.preventDefault();
        var form = $('#form_reg');
        var data = form.serialize();

        registerRequest(data);
    })

    function registerRequest(data) {
        $.ajax({
            type: 'post',
            url: '/register',
            data: data,
            dataType: 'json',
            success: function (result) {
                window.location = result.redirect;
                // console.log(result)
            },
            error: function (result) {
                $.each(result.responseJSON.errors, function( index, value ) {
                    var parent = $('#form_reg').find(`input[name = ${index}]`).parent()
                    parent.addClass('popup_error');
                    parent.val();
                    parent.append(value);
                });
            }
        })
    }
</script>