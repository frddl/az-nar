<!DOCTYPE html>
<html lang="az">
@include('layouts.header')
<main class="main full" role="main">
    <section class="wishlist_section full">
        <div class="container">
            <!-- mobile breadcrumb-->
            <div class="mobile_breadcrumb">
                <ul>
                    <li>
                        <a href="/">@lang('Главная')</a>
                    </li>
                    <li>
                        <a href="{{route('user.wishList')}}">@lang('Избранные')</a>
                    </li>
                </ul>
            </div>
            <!-- mobile breadcrumb end-->
            <div class="wishlist_container full">
                <div class="section_title mobile_title">
                    <h2>@lang('Избранные')</h2>
                </div>
                <div class="wishlist_cards full">
                    <div class="row">
                        <div class="col-xl-3 col-lg-4 col-md-6 col-6">
                            <div class="product_card">
                                <button class="wish_delete"></button>
                                <a href="#" class="full h-100">
                                    <div class="product_img">
                                        <img src="/images/pro1.png" alt="">
                                    </div>
                                    <div class="product_desc">
                                        <p class="product_name">Grante Клубника Варенье</p>
                                        <p class="product_price">3.00 <span class="azn"></span></p>
                                        <button class="add_to_basket"> @lang('В КОРЗИНУ')</button>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-6">
                            <div class="product_card">
                                <button class="wish_delete"></button>
                                <a href="#" class="full h-100">
                                    <div class="product_img">
                                        <img src="/images/pro2.png" alt="">
                                    </div>
                                    <div class="product_desc">
                                        <p class="product_name">Grante VITAQUA</p>
                                        <p class="product_price">3.00 <span class="azn"></span></p>
                                        <button class="add_to_basket"> @lang('В КОРЗИНУ')</button>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-6">
                            <div class="product_card">
                                <button class="wish_delete"></button>
                                <a href="#" class="full h-100">
                                    <div class="product_img">
                                        <img src="/images/pro3.png" alt="">
                                    </div>
                                    <div class="product_desc">
                                        <p class="product_name">Grante JUICYFOOD</p>
                                        <p class="product_price">3.00 <span class="azn"></span></p>
                                        <button class="add_to_basket"> @lang('В КОРЗИНУ')</button>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-6">
                            <div class="product_card">
                                <button class="wish_delete"></button>
                                <a href="#" class="full h-100">
                                    <div class="product_img">
                                        <img src="/images/pro4.png" alt="">
                                    </div>
                                    <div class="product_desc">
                                        <p class="product_name">Grante VITAQUA</p>
                                        <p class="product_price">3.00 <span class="azn"></span></p>
                                        <button class="add_to_basket"> @lang('В КОРЗИНУ')</button>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-6">
                            <div class="product_card">
                                <button class="wish_delete"></button>
                                <a href="#" class="full h-100">
                                    <div class="product_img">
                                        <img src="/images/pro1.png" alt="">
                                    </div>
                                    <div class="product_desc">
                                        <p class="product_name">Grante Клубника Варенье</p>
                                        <p class="product_price">3.00 <span class="azn"></span></p>
                                        <button class="add_to_basket"> @lang('В КОРЗИНУ')</button>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-6">
                            <div class="product_card">
                                <button class="wish_delete"></button>
                                <a href="#" class="full h-100">
                                    <div class="product_img">
                                        <img src="/images/pro2.png" alt="">
                                    </div>
                                    <div class="product_desc">
                                        <p class="product_name">Grante VITAQUA</p>
                                        <p class="product_price">3.00 <span class="azn"></span></p>
                                        <button class="add_to_basket"> @lang('В КОРЗИНУ')</button>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-6">
                            <div class="product_card">
                                <button class="wish_delete"></button>
                                <a href="#" class="full h-100">
                                    <div class="product_img">
                                        <img src="/images/pro3.png" alt="">
                                    </div>
                                    <div class="product_desc">
                                        <p class="product_name">Grante JUICYFOOD</p>
                                        <p class="product_price">3.00 <span class="azn"></span></p>
                                        <button class="add_to_basket"> @lang('В КОРЗИНУ')</button>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-6">
                            <div class="product_card">
                                <button class="wish_delete"></button>
                                <a href="#" class="full h-100">
                                    <div class="product_img">
                                        <img src="/images/pro4.png" alt="">
                                    </div>
                                    <div class="product_desc">
                                        <p class="product_name">Grante VITAQUA</p>
                                        <p class="product_price">3.00 <span class="azn"></span></p>
                                        <button class="add_to_basket"> @lang('В КОРЗИНУ')</button>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
</main>

@include('layouts.footer')