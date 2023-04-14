<x-front title="{{$seller->seller_name}}">
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
                    <div class="mb-2 seller-dt hvr-sweep-to-left"><label>رقم هاتف المعرض</label><a
                            href="tel:{{$seller->seller_mobile}}">{{$seller->seller_mobile}}</a></div>
                    <div class="mb-2 seller-dt hvr-sweep-to-left"><label>مشاركة</label>
                        <div class="social_share mt-2">
                            <a href="" class="facebook"><i class="fab fa-facebook"></i></a>
                            <a href="" class="linkedin"><i class="fab fa-facebook-messenger"></i></a>
                            <a href="" class="whatsapp"><i class="fab fa-whatsapp"></i></a>
                            <a href="" class="telegram"><i class="fab fa-telegram"></i></a>
                            <div class="clear"></div>
                        </div>
                    </div>
                    <div class="mb-2 seller-dt">
                        <label>الموقع</label>
                        <div>
                            <div id="my_map_add" style="width:100%;height:300px;"></div>

                            <script type="text/javascript">
                                function my_map_add() {
                                    var myMapCenter = new google.maps.LatLng(21.551168942995, 39.170072417461);
                                    var myMapProp = {
                                        center: myMapCenter,
                                        zoom: 12,
                                        scrollwheel: false,
                                        draggable: false,
                                        mapTypeId: google.maps.MapTypeId.ROADMAP
                                    };
                                    var map = new google.maps.Map(document.getElementById("my_map_add"), myMapProp);
                                    var marker = new google.maps.Marker({position: myMapCenter});
                                    marker.setMap(map);
                                }
                            </script>

                            <script
                                src="https://maps.googleapis.com/maps/api/js?key=your_key&callback=my_map_add"></script>
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
</x-front>
