@include('layouts.header')

<section class="new_products_section full">
    <div class="container">
        <div class="new_products_page_container full">
            <!-- mobile breadcrumb-->
            <div class="mobile_breadcrumb">
                <ul>
                    <li>
                        <a href="/">@lang('Главная') </a>
                    </li>
                    <li>
                        <a href="#">@lang('Новинки')</a>
                    </li>
                </ul>
            </div>
            <!-- mobile breadcrumb end-->
            <div class="section_title full">
                <h2>@lang('РАСПРОДАЖА')</h2>
                <div class="title_select_container">
                    <div class="title_select">
                        <select class="chosen-select">
                            <option value="0">Соки</option>
                            <option value="1">Варенье</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="wishlist_cards new_products_cards full">
                <div class="row">
                    @foreach($sales as $sale)
                        <div class="col-xl-3 col-lg-4 col-md-6 col-6">
                            <div class="product_card">
                                @auth()
                                    <span class="product_like {{$sale->is_wished ? 'liked' : ''}}" data-data_id="{{$sale->id}}">
                                      <img src="/images/not_liked.svg" class="not_liked" alt="">
                                      <img src="/images/liked.svg" class="liked_icon" alt="">
                                    </span>
                                @endauth
                                <a href="{{route('product.detail',$sale->id)}}" class="full h-100">
                                    <div class="product_img">
                                        <img src="{{$sale->sale->getFirstMediaUrl('main') ? $sale->sale->getFirstMediaUrl('main') : $sale->getFirstMediaUrl('main')}}" alt="">
                                    </div>
                                    <div class="product_desc">
                                        <p class="product_name">{{$sale->name}}</p>
                                        <div class="sale_price_and_discound">
                                            <p class="discount_price">{{$sale->price}}<span class="azn"></span></p>
                                            <p class="product_price">{{$sale->sale->new_price}} <span class="azn"></span></p>
                                        </div>
                                        <form action="{{route('product.addToCart')}}" method="post">
                                            @csrf
                                            <button type="submit" class="add_to_basket">@lang('В КОРЗИНУ') </button>
                                            <input type="hidden" name="productId" value="{{$sale->id}}">
                                        </form>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<section class="new_pro_banner full">
    <div class="container">
        <div class="new_pro_banner_container mt-0 full" style="background-image: url(/images/new_banner.png);">
            <div class="npb_cont">
                <span>@lang('НОВИНКА')!</span>
                <h5>@lang('GRANTE TROPIC')</h5>
                <p>@lang('Без концентратов')</p>
                <a href="#">@lang('КУПИТЬ СЕЙЧАС')</a>
            </div>
        </div>
    </div>
</section>

@include('layouts.footer')