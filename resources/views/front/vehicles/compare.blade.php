<x-front>
    <div class="container mt-5 mb-5">
        <div class="row compare">
            <table class="table table-bordered">
                <tr class="bg-dark text-white">
                    <td>نوع المركبة</td>
                    <td class="text-center">
                        <h3>{{$first_vehicle->vehicle_name}}</h3>
                    </td>
                    <td class="text-center">
                        <h3>{{$second_vehicle->vehicle_name}}</h3>
                    </td>
                </tr>
                <tr>
                    <td>الصور</td>
                    <td class="text-center">
                        <figure>
                            <img src="{{asset('storage/'.$first_vehicle->main_image)}}" class="compare-img"/>
                        </figure>
                    </td>
                    <td class="text-center">
                        <figure>
                            <img src="{{asset('storage/'.$second_vehicle->main_image)}}" class="compare-img"/>
                        </figure>
                    </td>
                </tr>
                <tr>
                    <td>السعر</td>
                    <td>{{$first_vehicle->price}} <i class="fas fa-dollar-sign"></i></td>
                    <td>{{$second_vehicle->price}} <i class="fas fa-dollar-sign"></i></td>
                </tr>
                <tr>
                    <td width="25%">اللون الخارجي</td>
                    <td class="text-center">
                        <div class="btn p-3"
                             style="background-color: {{$first_vehicle->body_color}}; border:1px solid"></div>
                    </td>
                    <td class="text-center">
                        <div class="btn p-3"
                             style="background-color: {{$second_vehicle->body_color}}; border:1px solid"></div>
                    </td>
                </tr>
                <tr>
                    <td>اللون الداخلي</td>
                    <td class="text-center">
                        <div class="btn p-3"
                             style="background-color:  {{$first_vehicle->interior_color}}; border:1px solid"></div>
                    </td>
                    <td class="text-center">
                        <div class="btn p-3"
                             style="background-color: {{$second_vehicle->interior_color}}; border:1px solid"></div>
                    </td>
                </tr>
                <tr>
                    <td>القوة</td>
                    <td>{{$first_vehicle->power}}</td>
                    <td>{{$second_vehicle->power}}</td>
                </tr>
                <tr>
                    <td>ناقل الحركة</td>
                    <td>{{__('vehicle.'.$first_vehicle->gear)}}</td>
                    <td>{{__('vehicle.'.$second_vehicle->gear)}}</td>
                </tr>
                <tr>
                    <td>الوقود</td>
                    <td>{{__('vehicle.'.$first_vehicle->fuel)}}</td>
                    <td>{{__('vehicle.'.$second_vehicle->fuel)}}</td>
                </tr>
                <tr>
                    <td>سنة الإنتاج</td>
                    <td>{{$first_vehicle->year_of_product}}</td>
                    <td>{{$second_vehicle->year_of_product}}</td>
                </tr>
                <tr>
                    <td>عدد المقاعد</td>
                    <td>{{__('vehicle.'.$first_vehicle->num_of_seats)}}</td>
                    <td>{{__('vehicle.'.$second_vehicle->num_of_seats)}}</td>
                </tr>
                <tr>
                    <td>نظام الدفع</td>
                    <td>{{__('vehicle.'.$first_vehicle->drivetrain_system)}}</td>
                    <td>{{__('vehicle.'.$second_vehicle->drivetrain_system)}}</td>
                </tr>
                <tr>
                    <td>المسافة المقطوعة</td>
                    <td>{{$first_vehicle->mileage}}</td>
                    <td>{{$second_vehicle->mileage}}</td>
                </tr>
                <tr>
                    <td>عدد المفاتيح</td>
                    <td>{{__('vehicle.'.$first_vehicle->num_of_keys)}}</td>
                    <td>{{__('vehicle.'.$second_vehicle->num_of_keys)}}</td>
                </tr>
            </table>
            <hr/>
            <div class="page_divider_title">إضافات داخلية</div>
            <table class="table table-bordered">
                <tr>
                    <td width="25%">نوع الفرش</td>
                    <td>{!! \App\Facades\VehicleDataFacade::display($first_vehicle->extra->ext_int_furniture) !!}</td>
                    <td>{!! \App\Facades\VehicleDataFacade::display($second_vehicle->extra->ext_int_furniture) !!}</td>
                </tr>
                <tr>
                    <td>فتحة السقف</td>
                    <td>{!! \App\Facades\VehicleDataFacade::display($first_vehicle->extra->ext_int_sunroof) !!}</td>
                    <td>{!! \App\Facades\VehicleDataFacade::display($second_vehicle->extra->ext_int_sunroof) !!}</td>
                </tr>
                <tr>
                    <td>المقود</td>
                    <td>{!! \App\Facades\VehicleDataFacade::display($first_vehicle->extra->ext_int_steering) !!}</td>
                    <td>{!! \App\Facades\VehicleDataFacade::display($second_vehicle->extra->ext_int_steering) !!}</td>
                </tr>
                <tr>
                    <td>المقاعد</td>
                    <td>{!! \App\Facades\VehicleDataFacade::display($first_vehicle->extra->ext_int_seats) !!}</td>
                    <td>{!! \App\Facades\VehicleDataFacade::display($second_vehicle->extra->ext_int_seats) !!}</td>
                </tr>
                <tr>
                    <td>الشاشات</td>
                    <td>{!! \App\Facades\VehicleDataFacade::display($first_vehicle->extra->ext_int_screens) !!}</td>
                    <td>{!! \App\Facades\VehicleDataFacade::display($second_vehicle->extra->ext_int_screens) !!}</td>
                </tr>
                <tr>
                    <td>الزجاج</td>
                    <td>{!! \App\Facades\VehicleDataFacade::display($first_vehicle->extra->ext_int_glass) !!}</td>
                    <td>{!! \App\Facades\VehicleDataFacade::display($second_vehicle->extra->ext_int_glass) !!}</td>
                </tr>
                <tr>
                    <td width="25%">إضافات داخلية أخرى</td>
                    <td>{!! \App\Facades\VehicleDataFacade::display($first_vehicle->extra->ext_int_other) !!}</td>
                    <td>{!! \App\Facades\VehicleDataFacade::display($second_vehicle->extra->ext_int_other) !!}</td>
                </tr>
            </table>
            <div class="page_divider_title">اٍضافات داخلية</div>
            <table class="table table-bordered">
                <tr>
                    <td width="25%">الاٍضاءة</td>
                    <td>{!! \App\Facades\VehicleDataFacade::display($first_vehicle->extra->ext_ext_light) !!}</td>
                    <td>{!! \App\Facades\VehicleDataFacade::display($second_vehicle->extra->ext_ext_light) !!}</td>
                </tr>
                <tr>
                    <td width="25%">المرايا</td>
                    <td>{!! \App\Facades\VehicleDataFacade::display($first_vehicle->extra->ext_ext_mirrors) !!}</td>
                    <td>{!! \App\Facades\VehicleDataFacade::display($second_vehicle->extra->ext_ext_mirrors) !!}</td>
                </tr>
                <tr>
                    <td>الكاميرات</td>
                    <td>{!! \App\Facades\VehicleDataFacade::display($first_vehicle->extra->ext_ext_cameras) !!}</td>
                    <td>{!! \App\Facades\VehicleDataFacade::display($second_vehicle->extra->ext_ext_cameras) !!}</td>
                </tr>
                <tr>
                    <td>الحساسات</td>
                    <td>{!! \App\Facades\VehicleDataFacade::display($first_vehicle->extra->ext_ext_sensors) !!}</td>
                    <td>{!! \App\Facades\VehicleDataFacade::display($second_vehicle->extra->ext_ext_sensors) !!}</td>
                </tr>
                <tr>
                    <td>إضافات أخرى</td>
                    <td>{!! \App\Facades\VehicleDataFacade::display($first_vehicle->extra->ext_gen_other) !!}</td>
                    <td>{!! \App\Facades\VehicleDataFacade::display($second_vehicle->extra->ext_gen_other) !!}</td>
                </tr>
            </table>
        </div>
    </div>

</x-front>
