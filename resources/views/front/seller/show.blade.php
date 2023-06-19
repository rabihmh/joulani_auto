<x-front title="{{$seller->seller_name}}">
    @push('css')
        <link rel="stylesheet" type="text/css" href="https://js.api.here.com/v3/3.1/mapsjs-ui.css"/>
        <style>
            /* Style for fullscreen button */
            .fullscreen-button {
                position: absolute;
                top: 10px;
                right: 10px;
                z-index: 1000;
                padding: 5px;
                cursor: pointer;
                width: 30px;
                height: 30px;
                text-align: center;
            }

            .fullscreen-button::before {
                font-family: "Font Awesome 6 Free";
                font-weight: 900;
                content: "\f065";
            }

            /* Style for fullscreen map */
            .fullscreen-map {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                z-index: 1000;
            }
        </style>
    @endpush
    <x-slot:breadcrumbs>
        <div class="container">
            <span typeof="v:Breadcrumb"><a property="v:title" rel="v:url" href="/">الرئيسية</a></span>
            <span class="sep">»</span>
            <span typeof="v:Breadcrumb"><a property="v:title" rel="v:url" href="/sellers">معارض السيارات</a></span>
            <span class="sep">»</span>
            <span typeof="v:Breadcrumb"><span property="v:title" class="current">{{$seller->seller_name}}</span></span>
        </div>
    </x-slot:breadcrumbs>
    <div class="container mt-2 mb-5">
        <div class="page_title mb-3">
            <h1 class="text-center">{{$seller->seller_name}}</h1>
            <br/>
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <div class="mb-2 seller-dt hvr-sweep-to-left"><label>العنوان</label>{{$seller->seller_address}}
                    </div>
                    <div class="mb-2 seller-dt hvr-sweep-to-left"><label>رقم هاتف المعرض</label><a dir="ltr"
                                                                                                   href="tel:{{$seller->seller_mobile}}">{{$seller->seller_mobile}}</a>
                    </div>
                    <div class="mb-2 seller-dt hvr-sweep-to-left"><label>مشاركة</label>
                        <div class="social_share mt-2">
                            <a href="" class="facebook"><i class="fab fa-facebook"></i></a>
                            <a href="" class="linkedin"><i class="fab fa-facebook-messenger"></i></a>
                            <a href="" class="whatsapp"><i class="fab fa-whatsapp"></i></a>
                            <a href="" class="telegram"><i class="fab fa-telegram"></i></a>
                            <div class="clear"></div>
                        </div>
                    </div>
                    <div class="mb-2 seller-dt" id="map-container">
                        <label>الموقع</label>
                        <div>
                            <div id="my_map_add" style="width:100%;height:300px;"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                    <div class="mt-3">
                        <div class="page_title">سيارات المعرض</div>
                    </div>
                    <div class="mt-3 row">
                        @foreach($seller->vehicles as $vehicle)
                            <div class="col-lg-4 col-lg-4 col-sm-6 col-xs-12">
                                <div class="car-bx car-bx-2">
                                    <a class="hover01" href="{{route('front.vehicles.show',$vehicle->id)}}">
                                        <figure><img
                                                src="{{asset('storage/'.$vehicle->main_image)}}"
                                                class="car-bx-img-top" alt="..."></figure>
                                        <div class="car-bx-body">
                                            <h2 class="car-bx-title">
                                                {{$vehicle->vehicle_name}}
                                            </h2>
                                            <p class="car-bx-price">
                                                <i class="fas fa-dollar-sign"></i>&nbsp;&nbsp;{{$vehicle->price}}
                                            </p>
                                            <div class="row">
                                                <div class="col-4 min-box text-center mb-3">
                                                    <div class="aut car-sb-img"></div>
                                                    <label>{{__('vehicle.'.$vehicle->gear)}}</label>
                                                </div>
                                                <div class="col-4 min-box text-center mb-3">
                                                    <div class="fuel car-sb-img"></div>
                                                    <label>{{__('vehicle.'.$vehicle->fuel)}}</label>
                                                </div>
                                                <div class="col-4 min-box text-center mb-3">
                                                    <div class="power car-sb-img"></div>
                                                    <label>{{$vehicle->power}}</label>
                                                </div>
                                                <div class="col-4 min-box text-center mb-3">
                                                    <div class="hp car-sb-img"></div>
                                                    <label>{{$vehicle->hp}}</label>
                                                </div>
                                                <div class="col-4 min-box text-center mb-3">
                                                    <div class="date car-sb-img"></div>
                                                    <label>{{$vehicle->year_of_product}}</label>
                                                </div>
                                                <div class="col-4 min-box text-center mb-3">
                                                    <div class="distance car-sb-img"></div>
                                                    <label>{{$vehicle->mileage}}</label>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <div data-id="{{$vehicle->id}}" data-img="/storage/{{$vehicle->main_image}}"
                                         data-name="{{$vehicle->vehicle_name}}"
                                         class="compareVehicle btn btn-sm btn-compare mb-2 text-white">مقارنة
                                    </div>
                                    <a href="{{route('front.vehicles.show',$vehicle->id)}}">
                                        <div class="car-more-details"> عرض المزيد
                                            <i class="fas fa-arrow-left"></i>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-slot:compareBox>
        <div id="combareBox">
            <div class="page_divider_title">مقارنة المركبات<span class="float-start close-bx"><i
                        class="fas fa-times-circle"></i></span></div>
            <div class="row" id="combar-bx-show">
            </div>
            <a href="#" id="hrefCompare" class="btn btn-danger btn-sm float-start ml-2 mt-2">مقارنة</a>
        </div>
    </x-slot:compareBox>
    @push('js')
        <script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-core.js"></script>
        <script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-service.js"></script>
        <script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-ui.js"></script>
        <script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-mapevents.js"></script>
        <script>
            const locationData = {!! json_encode($seller->location_data) !!};
            if (locationData && locationData.lng !== null && locationData.lat !== null) {
                const lat = locationData.lat;
                const lng = locationData.lng;

                function addMarkerToMap(map) {
                    const icon = new H.map.Icon('{{asset('Front/images/maker.svg')}}');
                    let sellerLocation = new H.map.Marker({lat: lat, lng: lng}, {icon: icon});

                    map.addObject(sellerLocation);
                }

                const platform = new H.service.Platform({
                    apikey: 'o_Ty0FImxO7Iwwebl9K46iS6xOt7ocvrHeHtt15urgA'
                });
                const defaultLayers = platform.createDefaultLayers();

                const map = new H.Map(document.getElementById('my_map_add'),
                    defaultLayers.vector.normal.map, {
                        center: {lat: lat, lng: lng},
                        zoom: 12,
                        pixelRatio: window.devicePixelRatio || 1
                    });
                window.addEventListener('resize', () => map.getViewPort().resize());
                var behavior = new H.mapevents.Behavior(new H.mapevents.MapEvents(map));

                var ui = H.ui.UI.createDefault(map, defaultLayers);


                var fullscreenButton = document.createElement('i');
                fullscreenButton.className = 'fullscreen-button';
                map.getElement().appendChild(fullscreenButton);

                fullscreenButton.addEventListener('click', function () {
                    var mapElement = map.getElement();
                    if (!document.fullscreenElement) {
                        if (mapElement.requestFullscreen) {
                            mapElement.requestFullscreen();
                        } else if (mapElement.mozRequestFullScreen) {
                            mapElement.mozRequestFullScreen();
                        } else if (mapElement.webkitRequestFullscreen) {
                            mapElement.webkitRequestFullscreen();
                        } else if (mapElement.msRequestFullscreen) {
                            mapElement.msRequestFullscreen();
                        }
                        mapElement.classList.add('fullscreen-map');
                    } else {
                        if (document.exitFullscreen) {
                            document.exitFullscreen();
                        } else if (document.mozCancelFullScreen) {
                            document.mozCancelFullScreen();
                        } else if (document.webkitExitFullscreen) {
                            document.webkitExitFullscreen();
                        } else if (document.msExitFullscreen) {
                            document.msExitFullscreen();
                        }
                        mapElement.classList.remove('fullscreen-map');
                    }
                });

                window.onload = function () {
                    addMarkerToMap(map);
                }
            } else {
                document.getElementById('map-container').style.display = 'none';
            }
        </script>
    @endpush
</x-front>
{{--
 <script>

            /**
             * Adds markers to the map highlighting the locations of the captials of
             * France, Italy, Germany, Spain and the United Kingdom.
             *
             * @param  {H.Map} map      A HERE Map instance within the application
             */
            function addMarkersToMap(map) {
                var sellerLocation = new H.map.Marker({lat:34.5724474 , lng:36.0142976 });
                map.addObject(sellerLocation);

            }

            var platform = new H.service.Platform({
                apikey: 'o_Ty0FImxO7Iwwebl9K46iS6xOt7ocvrHeHtt15urgA'
            });
            var defaultLayers = platform.createDefaultLayers();

            var map = new H.Map(document.getElementById('my_map_add'),
                defaultLayers.vector.normal.map, {
                    center: {lat: 34.5724474, lng: 36.0142976},
                    zoom: 12,
                    pixelRatio: window.devicePixelRatio || 1
                });
            window.addEventListener('resize', () => map.getViewPort().resize());
            var behavior = new H.mapevents.Behavior(new H.mapevents.MapEvents(map));

            var ui = H.ui.UI.createDefault(map, defaultLayers);
            window.onload = function () {
                addMarkersToMap(map);
            }

        </script>
--}}
