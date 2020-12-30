@include('layouts.header')

<section class="purchase_registration_section full">
    <div class="container">
        <div class="pr_reg_container full">
            <!-- mobile breadcrumb-->
            <div class="mobile_breadcrumb">
                <ul>
                    <li>
                        <a href="/">@lang('Главная') </a>
                    </li>
                    <li>
                        <a href="{{route('basket')}}}">@lang('Корзина') </a>
                    </li>
                    <li>
                        <a href="#">@lang('Оформление покупки')</a>
                    </li>
                </ul>
            </div>
            <!-- mobile breadcrumb end-->
            <div class="pr_reg_box full">
                <div class="section_title">
                    <h2>@lang('Благодарим за покупку!')</h2>
                </div>

            </div>
        </div>
    </div>
</section>
@include('layouts.footer')