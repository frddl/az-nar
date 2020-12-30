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
                    <h2>@lang('ОФОРМЛЕНИЕ ПОКУПКИ')</h2>
                </div>

                <div class="pr_reg_form_container full">
                    <div class="pr_reg_formbox">
                        <form action="{{route('transaction.pay')}}" class="full" method="post">
                            @csrf
                            <div class="reg_form_top full">
                                <div class="reg_form_left">
                                    <h4 class="reg_form_title">@lang('Личные данные')</h4>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="text" name="name" value="@auth(){{\Illuminate\Support\Facades\Auth::user()->name." ".\Illuminate\Support\Facades\Auth::user()->surname}}@endauth {{old('name')}}" class="floating-input" placeholder=" ">
                                                <label class="animate_label">@lang('Ф.И.О')</label>
                                                @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="email" name="email" value="{{\Illuminate\Support\Facades\Auth::user()->email ?? old('email')}}" class="floating-input" placeholder=" ">
                                                <label class="animate_label">@lang('Email')</label>
                                                @error('email')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="tel" name="mob_phone" class="floating-input" placeholder="+994 - 50 - XXX- XX - XX" value="{{\Illuminate\Support\Facades\Auth::user()->phone ?? old('mob_phone')}}">
                                                <label class="animate_label">@lang('Мобильный номер')</label>
                                                @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="text" name="home_phone" class="floating-input" placeholder="+994 - 12 - XXX- XX - XX" value="{{old('home_phone')}}">
                                                <label class="animate_label">@lang('Городской номер')</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="reg_form_right">
                                    <h4 class="reg_form_title">@lang('Адрес доставки')</h4>
                                    <div class="row">
                                        <div class="col-md-12 duo_inp">
                                            @auth()
                                                <div class="form-group">
                                                    <select class="chosen-select" name="user_address">
                                                        @foreach(\Illuminate\Support\Facades\Auth::user()->addresses as $a)
                                                            <option value="{{$a->address}}">{{$a->address}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            @endauth
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <select class="chosen-select" name="city">
                                                            @foreach($cities as $c)
                                                                <option value="{{$c->id}}">{{$c->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="text" name="address" class="floating-input" placeholder="{{old('address')}}">
                                                        <label class="animate_label">@lang('Улица')</label>
                                                        @error('address')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 duo_inp">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="number" name="home_number" class="floating-input" placeholder=" ">
                                                        <label class="animate_label">@lang('Дом')</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="text" name="apartment_number" class="floating-input" placeholder=" ">
                                                        <label class="animate_label">@lang('Квартира / Офис')</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="text" name="comment" class="floating-input" placeholder=" ">
                                                <label class="animate_label">@lang('Коментарий')</label>
                                            </div>
                                        </div>
                                        {{--<div class="col-md-12">
                                            <div class="form-group">
                                                <a href="#" class="adress_select_map">@lang('Указать адрес на карте') <img src="/images/btn_pin.svg" alt=""> </a>
                                            </div>
                                        </div>--}}
                                    </div>
                                </div>
                            </div>
                            <!---->
                            <div class="reg_form_bottom full">
                                <div class="reg_form_left">
                                    <h4 class="reg_form_title">@lang('Время и дата доставки')</h4>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group date">
                                                <input type="text" name="date" class="floating-input  datepick" value="27.11.2020" placeholder=" ">
                                                <label class="animate_label">@lang('Дата доставки')</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="reg_form_right">
                                    <h4 class="reg_form_title">@lang('Способ оплаты')</h4>
                                    <div class="row">
                                        <div class="col-md-12 radio_inputs_cont">
                                            <div class="radio_inputs">
                                                <label class="checked">
                                                    <input type="radio" name="pay_type" checked value="cash">
                                                    <p>@lang('Наличными курьеру')</p>
                                                </label>
                                            </div>
                                            <div class="radio_inputs">
                                                <label>
                                                    <input type="radio" name="pay_type" value="cart">
                                                    <p>@lang('По карте на сайте')</p>
                                                </label>
                                            </div>
                                        </div>
                                        @error('address')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <!---->
                            <div class="pr_reg_submit full">
                                <div class="pr_reg_total_price">
                                    <p>@lang('итого'):</p>
                                    <span>{{$total}}
                                        <i class="azn"></i>
                                    </span>
                                </div>
                                <button type="submit">@lang('Подтвердить')</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    $('input:radio').change(
        function() {
            if ($(this).is(':checked')) {
                $('.radio_inputs label').removeClass('checked');
                $(this).parent().addClass('checked');
            }
        });
</script>
@include('layouts.footer')