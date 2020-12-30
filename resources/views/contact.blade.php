@include('layouts.header')
<section class="contact_page_section full">
    <div class="container">
        <!-- mobile breadcrumb-->
        <div class="mobile_breadcrumb">
            <ul>
                <li>
                    <a href="/">@lang('Главная') </a>
                </li>
                <li>
                    <a href="#">@lang('Контакты') </a>
                </li>
            </ul>
        </div>
        <!-- mobile breadcrumb end-->
        <div class="contact_page_container full">
            <div class="section_title mobile_title">
                <h2>@lang('Контакты')</h2>
            </div>
            <div class="main_contact_container full">
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
                                    <button type="submit">Göndər</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="cscb_right">
                        <h4>Связаться с нами</h4>
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
    </div>
</section>
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