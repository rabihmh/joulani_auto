<x-front title="{{$vehicle->vehicle_name}}">
    <x-slot:breadcrumbs>
        <div class="container">
            <span typeof="v:Breadcrumb"><a property="v:title" rel="v:url"
                                           href="{{route('front.home')}}">الرئيسية</a></span>
            <span class="sep">»</span>
            <span typeof="v:Breadcrumb"><a
                    property="v:title"
                    rel="v:url"
                    href="{{route('front.vehicles.index')}}">المركبات</a></span>
            <span class="sep">»</span>
            <span typeof="v:Breadcrumb"
            ><span property="v:title" class="current"
                >{{$vehicle->vehicle_name}}</span
                ></span
            >
        </div>
    </x-slot:breadcrumbs>
    <div class="container mt-1 mb-5">
        <div class="row">
            <div class="col-12 text-center mb-2">
                <h2>{{$vehicle->vehicle_name}}</h2>
            </div>
            <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                <div class="clear"></div>
                <div class="row">
                    <div class="col-12">
                        <figure>
                            <a
                                data-fancybox="single"
                                data-type="image"
                                href="{{asset('storage/'.$vehicle->main_image)}}">
                                <img src="{{asset('storage/'.$vehicle->main_image)}}" alt="" title=""/>
                            </a>
                        </figure>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                <div class="row car-info">
                    <div class="col-4">
                        <div class="details-bx">
                            <img style="max-width: 70%;margin-top: -33px;margin-bottom: -26px"
                                 src="{{asset('/Front/img/price.png')}}" alt="" title=""/>
                            <label>السعر</label>
                            <span>{{$vehicle->price}}</span>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="details-bx">
                            <img src="{{asset('/Front/img/power.png')}}" alt="" title=""/>
                            <label>القوة</label>
                            <span>{{$vehicle->power}}</span>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="details-bx">
                            <div class="aut car-sb-img"></div>
                            <label>ناقل الحركة</label>
                            <span>{{__('vehicle.'.$vehicle->gear)}}</span>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="details-bx">
                            <img src="{{asset('/Front/img/fuel.png')}}" alt="" title=""/>
                            <label>الوقود</label>
                            <span>{{__('vehicle.'.$vehicle->fuel)}}</span>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="details-bx">
                            <img src="{{asset('/Front/img/date.png')}}" alt="" title=""/>
                            <label>سنة الإنتاج</label>
                            <span>{{$vehicle->year_of_product}}</span>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="details-bx">
                            <img src="{{asset('/Front/img/seat.png')}}" alt="" title=""/>
                            <label>عدد المقاعد</label>
                            <span>{{__('vehicle.'.$vehicle->num_of_seats)}}</span>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="details-bx">
                            <img src="{{asset('/Front/img/hp.png')}}" alt="" title=""/>
                            <label>عدد الأحصنة</label>
                            <span>{{$vehicle->hp}}</span>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="details-bx">
                            <img src="{{asset('/Front/img/distance.png')}}" alt="" title=""/>
                            <label>المسافة المقطوعة</label>
                            <span>{{$vehicle->mileage}}</span>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="details-bx">
                            <img src="{{asset('/Front/img/key.png')}}" alt="" title=""/>
                            <label>عدد المفاتيح</label>
                            <span>{{__('vehicle.'.$vehicle->num_of_keys)}}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        @foreach(explode(',',$vehicle->oimg) as $image)
                            <div class="other-img col-lg-2 col-md-2 col-sm-3 col-3 mb-2">
                                <a
                                    data-fancybox="single"
                                    data-type="image"
                                    href="{{asset('storage/'.$image)}}">
                                    <img src="{{asset('storage/'.$image)}}" alt="" title=""/>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card mt-3 mb-3">
                        <div class="card-header text-white bg-blue">معلومات أخرى</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <table class="table table-bordered">
                                        <tr>
                                            <td>طرق الدفع</td>
                                            <td>
                                                {!!\App\Facades\VehicleDataFacade::display($vehicle->payment_method)!!}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>نظام الدفع</td>
                                            <td><label
                                                    class="btn btn-light btn-sm">{{__('vehicle.'.$vehicle->drivetrain_system)}}</label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>فتحة سقف</td>
                                            <td>
                                                <label class="btn btn-light btn-sm">{{__('vehicle.'.$vehicle->extra->ext_int_sunroof)}}</label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>الزجاج</td>
                                            <td>
                                               {!!\App\Facades\VehicleDataFacade::display($vehicle->extra->ext_int_glass)!!}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>الشاشات</td>
                                            <td>
                                                {!!\App\Facades\VehicleDataFacade::display($vehicle->extra->ext_int_screens)!!}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>المقاعد</td>
                                            <td>
                                                {!! \App\Facades\VehicleDataFacade::display($vehicle->extra->ext_int_seats) !!}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>نوع الفرش</td>
                                            <td>
                                                {!! \App\Facades\VehicleDataFacade::display($vehicle->extra->ext_int_furniture) !!}
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <table class="table table-bordered">
                                        <tr>
                                            <td>المقود</td>
                                            <td>
                                                {!! \App\Facades\VehicleDataFacade::display($vehicle->extra->ext_int_steering) !!}

                                            </td>
                                        </tr>
                                        <tr>
                                            <td>الحساسات</td>
                                            <td>
                                                {!! \App\Facades\VehicleDataFacade::display($vehicle->extra->ext_ext_sensors) !!}

                                            </td>
                                        </tr>
                                        <tr>
                                            <td>المرايا</td>
                                            <td>
                                                {!! \App\Facades\VehicleDataFacade::display($vehicle->extra->ext_ext_mirrors) !!}

                                            </td>
                                        </tr>
                                        <tr>
                                            <td>الإضاءة</td>
                                            <td>
                                                {!! \App\Facades\VehicleDataFacade::display($vehicle->extra->ext_ext_light) !!}

                                            </td>
                                        </tr>
                                        <tr>
                                            <td>الكاميرات</td>
                                            <td>
                                                {!! \App\Facades\VehicleDataFacade::display($vehicle->extra->ext_ext_cameras) !!}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>اللون الخارجي</td>
                                            <td>
                                                <div
                                                    class="btn p-3"
                                                    style="background-color: {{$vehicle->body_color}};border: 1px solid"
                                                ></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>اللون الداخلي</td>
                                            <td>
                                                <div
                                                    class="btn p-3"
                                                    style="background-color: {{$vehicle->interior_color}};border: 1px solid"
                                                ></div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <table class="table table-bordered">
                                    <tr>
                                        <td>إضافات داخلية أخرى</td>
                                        <td>
                                            {!! \App\Facades\VehicleDataFacade::display($vehicle->extra->ext_int_other) !!}

                                        </td>
                                    </tr>
                                </table>
                                <table class="table table-bordered">
                                    <tr>
                                        <td width="25%">إضافات أخرى</td>
                                        <td>
                                            {!! \App\Facades\VehicleDataFacade::display($vehicle->extra->ext_gen_other) !!}

                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="card mt-3 mb-3">
                        <div class="card-header text-white bg-blue">معلومات المعلن</div>
                        <div class="card-body bg-blue-data">
                            <ul>
                                <li>
                                    <label>الإسم: </label>{{$vehicle->seller->seller_name}}
                                </li>
                                <li>
                                    <label>رقم الهاتف: </label
                                    ><a href="tel:{{$vehicle->seller->seller_mobile}}" id="4682"
                                        class="call-advertiser">
                                        {{$vehicle->seller->seller_mobile}}</a>
                                </li>
                            </ul>
                            <a href="{{route('front.sellers.show',$vehicle->seller->id)}}"
                               class="btn btn-small btn-primary"
                            >عرض جميع إلإعلانات</a
                            >
                            <a
                                href="{{$vehicle->seller->seller_mobile}}"
                                id="4682"
                                class="btn btn-small btn-success call-advertiser"
                            >الإتصال بالمعلن</a
                            >
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="card mt-3 mb-3">
                        <div class="card-header text-white bg-blue">مشاركة</div>
                        <div class="social_share card-body">
                            <a
                                href="https://www.facebook.com/sharer/sharer.php?u=http://127.0.0.1/vehicles/1&title=Land Rover, Range Rover Vogue"
                                class="facebook hvr-pulse"
                                target="_blank"
                            ><i class="fab fa-facebook"></i
                                ></a>
                            <a
                                href="whatsapp://send?text={{route('front.vehicles.show',$vehicle->id)}}"
                                class="whatsapp hvr-pulse"
                                target="_blank"
                            ><i class="fab fa-whatsapp"></i
                                ></a>
                            <a
                                href="https://telegram.me/share/url?url={{route('front.vehicles.show',$vehicle->id)}}"
                                class="telegram hvr-pulse"
                                target="_blank"
                            ><i class="fab fa-telegram"></i
                                ></a>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-front>
