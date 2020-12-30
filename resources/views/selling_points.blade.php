@include('layouts.header')
<section class="contact_page_section map_page_section full">
    <div class="container">
        <div class="contact_page_container full">
            <!-- mobile breadcrumb-->
            <div class="mobile_breadcrumb">
                <ul>
                    <li>
                        <a href=/">@lang('Главная') </a>
                    </li>
                    <li>
                        <a href="#">@lang('Контакты') </a>
                    </li>
                </ul>
            </div>
            <!-- mobile breadcrumb end-->
            <div class="main_contact_container full">
                <div class="section_title  full">
                    <h2>@lang('ТОЧКИ ПРОДАЖ')</h2>
                    <div class="title_select_container">
                        <div class="title_select">
                            <select class="chosen-select">
                                <option value="0">Город</option>
                                <option value="1">Город 1</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="map main_map full" id="map">
                </div>

            </div>
        </div>
    </div>
</section>

<script>
    let openWindow = null;
    let bounce = null;

    function getContent(markers) {
        return `
          <div class="content position-relative map_infobar">
                  <img src="{{asset('img/con-mask.svg')}}" alt="" class="position-absolute cont-mask">
                  <p> ${markers.addr}</p>
                  <h3>${markers.loc}</h3>
                  </div>
          `
    }

    function myMap() {


        var options = {
            zoom: 12,
            center: {
                lat: 40.409264,
                lng: 49.867092
            },
            panControl: false,
            zoomControl: false,
            mapTypeControl: false,
            scaleControl: false,
            streetViewControl: false,
            overviewMapControl: false,
            rotateControl: false
        }



        // new map

        var map = new google.maps.Map(document.getElementById("map"), options);

        var markers = [{
                coords: {
                    lat: 40.372058,
                    lng: 49.977530
                },
                addr: 'Bakı şəh., Heydər Əliyev pr. 215',
                loc: 'BRAVO MARKET',
            },
            {
                coords: {
                    lat: 40.391177,
                    lng: 49.814905
                },
                addr: 'Bakı şəh., Heydər Əliyev pr. 215',
                loc: 'BRAVO MARKET 2',
            }
        ];
        let newLoc = null
        let geoMap = null;

        // loop for array
        function a(markers) {
            for (var i = 0; i < markers.length; i++) {
                addMarkers(markers[i]);
            }
        }
        for (var i = 0; i < markers.length; i++) {
            addMarkers(markers[i]);
        }

        function addMarkers(props) {
            var marker = new google.maps.Marker({
                position: props.coords,
                map: map,
                animation: google.maps.Animation.DROP,
                icon: 'assets/images/green_pin.svg',
            });
            if (true) {
                var infoWindow = new google.maps.InfoWindow({
                    content: getContent(props),
                    pixelOffset: new google.maps.Size(140, 320)
                })
                marker.addListener('click', () => {
                    if (openWindow) {
                        openWindow.close(map, marker);
                        marker.setAnimation(null);
                    }
                    infoWindow.open(map, marker);
                    openWindow = infoWindow;
                    marker.setAnimation(google.maps.Animation.BOUNCE);
                })

            }

            marker.addListener('click', toggleBounce);

            function toggleBounce() {
                if (marker.getAnimation() !== null) {
                    marker.setAnimation(null);
                } else {
                    marker.setAnimation(google.maps.Animation.BOUNCE);
                }
            }

        }

    }
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCCZWy2YH-P1SUd4wbCz4gteGoX3aXSd1c&callback=myMap"></script>
@include('layouts.footer')