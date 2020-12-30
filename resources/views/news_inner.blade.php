@include('layouts.header')
<section class="news_inner_section full">
    <div class="container">
        <!-- mobile breadcrumb-->
        <div class="mobile_breadcrumb">
            <ul>
                <li>
                    <a href="/">@lang('Главная')</a>
                </li>
                <li>
                    <a href="{{route('news')}}">@lang('Новости') </a>
                </li>
                <li>
                    <a href="#">@lang('Подробно')</a>
                </li>
            </ul>
        </div>
        <!-- mobile breadcrumb end-->
        <div class="news_inner_container full">
            <div class="news_inner_content full">
                <div class="news_inner_title">
                    <h2>{{$news->name}}</h2>
                    <span class="ncb_time">{{$news->created_at->format('d-m-Y')}}</span>
                </div>
                <div class="news_inner_text_content full">
                    <p><img src="{{$news->getFirstMediaUrl('main')}}" alt="">
                        {!! $news->text !!}
                </div>
            </div>
            <!---->
            <div class="news_inner_recommended standart_slider full">
                <div class="section_title left_title full">
                    <h2>@lang('ДРУГИЕ НОВОСТИ')</h2>
                </div>
                <div class="owl-carousel full">
                    @foreach($others as $other)
                        <div class="item">
                        <div class="news_card">
                            <a href="{{route('news.detail',$other->id)}}">
                                <div class="news_card_img">
                                    <img src="{{$other->getFirstMediaUrl('main')}}" alt="">
                                </div>
                                <div class="news_card_desc">
                                    <h4>{{$other->name}}</h4>
                                    <p>{{$other->title}}</p>
                                    <div class="news_card_bottom">
                                        <span class="ncb_more">@lang('ƏTRAFLI')</span>
                                        <span class="ncb_time">{{$other->created_at->format('d-m-Y')}}</span>
                                    </div>
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
@include('layouts.footer')