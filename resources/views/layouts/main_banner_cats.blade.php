<div class="main_banner_cats">
    <div class="mb_cats_heading">
        <img src="/images/list.svg" alt="">
        <h4>@lang('Вся продукция')</h4>
    </div>
    <div class="mb_cats">
        <ul class="full">
            @foreach($site_bar as $a)
                <li class="{{(request()->segment(3) == $a->id) ? "active" : ""}}">
                    <a href="{{route('product.allByCat',$a->id)}}">{{$a->name}}</a>
                </li>
            @endforeach
        </ul>
    </div>
</div>