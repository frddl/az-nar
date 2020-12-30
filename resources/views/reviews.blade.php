@include('layouts.header')
<section class="reviews_page_section full">
    <div class="container">
        <!-- mobile breadcrumb-->
        <div class="mobile_breadcrumb">
            <ul>
                <li>
                    <a href="/">@lang('Главная') </a>
                </li>
                <li>
                    <a href="#">@lang('ОТЗЫВЫ')</a>
                </li>
            </ul>
        </div>
        <!-- mobile breadcrumb end-->
        <div class="product_reviews_container full">
            <div class="section_title mobile_title texted_title full">
                <h2>@lang('ОТЗЫВЫ')</h2>
                <p>@lang('Что говорят о нас наши клиенты')!</p>
            </div>

            <div class="prooducts_inner_review_list review_page_list full">
                @foreach($reviews as $r)
                    <div class="pro_inner_review full" style="display: flex;">
                    <p class="pi_rev_name">{{$r->user->name}}</p>
                    <div class="pi_rev_date_and_stars">
                        <ul class="rating_stars">
                            @for($i = 1; $i <= 5; $i++)
                                @if($r->rating >= $i )
                                    <li class="active"></li>
                                @else
                                    <li></li>
                                @endif
                            @endfor
                        </ul>
                        <p>{{$r->created_at->format('d-m-Y')}}</p>
                    </div>
                    <div class="pi_rev_desc">
                        <p>{{$r->text}}</p>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="show_more_reviews full">
                <a href="{{route('reviews.all')}}">
                    <button>@lang('Смотреть все') ({{$reviewsCount}})</button>
                </a>
            </div>

        </div>
        @auth()
            <div class="add_preview_container full">
                <h4>@lang('Добавить отзыв')</h4>
                @if (session('success'))
                    <div class="alert alert-success">
                        <p>@lang('Благодорим за отзыв')</p>
                    </div>
                @endif
            <form action="{{route('reviews.add')}}" class="full" method="post">
                @csrf
                <textarea class="full" name="text" placeholder="@lang('Текст')"></textarea>
                @error('text')
                <div class="alert alert-danger">
                    <p>{{$message}}</p>
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
                        <p class="text-center">@lang('Оцените прежде чем оставлять отзыв')</p>
                    </div>
                    <button type="submit" id="send_review">@lang('Опубликовать')</button>
                    <input type="hidden" name="rating" id="rating" value="0">
                </div>
            </form>
        </div>
        @endauth
    </div>
</section>

<script>
    $(document).ready(function() {
        $('.prooducts_inner_review_list .pro_inner_review').hide();
        $('.prooducts_inner_review_list .pro_inner_review:lt(4)').show();
        /*$('.show_more_reviews button').click(function() {
            $('.prooducts_inner_review_list .pro_inner_review:not(:visible)').fadeIn(500);
            $('.show_more_reviews').hide();
            return false;
        });*/
    });

    $('.rating_stars li').click(function() {
        var bu = $(this);
        bu.addClass('active');
        $(bu).prevAll().addClass('active');
        $(bu).nextAll().removeClass('active');
        var starCount = $(this).parent().find('.active').length;
        $('#rating').val(starCount);

    })


</script>


@include('layouts.footer')