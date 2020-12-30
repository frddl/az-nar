@include('layouts.header')

<!-- banner section-->
<section class="main_banner_section full">
  <div class="container">
    <div class="main_banner_container full">
      <!-- banner cats-->
     @include('layouts.main_banner_cats')
      <!-- banner cats-->
      <div class="main_slider_and_right">
        <!-- banner slider-->
        <div class="main_banner_slider">
          <div class="owl-carousel">
            @foreach($sliders as $s)
            <div class="item">
              <img src="{{asset('images/main_slider.png')}}" alt="">
              <div class="banner_slider_over">
                  <div class="banner_over_desc">
                  {!! $s->title !!}
                  <a href="{{$s->link}}">@lang('КУПИТЬ СЕЙЧАС')</a>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
        <!-- banner slider end-->
        <!-- banner right cards-->
        <div class="banner_right_cards">
          @foreach($discount_banner as $q)
          <div class="brc_card brc_card{{$q->id}}" style="background-image: url({{$q->getFirstMediaUrl('main')}});">
            <div class="brc_desc">
              {{ $q->text }}
              <a href="{{\Illuminate\Support\Str::of($q->link)->startsWith('http://' || 'https://') ? $q->link : 'http://'.$q->link}}">{{$q->button_name}}</a>
            </div>
          </div>
          @endforeach
        </div>
        <!-- banner right cards end-->
      </div>
    </div>
  </div>
</section>
<!-- banner section end-->
<!-- new products-->
<section class="new_product_section full">
  <div class="container">
    <div class="new_products_container full">
      <div class="section_title">
        <h2>@lang('НОВИНКИ')</h2>
      </div>
      <div class="new_product_list">
        <!---->
        @foreach($new_products as $p)
          <div class="n_product_card">
          <div class="product_card">
            @auth()
            <span class="product_like {{$p->is_wished ? 'liked' : ''}}" data-data_id="{{$p->id}}">
              <img src="/images/not_liked.svg" class="not_liked" alt="">
              <img src="/images/liked.svg" class="liked_icon" alt="">
            </span>
            @endauth
            <a href="{{route('product.detail', $p->id)}}" class="full h-100">
              <div class="product_img">
                <img src="{{$p->getFirstMediaUrl('main')}}" alt="">
              </div>
              <div class="product_desc">
                <p class="product_name">{{$p->name}}</p>
                <p class="product_price">{{(float)$p->price}} <span class="azn"></span></p>
                <form action="{{route('product.addToCart')}}" method="post">
                  @csrf
                  <button type="submit" class="add_to_basket">@lang('В КОРЗИНУ') </button>
                  <input type="hidden" name="productId" value="{{$p->id}}">
                </form>
              </div>
            </a>
          </div>
        </div>
        @endforeach


      </div>
      <div class="show_more_link full">
        <a href="{{route('product.new')}}">@lang('Смотреть все')</a>
      </div>
    </div>
  </div>
</section>
<!-- new products end-->
<!-- sale section-->
<section class="main_sale_section  full">
  <div class="container">
    <div class="main_sale_container standart_slider full">
      <div class="section_title full">
        <h2>@lang('РАСПРОДАЖА')</h2>
        <a href="{{route('sale.all')}}">@lang('Смотреть все')</a>
      </div>
      <div class="owl-carousel full">
        @foreach($sales as $sale)
          <div class="item">
          <div class="product_card">
            @auth()
              <span class="product_like {{$p->is_wished ? 'liked' : ''}}" data-data_id="{{$p->id}}">
              <img src="/images/not_liked.svg" class="not_liked" alt="">
              <img src="/images/liked.svg" class="liked_icon" alt="">
            </span>
            @endauth
            <a href="{{route('product.detail', $sale->product->id)}}" class="full h-100">
              <div class="product_img">
                <img src="{{$sale->getFirstMediaUrl('main') ? $sale->getFirstMediaUrl('main') : $sale->product->getFirstMediaUrl('main')}}" alt="">
              </div>
              <div class="product_desc">
                <p class="product_name">{{$sale->product->name}}</p>
                <div class="sale_price_and_discound">
                  <p class="discount_price">{{$sale->product->price}}<span class="azn"></span></p>
                  <p class="product_price">{{$sale->new_price}} <span class="azn"></span></p>
                </div>
                <form action="{{route('product.addToCart')}}" method="post">
                  @csrf
                  <button type="submit" class="add_to_basket">@lang('В КОРЗИНУ') </button>
                  <input type="hidden" name="productId" value="{{$sale->product->id}}">
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
<!-- sale section-->
<!-- aksiya section-->
<section class="main_sale_section aksiya_section full">
  <div class="container">
    <div class="main_sale_container standart_slider full">
      <div class="section_title full">
        <h2>@lang('АКЦИИ')</h2>
        <a href="{{route('share.all')}}">@lang('Смотреть все')</a>
      </div>
      <div class="owl-carousel full">
        @foreach($shares as $s)
          <div class="item">
          <div class="product_card">
            <a href="{{route('share.detail', $s->id)}}" class="full h-100">
              <div class="product_img">
                <img src="{{$s->getFirstMediaUrl('main')}}" alt="">
              </div>
              <div class="product_desc">
                <p class="product_name">{{$s->name}}</p>
                <p class="product_price">{{$s->price}} <span class="azn"></span></p>
                  <form action="{{route('share.addToCart')}}" method="post">
                      @csrf
                      <input type="hidden" name="shareId" value="{{$s->id}}">
                      <button class="add_to_basket"> @lang('В КОРЗИНУ')</button>
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
<!-- aksiya section-->
<!-- new pro banner-->
<section class="new_pro_banner full">
  <div class="container">
    <div class="new_pro_banner_container full" style="background-image: url({{$new_item_banner->getFirstMediaUrl('main')}});">
      <div class="npb_cont">
        {{$new_item_banner->text}}
        <a href="{{\Illuminate\Support\Str::of($new_item_banner->link)->startsWith('http://' || 'https://') ? $new_item_banner->link : 'http://'.$new_item_banner->link}}">{{$new_item_banner->button_name}}</a>
      </div>
    </div>
  </div>
</section>
<!-- new pro banner end-->
<!-- main news section-->
<!-- main news section-->

<section class="main_news_section full">
  <div class="container">
    <div class="main_news_container standart_slider full">
      <div class="section_title full">
        <h2>@lang('НОВОСТИ')</h2>
        <a href="{{route('news')}}">@lang('Смотреть все')</a>
      </div>
      <div class="owl-carousel full">
        @foreach($news as $n)
          <div class="item">
          <div class="news_card">
            <a href="{{route('news.detail', $n->id)}}">
              <div class="news_card_img">
                <img src="{{$n->getFirstMediaUrl('main')}}" alt="">
              </div>
              <div class="news_card_desc">
                <h4>{{$n->name}}</h4>
                <p>{{$n->title}}</p>
                <div class="news_card_bottom">
                  <span class="ncb_more">@lang('ƏTRAFLI')</span>
                  <span class="ncb_time">{{$n->created_at->format('d-m-Y')}}</span>
                </div>
              </div>
            </a>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</section>
<!-- main news section-->

<!--main reviews section-->
<section class="main_reviews_section full">
  <div class="container">
    <div class="main_reviews_container standart_slider full">
      <div class="section_title texted_title full">
        <h2>@lang('ОТЗЫВЫ')</h2>
        <p>@lang('Что говорят о нас наши клиенты')!</p>
        <a href="{{route('reviews')}}">@lang('Смотреть все')</a>
      </div>

      <div class="owl-carousel full reviews_slider">
        <!---->
        @foreach($reviews as $r)
          <div class="item">
          <div class="review_box">
            <p class="review_time">{{$r->created_at->format('d-m-Y')}}</p>
            <ul class="rating_stars">
              <li class="active"></li>
              <li class="active"></li>
              <li class="active"></li>
              <li class="active"></li>
              <li></li>
            </ul>

            <p class="review_text">{{$r->text}}</p>
            <p class="review_author">{{$r->user->name}}</p>
          </div>
        </div>
        @endforeach
      </div>

      <div class="add_review_cont d-flex j-center full">
        <a href="{{route('reviews')}}">@lang('Добавить отзыв') <span>+</span></a>
      </div>
    </div>
  </div>
</section>
<!--main reviews section-->

<!-- main contact section-->
<section class="main_contact_section full">
  <div class="container">
    <div class="main_contact_container full">
      <div class="section_title texted_title full">
        <h2>@lang('КОНТАКТЫ')</h2>
      </div>
      <div class="map full" id="map">

      </div>

      <div class="contact_section_contact_box">
        <div class="cscb_left">
          <form action="" class="full">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <input type="text" placeholder="Имя" class="standart_input">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <input type="text" placeholder="Фамилия" class="standart_input">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <input type="tel" placeholder="Мобильный номер" class="standart_input">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <input type="email" placeholder="Email" class="standart_input">
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <textarea placeholder="Текст" class="standart_input"></textarea>
                </div>
              </div>
              <div class="col-md-12 contact_submit">
                <button type="submit">@lang('Göndər')</button>
              </div>
            </div>
          </form>
        </div>
        <div class="cscb_right">
          <h4>@lang('Связаться с нами')</h4>
          <ul class="main_contact_list full">
            <li class="adddress">
              <p>
                <img src="/images/pin.svg" alt="">
                120 Natavan street, Geokchai, AZ2300, Azerbaijan
              </p>
            </li>
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
          </ul>
          <div class="social_icons full">
            <a href="#" class="fb" target="_blank"></a>
            <a href="#" class="vk" target="_blank"></a>
            <a href="#" class="insta" target="_blank"></a>
            <a href="#" class="linked" target="_blank"></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- main contact section-->

<script>
  function myMap() {
    var mapProp = {
      center: new google.maps.LatLng(40.394871, 49.850675),
      zoom: 12,
      panControl: false,
      zoomControl: false,
      mapTypeControl: false,
      scaleControl: false,
      streetViewControl: false,
      overviewMapControl: false,
      rotateControl: false
    };
    var map = new google.maps.Map(document.getElementById("map"), mapProp);

  }
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCCZWy2YH-P1SUd4wbCz4gteGoX3aXSd1c&callback=myMap"></script>
@include('layouts.footer')