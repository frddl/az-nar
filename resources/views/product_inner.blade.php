@include('layouts.header')

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
                        <a href="#">@lang('Подробно о продукте')</a>
                    </li>
                </ul>
            </div>
            <!-- mobile breadcrumb end-->
            <div class="section_title full">
                <h2>@lang('ПОДРОБНО О ПРОДУКТЕ')</h2>
            </div>

            <div class="basket_cards">
                <div class="basket_card">
                    <div class="basket_card_left">
                        @auth()
                            <span class="product_like {{$product->is_wished ? 'liked' : ''}}" data-data_id="{{$product->id}}">
                              <img src="/images/not_liked.svg" class="not_liked" alt="">
                              <img src="/images/liked.svg" class="liked_icon" alt="">
                            </span>
                        @endauth
                        <img src="{{($product->sale) ? $product->sale->getFirstMediaUrl('main') : $product->getFirstMediaUrl('main')}}" alt="">
                    </div>
                    <div class="basket_card_right">
                        <h4 class="b_productname">{{$product->name}}</h4>
                        <p class="basket_product_desc">{!! $product->text !!}</p>
                        <form action="{{route('product.addToCart')}}" method="post">
                            @csrf
                            <div class="basket_bottom_buttons">
                                <div>
                                    <p>@lang('Цена'):</p>
                                    <div class="basket_pro_price">
                                        <span class="bpp_val" id="product_price">{{$product->sale ? $product->sale->new_price : $product->price}}</span>
                                        <span class="azn"></span>
                                    </div>
                                </div>
                                <div>
                                    <p>@lang('Количество'):</p>
                                    <div class="product_inner_counter">
                                        <div class="mehsul_counter">
                                            <button class="num_counter numeric_down"></button>
                                            <input type="number" name="count" placeholder="" class="prs_input wizard-required numeric_inp numeric" min="1" max="100" value="1">
                                            <button class="num_counter numeric_up"></button>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <p>@lang('Итого'):</p>
                                    <div class="basket_total_price">
                                        <span id="product_total_price" class="bpt_val"></span>
                                        <span class="azn"></span>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="productId" value="{{$product->id}}">
                            <button class="pro_add_to_basket">@lang('В КОРЗИНУ') </button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="product_reviews_container full">
                <div class="section_title full">
                    <h2>@lang('ОТЗЫВЫ О ПРОДУКТЕ')</h2>
                </div>

                <div class="prooducts_inner_review_list full">
                    @foreach($product->reviews as $c)
                        <div class="pro_inner_review full">
                        <p class="pi_rev_name">{{$c->user->name}}</p>
                        <div class="pi_rev_date_and_stars">
                            <ul class="rating_stars">
                                @for($i = 1; $i <=5; $i++)
                                    @if($c->rating >= $i)
                                        <li class="active"></li>
                                    @else
                                        <li></li>
                                    @endif
                                @endfor
                            </ul>
                            <p>{{$c->created_at->format('d-m-Y')}}</p>
                        </div>
                        <div class="pi_rev_desc">
                            <p>{{$c->text}}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
                @if($product->reviews->count() > 0)
                <div class="show_more_reviews full">
                    <a href="">
                        <button>@lang('Смотреть все') ({{$product->reviews->count()}})</button>
                    </a>
                </div>
                @endif
            </div>
            <!-- add preview-->
            @auth()
                <div class="add_preview_container full">
                <h4>@lang('Добавить отзыв')</h4>
                <form action="{{route('product.review', $product->id)}}" class="full" method="post">
                    @csrf
                    <textarea class="full" name="text" placeholder="@lang('Текст')"></textarea>
                    @error('text')
                        <div class="alert alert-danger">
                            <p class="text-center">{{$message}}</p>
                        </div>
                    @enderror
                    <div class="add_preview full">
                        <div class="ap_rate">
                            <ul class="rating_stars">
                                <li class=""></li>
                                <li class=""></li>
                                <li class=""></li>
                                <li class=""></li>
                                <li></li>
                            </ul>
                            <p>@lang('Оцените прежде чем оставлять отзыв')</p>
                        </div>
                        <button type="submit" id="send_review">@lang('Опубликовать')</button>
                        <input type="hidden" id="rating" name="rating" value="0">
                    </div>
                </form>
            </div>
            @endauth
            <!-- add preview end-->
        </div>
    </div>
</section>

<section class="similar_products full">
    <div class="container">
        <div class="similar_products_container">
            <div class="section_title full">
                <h2>@lang('ПОХОЖИЕ ПРОДУКТЫ')</h2>
            </div>
            <div class="new_product_list">
                <!---->
                @foreach($similarProducts as $s)
                    <div class="n_product_card">
                        <div class="product_card">
                            @auth()
                                <span class="product_like" data-data_id="{{$s->id}}">
                                    <img src="/images/not_liked.svg" class="not_liked" alt="">
                                    <img src="/images/liked.svg" class="liked_icon" alt="">
                                </span>
                            @endauth
                            <a href="{{route('product.detail', $s->id)}}" class="full h-100">
                                <div class="product_img">
                                    <img src="{{$s->getFirstMediaUrl('main')}}" alt="">
                                </div>
                                <div class="product_desc">
                                    <p class="product_name">{{$s->name}}</p>
                                    @if($s->sale)
                                        <div class="sale_price_and_discound">
                                            <p class="discount_price">{{$s->price}}<span class="azn"></span></p>
                                            <p class="product_price">{{$s->sale->new_price}} <span class="azn"></span></p>
                                        </div>
                                    @else
                                        <p class="product_price">{{$s->price}} <span class="azn"></span></p>
                                    @endif
                                    <form action="{{route('product.addToCart')}}" method="post">
                                        @csrf
                                        <button class="add_to_basket">@lang('В КОРЗИНУ') </button>
                                        <input type="hidden" name="productId" value="{{$s->id}}">
                                    </form>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<script>
    $(document).ready(function() {
        $('.prooducts_inner_review_list .pro_inner_review').hide();
        $('.prooducts_inner_review_list .pro_inner_review:lt(4)').show();
        $('.show_more_reviews button').click(function() {
            $('.prooducts_inner_review_list .pro_inner_review:not(:visible)').fadeIn(500);
            $('.show_more_reviews').hide();
            return false;
        });
    });

    $('.rating_stars li').click(function() {
        var bu = $(this);
        bu.addClass('active');
        $(bu).prevAll().addClass('active');
        $(bu).nextAll().removeClass('active');
        var starCount = $(this).parent().find('.active').length;
        $('#rating').val(starCount);

    })

    $("input[name = 'count']").change(function () {
        $('#product_total_price').html(Number($("input[name = 'count']").val() * $('#product_price').html()).toFixed(2))
    })
</script>

@include('layouts.footer')