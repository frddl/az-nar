@include('layouts.header')
<section class="articles_section full">
    <div class="container">
        <!-- mobile breadcrumb-->
        <div class="mobile_breadcrumb">
            <ul>
                <li>
                    <a href="/">@lang('Главная')</a>
                </li>
                <li>
                    <a href="#">@lang('Статьи')</a>
                </li>

            </ul>
        </div>
        <!-- mobile breadcrumb end-->
        <div class="articles_container full">
            <div class="section_title mobile_title full">
                <h2>@lang('Статьи')</h2>
            </div>
            <div class="articles_list full">
                <div class="row">
                    <!---->
                    @foreach($articles as $a)
                        <div class="col-xl-6 col-lg-6 col-md-12">
                        <div class="article_card full">
                            <div class="article_card_img">
                                <img src="{{$a->getFirstMediaUrl('main')}}" alt="">
                            </div>
                            <div class="article_card_desc">
                                <h4>{{$a->name}}</h4>
                                <p>{{$a->title}}</p>
                                <div class="article_more">
                                    <a href="{{route('articles.detail', $a->id)}}" class="ncb_more">@lang('ƏTRAFLI')</a>
                                </div>
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
                        <a href="?page={{($articles->currentPage() !=1)? $articles->lastPage()-1: 1}}"></a>
                    </li>
                    @for($i = 1; $i <= $articles->lastPage(); $i++)
                        <li class="{{($articles->currentPage() == $i) ? "active" : ""}}">
                            <a href="?page={{$i}}">{{$i}}</a>
                        </li>
                    @endfor
                    <li class="page_next">
                        <a href="?page={{($articles->currentPage() < $articles->lastPage())? $articles->currentPage()+1: $articles->lastPage()}}"></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

@include('layouts.footer')