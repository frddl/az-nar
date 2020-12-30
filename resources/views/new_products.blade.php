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
                <h2>@lang('Новинки')</h2>
                <div class="title_select_container">
                    <div class="title_select">
                        <select class="chosen-select">
                            @foreach($categories as $c)
                                <option value="{{$c->id}}">{{$c->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="wishlist_cards new_products_cards full">
                <div class="row">
                    @foreach($products as $product)
                        <div class="col-xl-3 col-lg-4 col-md-6 col-6">
                            <div class="product_card">
                                @auth()
                                    <span class="product_like {{$product->is_wished ? 'liked' : ''}}" data-data_id="{{$product->id}}">
                                      <img src="/images/not_liked.svg" class="not_liked" alt="">
                                      <img src="/images/liked.svg" class="liked_icon" alt="">
                                    </span>
                                @endauth
                                <a href="{{route('product.detail', $product->id)}}" class="full h-100">
                                    <div class="product_img">
                                        <img src="{{$product->getFirstMediaUrl('main')}}" alt="">
                                    </div>
                                    <div class="product_desc">
                                        <p class="product_name">{{$product->name}}</p>
                                        <p class="product_price">{{$product->price}} <span class="azn"></span></p>
                                        <form action="{{route('product.addToCart')}}" method="post">
                                            @csrf
                                            <button type="submit" class="add_to_basket">@lang('В КОРЗИНУ') </button>
                                            <input type="hidden" name="productId" value="{{$product->id}}">
                                        </form>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="pagination full my-3">
            <ul class="full">
                <li class="page_prev">
                    <a href="?page={{($products->currentPage() !=1)? $products->lastPage()-1: 1}}"></a>
                </li>
                @for($i = 1; $i <= $products->lastPage(); $i++)
                    <li class="{{($products->currentPage() == $i) ? "active" : ""}}">
                        <a href="?page={{$i}}">{{$i}}</a>
                    </li>
                @endfor
                <li class="page_next">
                    <a href="?page={{($products->currentPage() < $products->lastPage())? $products->currentPage()+1: $products->lastPage()}}"></a>
                </li>
            </ul>
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