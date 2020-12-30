<!DOCTYPE html>
<html lang="az">

@include('layouts.header')
<!-- header end-->
<main class="main full" role="main">

    <section class="basket_section full">
        <div class="container">
            <div class="basket_container full">
                <!-- mobile breadcrumb-->
                <div class="mobile_breadcrumb">
                    <ul>
                        <li>
                            <a href="/">@lang('Главная') </a>
                        </li>
                        <li>
                            <a href="#">@lang('Корзина')</a>
                        </li>
                    </ul>
                </div>
                <!-- mobile breadcrumb end-->
                <div class="section_title full">
                    <h2>@lang('КОРЗИНА')</h2>
                </div>

                <div class="basket_page_container full">
                    <!---->
                    <div class="basket_page_left">
                        <div class="basket_cards">
                            @if(request()->session()->has('products'))
                                @foreach($products as $p)
                                    <div class="basket_card">
                                <div class="basket_card_left">
                                    <a href="{{route('product.removeCart', $p->id)}}">
                                        <span class="delete_basket"></span>
                                    </a>
                                    <img src="{{$p->getFirstMediaUrl('main')}}" alt="">
                                </div>
                                <div class="basket_card_right">
                                    <h4 class="b_productname">{{$p->name}}</h4>
                                    {!!$p->text!!}
                                    <div class="basket_bottom_buttons">
                                        <div>
                                            <p>@lang('Цена'):</p>
                                            <div class="basket_pro_price">
                                                <span class="bpp_val">{{$productCart[$p->id]['price']}}</span>
                                                <span class="azn"></span>
                                            </div>
                                        </div>
                                        <div>
                                            <p>@lang('Количество'):</p>
                                            <form class="update-form" action="{{route('product.addToCart', $p->id)}}" method="post">
                                                @csrf
                                                <div class="product_inner_counter">
                                                    <div class="mehsul_counter">
                                                        <button class="num_counter numeric_down"></button>
                                                        <input type="number" name="count" placeholder="" class="prs_input wizard-required numeric_inp numeric" min="0" max="100" value="{{$productCart[$p->id]['count']}}">
                                                        <input type="hidden" name="price" value="{{$productCart[$p->id]['price']}}">
                                                        <button class="num_counter numeric_up"></button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div>
                                            <p>@lang('Итого'):</p>
                                            <div class="basket_total_price">
                                                <span class="bpt_val">{{$productCart[$p->id]['count'] * $productCart[$p->id]['price']}}</span>
                                                <span class="azn"></span>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                                @endforeach
                            @endif

                            @if(request()->session()->has('shares'))
                                @foreach($shares as $p)
                                    <div class="basket_card">
                                        <div class="basket_card_left">
                                            <a href="{{route('share.removeCart', $p->id)}}" onclick="event.preventDefault(); document.getElementById('remove-share').submit();">
                                                <span class="delete_basket"></span>
                                            </a>
                                            <form id="remove-share" action="{{ route('share.removeCart',$p->id ) }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                            <img src="{{$p->getFirstMediaUrl('main')}}" alt="">
                                        </div>
                                        <div class="basket_card_right">
                                            <h4 class="b_productname">{{$p->name}}</h4>
                                            {!!$p->text!!}
                                            <div class="basket_bottom_buttons">
                                                <div>
                                                    <p>@lang('Цена'):</p>
                                                    <div class="basket_pro_price">
                                                        <span class="bpp_val">{{$shareCart[$p->id]['price']}}</span>
                                                        <span class="azn"></span>
                                                    </div>
                                                </div>
                                                <div>
                                                    <p>@lang('Количество'):</p>
                                                    <form class="update-form" action="{{route('share.addToCart', $p->id)}}" method="post">
                                                        @csrf
                                                        <div class="product_inner_counter">
                                                            <div class="mehsul_counter">
                                                                <button class="num_counter numeric_down"></button>
                                                                <input type="number" name="count" placeholder="" class="prs_input wizard-required numeric_inp numeric" min="0" max="100" value="{{$shareCart[$p->id]['count']}}">
                                                                <input type="hidden" name="price" value="{{$shareCart[$p->id]['price']}}">
                                                                <button class="num_counter numeric_up"></button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div>
                                                    <p>@lang('Итого'):</p>
                                                    <div class="basket_total_price">
                                                        <span class="bpt_val">{{$shareCart[$p->id]['count'] * $shareCart[$p->id]['price']}}</span>
                                                        <span class="azn"></span>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <!---->
                    <!---->
                    <div class="basket_page_right">
                        @if(request()->session()->has('products'))
                            <div class="basket_page_prices">
                                <table class="basket_right_table">
                                    <thead>
                                    <tr>
                                        <th>@lang('Продукт')</th>
                                        <th>@lang('кол-во')</th>
                                        <th>@lang('итого')</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($products as $p)
                                        <tr>
                                            <td>{{$p->name}}</td>
                                            <td>
                                               <span>{{$productCart[$p->id]['count']}}</span>
                                            </td>
                                            <td>
                                                <div class="table_azn"><span>{{$productCart[$p->id]['count'] * $productCart[$p->id]['price']}}</span><i><img src="/images/azn.svg" alt=""></i>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @foreach($shares as $p)
                                        <tr>
                                            <td>{{$p->name}}</td>
                                            <td>
                                                <span>{{$shareCart[$p->id]['count']}}</span>
                                            </td>
                                            <td>
                                                <div class="table_azn"><span>{{$shareCart[$p->id]['count'] * $shareCart[$p->id]['price']}}</span><i><img src="/images/azn.svg" alt=""></i>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="basket_right_total full">
                                    <p>@lang('итого'):</p>
                                    <div class="table_azn"><span>{{$total}}</span><i><img src="/images/azn.svg" alt=""></i>
                                    </div>
                                </div>
                                <a href="{{route('transaction.getForm')}}">
                                    <button class="basket_right_submit">@lang('Оформить Покупку')</button>
                                </a>
                        </div>
                        @endif
                    </div>
                    <!---->
                </div>
            </div>
        </div>
    </section>
    @include('layouts.footer')
