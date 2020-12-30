@include('layouts.header')

<section class="my_profile_section full">
    <div class="container">
        <!-- mobile breadcrumb-->
        <div class="mobile_breadcrumb">
            <ul>
                <li>
                    <a href="/">@lang('Главная') </a>
                </li>
                <li>
                    <a href="#">@lang('Личные данные')</a>
                </li>
            </ul>
        </div>
        <!-- mobile breadcrumb end-->
        <div class="my_profile_container full">

            <!-- tab links-->
            <div class="my_profile_tab_links">
                <a href="#personal_data" class="personal_data_link active"><i></i>@lang('ЛИЧНЫЕ ДАННЫЕ') </a>
                <a href="#my_shopping" class="my_shopping_link"><i></i>@lang('МОИ ПОКУПКИ')</a>
            </div>
            <!-- tab links end-->
            <!-- tabs-->
            <div class="my_profile_tabs full">
                <!-- tab1-->
                <div class="my_profile_tab active" id="personal_data">
                    <form action="{{route('user.update')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-12">
                                <div class="form-group edit_ico">
                                    <label>@lang('Имя')</label>
                                    <input type="text" name="name" value="{{$user->name}}">
                                    @error('name')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-12">
                                <div class="form-group edit_ico">
                                    <label>@lang('Дата рождения')</label>
                                    <input type="text" name="birthday" value="{{$user->birthday->format('d-m-Y')}}" data-toggle="datepicker">
                                    @error('birthday')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-12">
                                <div class="form-group edit_ico">
                                    <label>@lang('Фамилия')</label>
                                    <input type="text" name="surname" value="{{$user->surname}}">
                                    @error('surname')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-12">
                                <div class="form-group ">
                                    <label>@lang('Email')</label>
                                    <input type="text" name="email" value="{{$user->email}}" disabled>
                                    @error('email')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-12 addable_form">
                                <div class="form-group edit_ico">
                                    <label>@lang('Адрес')</label>
                                    @foreach($user->addresses as $a)
                                        <input type="text" name="addresses[][{{$a->id}}]" value="{{$a->address}}">
                                    @endforeach
                                </div>
                                <button type="submit" class="add_address"><span>+</span> @lang('Добавить адрес')</button>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-12 addable_form">
                                <div class="form-group edit_ico">
                                    <label>@lang('Мобильный номер')</label>
                                    <input type="tel" name="phone" value="{{$user->phone}}">
                                    @error('phone')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                {{--<button type="submit" class="add_tel"><span>+</span>@lang('Добавить номер') </button>--}}
                            </div>
                            <div class="col-md-12 my_profile_data_save">
                                <button type="submit">@lang('Сохранить изменения')</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- tab 1 end--->
                <!-- tab1-->
                <div class=" my_profile_tab  full" id="my_shopping">
                    <div class="my_shoppigs_tables full">
                        <!---->
                        <!-- desktop table-->
                        @foreach($data as $transaction)
                        <div class="my_shopping_table desktop_table">
                            <table class="full ">
                                <thead>
                                    <tr>
                                        <th>@lang('НОМЕР ЗАКАЗА')</th>
                                        <th>@lang('НАЗВАНИЕ ПРОДУКТА')</th>
                                        <th>@lang('ДАТА И ВРЕМЯ')</th>
                                        <th>@lang('КОЛИЧЕСТВО')</th>
                                        <th>@lang('СУММА')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($transaction->transactionDetails as $details)
                                        <tr>
                                        <td>
                                            <b>{{(!$loop->index) ? '№' . $transaction->id : ''}}</b>
                                        </td>
                                        <td>{{$details->product_name}}</td>
                                        <td>{{$details->created_at->format('d-m-Y : h-m')}}</td>
                                        <td>{{$details->count}} əd</td>
                                        <td>
                                            <div class="table_azn">
                                                <i><img src="/images/black-azn.svg" alt=""></i>
                                                {{$details->price}}
                                            </div>
                                        </td>
                                    </tr>
                                   @endforeach
                                </tbody>
                            </table>
                            <div class="shopping_table_total_price full">
                                <p>СУММА ОПЛАТЫ:</p>
                                <span>
                                    <div class="table_azn">
                                        {{$transaction->total}}
                                        <i><img src="/images/azn.svg" alt=""></i>

                                    </div>
                                </span>
                            </div>
                        </div>
                        <!-- desktop table end-->
                        <!-- mobile table-->
                        <div class="my_shopping_table mobile_table">
                            <div class="table_number_order full">
                                <p>НОМЕР ЗАКАЗА</p>
                                <span>№25601</span>
                            </div>
                            <table class="full ">
                                <thead>
                                    <tr>
                                        <th>НАЗВАНИЕ ПРОДУКТА</th>
                                        <th>КОЛИЧЕСТВО</th>
                                        <th>СУММА</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Grante
                                            Клубника Варенье</td>
                                        <td>4 əd</td>
                                        <td>
                                            <div class="table_azn">
                                                <i><img src="assets/images/black-azn.svg" alt=""></i>
                                                9.00
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>

                                        <td>Grante
                                            Juicyfood</td>
                                        <td>4 əd</td>
                                        <td>
                                            <div class="table_azn">
                                                <i><img src="assets/images/black-azn.svg" alt=""></i>
                                                12.00
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>

                                        <td>Grante
                                            Pomegranate</td>
                                        <td>4 əd</td>
                                        <td>
                                            <div class="table_azn">
                                                <i><img src="assets/images/black-azn.svg" alt=""></i>
                                                12.00
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="shopping_table_total_price full">
                                <div class="stt_left">
                                    <p>ДАТА И ВРЕМЯ</p>
                                    <span>25 Noyabr 1990 11:00</span>
                                </div>
                                <div class="stt_right">
                                    <p>СУММА ОПЛАТЫ:</p>
                                    <span>
                                        <div class="table_azn">
                                            <i><img src="assets/images/azn.svg" alt=""></i>
                                            33.00
                                        </div>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <!-- mobile table end-->
                        @endforeach
                    </div>
                </div>
                <!-- tab 1 end--->
            </div>
            <!-- tabs end-->
        </div>
    </div>
</section>


<script>
    $('.add_address').click(function(e) {
        e.preventDefault();
        $(this).parents('.addable_form').find('.form-group').append('<input type="text" name="add_address[][address]" class="added_input" placeholder="новый адрес">');
    })
    $('.add_tel').click(function() {
        $(this).parents('.addable_form').find('.form-group').append('<input type="tel" class="added_input" placeholder="новый номер">');
    })
</script>
@include('layouts.footer')