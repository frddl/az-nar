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

    })

    $('#send_review').click(function () {
        var starCount = $('.rating_stars').find('.active').length;
        $('#rating').val(starCount);
    })

</script>


@include('layouts.footer')