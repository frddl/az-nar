@include('layouts.header')

<section class="products_section full">
    <div class="container">
        <!-- mobile breadcrumb-->
        <div class="mobile_breadcrumb">
            <ul>
                <li>
                    <a href="/">@lang('Главная') </a>
                </li>
                <li>
                    <a href="#">@lang('Вся продукция')</a>
                </li>
            </ul>
        </div>
        <!-- mobile breadcrumb end-->
        <div class="products_container">
            <div class="products_container_left">
                @include('layouts.main_banner_cats')
            </div>
            <div class="products_container_right">
                <!-- pro right tab links-->
                <div class="pro_right_tablinks">
                    <a href="#tab1" class="active">@lang('ВСЕ')</a>
                    @foreach($category->subCategories as $sub)
                        <a href="{{route('product.allBySubCat', [$category->id, $sub->id])}}">{{$sub->name}}</a>
                    @endforeach
                </div>
                <!-- pro right tab links end-->
                <!-- products cats tabs-->
                <div class="products_tabs_container full">
                    <!-- tab 1-->
                    <div class="product_cat_tab full active" id="tab1">
                        <div class="row">
                            @foreach($products as $p)
                                <div class="col-xl-4 col-lg-6 col-md-6 col-6">
                                    <div class="product_card">
                                        @auth()
                                        <span class="product_like" data-data_id="{{$p->id}}">
                                            <img src="/images/not_liked.svg" class="not_liked" alt="">
                                            <img src="/images/liked.svg" class="liked_icon" alt="">
                                        </span>
                                        @endauth
                                        <a href="{{route('product.detail',$p->id)}}" class="full h-100">
                                            <div class="product_img">
                                                <img src="{{$p->getFirstMediaUrl('main')}}" alt="">
                                            </div>
                                            <div class="product_desc">
                                                <p class="product_name">{{$p->name}}</p>
                                                <p class="product_price">{{$p->price}} <span class="azn"></span></p>
                                                <form action="{{route('product.addToCart')}}" method="post">
                                                    @csrf
                                                    <button class="add_to_basket"> @lang('В КОРЗИНУ')</button>
                                                    <input type="hidden" name="productId" value="{{$p->id}}">
                                                </form>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <!--tab 1 end-->
                    <!-- tab 2-->
                  {{--  <div class="product_cat_tab full " id="tab2">
                        <div class="row">
                            <div class="col-xl-4 col-lg-6 col-md-6 col-6">
                                <div class="product_card">
                                    <span class="product_like">
                                        <img src="/images/not_liked.svg" class="not_liked" alt="">
                                        <img src="/images/liked.svg" class="liked_icon" alt="">
                                    </span>
                                    <a href="#" class="full h-100">
                                        <div class="product_img">
                                            <img src="/images/pro1.png" alt="">
                                        </div>
                                        <div class="product_desc">
                                            <p class="product_name">Grante Клубника Варенье</p>
                                            <p class="product_price">3.00 <span class="azn"></span></p>
                                            <button class="add_to_basket"> В КОРЗИНУ</button>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-6 col-md-6 col-6">
                                <div class="product_card">
                                    <span class="product_like">
                                        <img src="/images/not_liked.svg" class="not_liked" alt="">
                                        <img src="/images/liked.svg" class="liked_icon" alt="">
                                    </span>
                                    <a href="#" class="full h-100">
                                        <div class="product_img">
                                            <img src="/images/pro2.png" alt="">
                                        </div>
                                        <div class="product_desc">
                                            <p class="product_name">Grante VITAQUA</p>
                                            <p class="product_price">3.00 <span class="azn"></span></p>
                                            <button class="add_to_basket"> В КОРЗИНУ</button>
                                        </div>
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!--tab 2 end-->
                    <!-- tab 3-->
                    <div class="product_cat_tab full " id="tab3">
                        <div class="row">
                            <div class="col-xl-4 col-lg-6 col-md-6 col-6">
                                <div class="product_card">
                                    <span class="product_like">
                                        <img src="/images/not_liked.svg" class="not_liked" alt="">
                                        <img src="/images/liked.svg" class="liked_icon" alt="">
                                    </span>
                                    <a href="#" class="full h-100">
                                        <div class="product_img">
                                            <img src="/images/pro1.png" alt="">
                                        </div>
                                        <div class="product_desc">
                                            <p class="product_name">Grante Клубника Варенье</p>
                                            <p class="product_price">3.00 <span class="azn"></span></p>
                                            <button class="add_to_basket"> В КОРЗИНУ</button>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-6 col-md-6 col-6">
                                <div class="product_card">
                                    <span class="product_like">
                                        <img src="/images/not_liked.svg" class="not_liked" alt="">
                                        <img src="/images/liked.svg" class="liked_icon" alt="">
                                    </span>
                                    <a href="#" class="full h-100">
                                        <div class="product_img">
                                            <img src="/images/pro2.png" alt="">
                                        </div>
                                        <div class="product_desc">
                                            <p class="product_name">Grante VITAQUA</p>
                                            <p class="product_price">3.00 <span class="azn"></span></p>
                                            <button class="add_to_basket"> В КОРЗИНУ</button>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-6 col-md-6 col-6">
                                <div class="product_card">
                                    <span class="product_like">
                                        <img src="/images/not_liked.svg" class="not_liked" alt="">
                                        <img src="/images/liked.svg" class="liked_icon" alt="">
                                    </span>
                                    <a href="#" class="full h-100">
                                        <div class="product_img">
                                            <img src="/images/pro3.png" alt="">
                                        </div>
                                        <div class="product_desc">
                                            <p class="product_name">Grante JUICYFOOD</p>
                                            <p class="product_price">3.00 <span class="azn"></span></p>
                                            <button class="add_to_basket"> В КОРЗИНУ</button>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-6 col-md-6 col-6">
                                <div class="product_card">
                                    <span class="product_like">
                                        <img src="/images/not_liked.svg" class="not_liked" alt="">
                                        <img src="/images/liked.svg" class="liked_icon" alt="">
                                    </span>
                                    <a href="#" class="full h-100">
                                        <div class="product_img">
                                            <img src="/images/pro4.png" alt="">
                                        </div>
                                        <div class="product_desc">
                                            <p class="product_name">Grante VITAQUA</p>
                                            <p class="product_price">3.00 <span class="azn"></span></p>
                                            <button class="add_to_basket"> В КОРЗИНУ</button>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-6 col-md-6 col-6">
                                <div class="product_card">
                                    <span class="product_like">
                                        <img src="/images/not_liked.svg" class="not_liked" alt="">
                                        <img src="/images/liked.svg" class="liked_icon" alt="">
                                    </span>
                                    <a href="#" class="full h-100">
                                        <div class="product_img">
                                            <img src="/images/pro2.png" alt="">
                                        </div>
                                        <div class="product_desc">
                                            <p class="product_name">Grante VITAQUA</p>
                                            <p class="product_price">3.00 <span class="azn"></span></p>
                                            <button class="add_to_basket"> В КОРЗИНУ</button>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-6 col-md-6 col-6">
                                <div class="product_card">
                                    <span class="product_like">
                                        <img src="/images/not_liked.svg" class="not_liked" alt="">
                                        <img src="/images/liked.svg" class="liked_icon" alt="">
                                    </span>
                                    <a href="#" class="full h-100">
                                        <div class="product_img">
                                            <img src="/images/pro3.png" alt="">
                                        </div>
                                        <div class="product_desc">
                                            <p class="product_name">Grante JUICYFOOD</p>
                                            <p class="product_price">3.00 <span class="azn"></span></p>
                                            <button class="add_to_basket"> В КОРЗИНУ</button>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--tab 3 end-->
                    <!-- tab 4-->
                    <div class="product_cat_tab full " id="tab4">
                        <div class="row">
                            <div class="col-xl-4 col-lg-6 col-md-6 col-6">
                                <div class="product_card">
                                    <span class="product_like">
                                        <img src="/images/not_liked.svg" class="not_liked" alt="">
                                        <img src="/images/liked.svg" class="liked_icon" alt="">
                                    </span>
                                    <a href="#" class="full h-100">
                                        <div class="product_img">
                                            <img src="/images/pro1.png" alt="">
                                        </div>
                                        <div class="product_desc">
                                            <p class="product_name">Grante Клубника Варенье</p>
                                            <p class="product_price">3.00 <span class="azn"></span></p>
                                            <button class="add_to_basket"> В КОРЗИНУ</button>
                                        </div>
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!--tab 4 end-->--}}
                </div>
                <!-- products cats tabs end-->
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

@include('layouts.footer')