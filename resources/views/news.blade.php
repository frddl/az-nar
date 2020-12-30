@include('layouts.header')
<section class="news_section full">
    <div class="container">
        <!-- mobile breadcrumb-->
        <div class="mobile_breadcrumb">
            <ul>
                <li>
                    <a href="/">@lang('Главная') </a>
                </li>
                <li>
                    <a href="#">@lang('Новости')</a>
                </li>
            </ul>
        </div>
        <!-- mobile breadcrumb end-->
        <div class="news_container full">
            <div class="section_title mobile_title full">
                <h2>@lang('Новости')</h2>
            </div>
            <div class="news_list full">
                <div class="row">
                    <!---->
                    @foreach($news as $new)
                        <div class="col-xl-3 col-lg-3 col-md-6">
                            <div class="news_card">
                                <div class="news_card_img">
                                    <img src="{{$new->getFirstMediaUrl('main')}}" alt="">
                                </div>
                                <div class="news_card_desc">
                                    <h4>{{$new->name}}</h4>
                                    <p>{{$new->title}}</p>
                                    <a href="{{route('news.detail', $new->id)}}">
                                        <div class="news_card_bottom">
                                            <span class="ncb_more">@lang('ƏTRAFLI')</span>
                                            <span class="ncb_time">{{$new->created_at->format('d-m-Y')}}</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <!---->
                </div>
            </div>
            <div class="pagination full">
                <ul class="full">
                    <li class="page_prev">
                        <a href="?page={{($news->currentPage() !=1)? $news->lastPage()-1: 1}}"></a>
                    </li>
                    @for($i = 1; $i <= $news->lastPage(); $i++)
                        <li class="{{($news->currentPage() == $i) ? "active" : ""}}">
                            <a href="?page={{$i}}">{{$i}}</a>
                        </li>
                    @endfor
                    <li class="page_next">
                        <a href="?page={{($news->currentPage() < $news->lastPage())? $news->currentPage()+1: $news->lastPage()}}"></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

@include('layouts.footer')