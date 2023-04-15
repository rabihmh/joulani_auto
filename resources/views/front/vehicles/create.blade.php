@push('css')
    <style>
        .make_in {
            width: 120px;
        }

        .mould_in {
            width: 80px;
        }
    </style>
@endpush
<x-front title="اضافة مركبة">

    <x-slot:breadcrumbs>
        <div class="container">
            <span typeof="v:Breadcrumb"><a property="v:title" rel="v:url" href="/">الرئيسية</a></span>
            <span class="sep">»</span>
            <span typeof="v:Breadcrumb"><span property="v:title" class="current">إضافة مركبة</span></span>
        </div>
    </x-slot:breadcrumbs>
    <div class="container mt-1 mb-5">
        @if($errors)
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif
        <form method="POST" action="{{route('front.vehicles.store')}}">
            @csrf
            <div class="row">
                <x-vehicle.mades :data="$mades"/>
                <div class="col-lg-4 col-md-3 col-sm-6 col-xs-12">
                    <div class="card mb-3">
                        <div class="card-header text-white bg-blue">نوع الوقود
                            <div class="float-start">
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                        <div class="card-body">
                            <input type="hidden" value="" name="fuel" id="fuelType">
                            <div data-id="bin" class="  fuelType btn btn-outline-secondary btn-sm mb-2">بنزين</div>
                            <div data-id="des" class="  fuelType btn btn-outline-secondary btn-sm mb-2">ديزل</div>
                            <div data-id="binelec" class="  fuelType btn btn-outline-secondary btn-sm mb-2">بنزين/كهرباء
                            </div>
                            <div data-id="deselec" class="  fuelType btn btn-outline-secondary btn-sm mb-2">ديزل/كهرباء
                            </div>
                            <div data-id="gaz" class="  fuelType btn btn-outline-secondary btn-sm mb-2">غاز</div>
                            <div data-id="elec" class="  fuelType btn btn-outline-secondary btn-sm mb-2">كهرباء</div>
                        </div>
                        <x-error name="fuel"/>
                    </div>
                </div>
                <div class="col-lg-4 col-md-3 col-sm-6 col-xs-12">
                    <div class="card mb-3">
                        <div class="card-header text-white bg-blue">ناقل الحركة
                            <div class="float-start">
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                        <div class="card-body">
                            <input id="gearType" value="" name="gear" type="text" hidden/>
                            <div data-id="man" class=" gearType btn btn-outline-secondary btn-sm mb-2">عادي</div>
                            <div data-id="aut" class="  gearType btn btn-outline-secondary btn-sm mb-2">أوتماتيك</div>
                            <div data-id="sau" class="  gearType btn btn-outline-secondary btn-sm mb-2">ستيبترونيك
                            </div>
                        </div>
                        <x-error name="gear"/>
                    </div>
                </div>
                <div class="col-lg-4 col-md-3 col-sm-6 col-xs-12">
                    <div class="card mb-3">
                        <div class="card-header text-white bg-blue">
                            طرق الدفعات
                            <div class="float-start">
                                <i class="fas fa-star"></i>
                            </div>
                            <div class="float-start">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="price_type_check">
                                    <label class="form-check-label" for="price_type_check">إختيار الجميع</label>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <input name="payment_method" value="" hidden type="text" id="payment_method">
                            <div data-id="payment_method_types_pay1"
                                 class=" payment_method btn btn-outline-secondary btn-sm mb-2">
                                كاش
                            </div>
                            <div data-id="payment_method_types_pay2"
                                 class="  payment_method btn btn-outline-secondary btn-sm mb-2">عن
                                طريق البنك
                            </div>
                            <div data-id="payment_method_types_pay3"
                                 class="  payment_method btn btn-outline-secondary btn-sm mb-2">
                                تقسيط مباشر
                            </div>
                            <div data-id="payment_method_types_pay4"
                                 class="  payment_method btn btn-outline-secondary btn-sm mb-2">
                                دفعة أولى + شيكات
                            </div>
                        </div>
                        <x-error name="payment_method"/>
                    </div>
                </div>
                <div class="col-lg-4 col-md-3 col-sm-6 col-xs-12">
                    <div class="card mb-3">
                        <div class="card-header text-white bg-blue">عدد المقاعد
                            <div class="float-start">
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                        <div class="card-body">
                            <input name="num_of_seats" value="" hidden type="text" id="numSeats">
                            <div data-id="s0" class=" numSeats btn btn-outline-secondary btn-sm mb-2">1+1</div>
                            <div data-id="s1" class=" numSeats btn btn-outline-secondary btn-sm mb-2">2+1</div>
                            <div data-id="s2" class=" numSeats btn btn-outline-secondary btn-sm mb-2">3+1</div>
                            <div data-id="s3" class=" numSeats btn btn-outline-secondary btn-sm mb-2">4+1</div>
                            <div data-id="s4" class=" numSeats btn btn-outline-secondary btn-sm mb-2">5+1</div>
                            <div data-id="s5" class=" numSeats btn btn-outline-secondary btn-sm mb-2">6+1</div>
                            <div data-id="s6" class=" numSeats btn btn-outline-secondary btn-sm mb-2">7+1</div>
                            <div data-id="s7" class=" numSeats btn btn-outline-secondary btn-sm mb-2">8+1</div>
                            <div data-id="s8" class=" numSeats btn btn-outline-secondary btn-sm mb-2">9+1</div>
                        </div>
                        <x-error name="num_of_seats"/>
                    </div>
                </div>
                <div class="col-lg-4 col-md-3 col-sm-6 col-xs-12">
                    <div class="card mb-3">
                        <div class="card-header text-white bg-blue">حالة المركبة
                            <div class="float-start">
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                        <div class="card-body">
                            <input name="vehicle_status" value="" hidden type="text" id="vehicleStatus">
                            <div data-id="new" class=" vehicleStatus btn btn-outline-secondary btn-sm mb-2">جديد</div>
                            <div data-id="usd" class=" vehicleStatus btn btn-outline-secondary btn-sm mb-2">مستعمل</div>
                        </div>
                        <x-error name="vehicle_status"/>
                    </div>
                </div>
                <div class="col-lg-4 col-md-3 col-sm-6 col-xs-12">
                    <div class="card mb-3">
                        <div class="card-header text-white bg-blue">نظام الدفع
                            <div class="float-start">
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                        <div class="card-body">
                            <input type="text" value="" hidden name="drivetrain_system" id="drivetrain_system"/>
                            <div data-id="fbf" class="  drivetrain_system btn btn-outline-secondary btn-sm mb-2">4*4
                            </div>
                            <div data-id="tbf" class="  drivetrain_system btn btn-outline-secondary btn-sm mb-2">2*4
                            </div>
                        </div>
                        <x-error name="drivetrain_system"/>
                    </div>
                </div>
                <div class="col-lg-4 col-md-3 col-sm-6 col-xs-12">
                    <div class="card mb-1">
                        <div class="card-header text-white bg-blue">عدد الأحصنة
                            <div class="float-start">
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                        <div class="card-body">
                            <input class="form-control" placeholder="عدد الأحصنة" type="number" pattern="\d*" name="hp"
                                   value="">
                        </div>
                        <x-error name="hp"/>
                    </div>
                </div>
                <div class="col-lg-4 col-md-3 col-sm-6 col-xs-12">
                    <div class="card mb-1">
                        <div class="card-header text-white bg-blue">قوة المحرك
                            <div class="float-start">
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                        <div class="card-body">
                            <input type="number" pattern="\d*" value="" class="form-control mb-1"
                                   placeholder="قوة المحرك"
                                   name="power">
                        </div>
                        <x-error name="power"/>
                    </div>
                </div>
                <div class="col-lg-4 col-md-3 col-sm-6 col-xs-12">
                    <div class="card mb-1">
                        <div class="card-header text-white bg-blue">المسافة المقطوعة
                            <div class="float-start">
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                        <div class="card-body mb-4">
                            <input type="number" pattern="\d*" value="" class="form-control mb-1"
                                   placeholder="المسافة المقطوعة" name="mileage">
                        </div>
                        <x-error name="mileage"/>
                    </div>
                </div>
                <div class="col-lg-4 col-md-3 col-sm-6 col-xs-12">
                    <div class="card mb-1">
                        <div class="card-header text-white bg-blue">سنة الإنتاح
                            <div class="float-start">
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                        <div class="card-body mb-4">
                            <select class="form-control" name="year_of_product">
                                <option value="">الرجاء إختيار سنة الإنتاج</option>
                                @php
                                    for ($i=date('Y');$i>=1976;$i--){
                                        echo "<option value={$i}>{$i}</option>";
                                    }
                                @endphp
                            </select>
                        </div>
                        <x-error name="year_of_product"/>

                    </div>
                </div>
                <div class="col-lg-4 col-md-3 col-sm-6 col-xs-12">
                    <div class="card mb-1">
                        <div class="card-header text-white bg-blue">السعر
                            <div class="float-start">
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                        <div class="card-body">
                            <input type="number" pattern="\d*" value="" step="1" class="form-control mb-1"
                                   placeholder="السعر" name="price">
                        </div>
                        <x-error name="price"/>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="card mb-1">
                        <div class="card-header text-white bg-blue">اللون الخارجي والداخلي
                            <div class="float-start">
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="card-body mb-4">
                                    <div class="d-grid gap-2">
                                        <input hidden type="text" value="" name="body_color" id="carExternalColorBx">
                                        <div id="carExternalColor" style="background-color: " class="btn btn-light"
                                             data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            اللون الخارجي <label id="carExternalColorBxName"></label>
                                        </div>
                                    </div>
                                </div>
                                <x-error name="body_color"/>
                            </div>
                            <div class="col-6">
                                <div class="card-body mb-4">
                                    <div class="d-grid gap-2">
                                        <input hidden type="text" value="" name="interior_color"
                                               id="carFurnitureColorBx">
                                        <div id="carInternalColor" style="background-color: " class="btn btn-light"
                                             data-bs-toggle="modal" data-bs-target="#exampleModal2">
                                            لون الفرش <label id="carFurnitureColorBxName"></label>
                                        </div>
                                    </div>
                                </div>
                                <x-error name="interior_color"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="card mb-1">
                        <div class="card-header text-white bg-blue">عنوان إضافي</div>
                        <div class="card-body">
                            <input type="text" class="form-control" name="extra_title">
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <div class="card mb-1">
                        <div class="card-header text-white bg-blue">رفع الصور</div>
                        <div class="card-body">
                            <div class="row">
                                <label class="custom-file">
                                    <input type="file" multiple id="multiple_files" class="custom-file-input">
                                    <span class="custom-file-control custom-file-control-primary"></span>
                                </label>
                                <div id="success">
                                    <label></label>
                                    <div class="progress">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 0%"
                                             aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <input type="hidden" value="" name="oimg" class="oimg">
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="d-grid gap-2 mt-2 mb-2">
                <a class="toggle btn btn-secondary btn-block" style="cursor:pointer">
                    <span class="toggle-text"> خيارات أخرى</span>&nbsp;&nbsp;&nbsp;<i id="toggleicon"
                                                                                      class="fa-angle-down fa"></i>
                </a>
            </div>

            <div id="target">
                <div class="row">


                </div>
                <hr/>
                <div class="page_divider_title">إضافات داخلية</div>
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="card mb-1">
                            <div class="card-header text-white bg-blue">عدد المفاتيح</div>
                            <div class="card-body">
                                <input hidden type="text" name="num_of_keys" id="num_of_keys">
                                <div data-id="kes1" class="num_of_keys btn btn-outline-secondary btn-sm mb-2">1
                                </div>
                                <div data-id="kes2" class="num_of_keys btn btn-outline-secondary btn-sm mb-2">2
                                </div>
                                <div data-id="kes3" class="num_of_keys btn btn-outline-secondary btn-sm mb-2">3
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="card mb-1">
                            <div class="card-header text-white bg-blue">نوع الفرش</div>
                            <div class="card-body">
                                <input hidden type="text" value="" name="ext_int_furniture" id="ext_int_furniture">
                                <div data-id="ext_int_furniture_leat"
                                     class=" ext_int_furniture btn btn-outline-secondary btn-sm mb-2">جلد
                                </div>
                                <div data-id="ext_int_furniture_colt"
                                     class=" ext_int_furniture btn btn-outline-secondary btn-sm mb-2">قماش
                                </div>
                                <div data-id="ext_int_furniture_lndc"
                                     class=" ext_int_furniture btn btn-outline-secondary btn-sm mb-2">جلد + قماش
                                </div>
                                <div data-id="ext_int_furniture_sprt"
                                     class=" ext_int_furniture btn btn-outline-secondary btn-sm mb-2">رياضي
                                </div>
                                <div data-id="ext_int_furniture_velv"
                                     class=" ext_int_furniture btn btn-outline-secondary btn-sm mb-2">مخمل
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="card mb-1">
                            <div class="card-header text-white bg-blue">فتحة السقف</div>
                            <div class="card-body">
                                <input type="text" value="" hidden name="ext_int_sunroof" id="ext_int_sunroof">
                                <div data-id="ext_int_sunroof_norm"
                                     class=" ext_int_sunroof btn btn-outline-secondary btn-sm mb-2">عادية
                                </div>
                                <div data-id="ext_int_sunroof_pano"
                                     class=" ext_int_sunroof btn btn-outline-secondary btn-sm mb-2">بانوراما
                                </div>
                                <div data-id="ext_int_sunroof_conv"
                                     class=" ext_int_sunroof btn btn-outline-secondary btn-sm mb-2">سقف متحرك
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="card mb-1">
                            <div class="card-header text-white bg-blue">الزجاج
                                <div class="float-start">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value=""
                                               id="ext_int_glass_check">
                                        <label class="form-check-label" for="ext_int_glass_check">إختيار الجميع</label>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                <input hidden type="text" value="" name="ext_int_glass" id="ext_int_glass">
                                <div data-id="ext_int_glass_egls"
                                     class=" ext_int_glass btn btn-outline-secondary btn-sm mb-2">كهربائي
                                </div>
                                <div data-id="ext_int_glass_lsrd"
                                     class=" ext_int_glass btn btn-outline-secondary btn-sm mb-2">تعتيم ليزر
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="card mb-1">
                            <div class="card-header text-white bg-blue">المقاعد
                                <div class="float-start">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value=""
                                               id="ext_int_seats_check">
                                        <label class="form-check-label" for="ext_int_seats_check">إختيار الجميع</label>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <input hidden type="text" value="" name="ext_int_seats" id="ext_int_seats">
                                <div data-id="ext_int_seats_htst"
                                     class=" ext_int_seats btn btn-outline-secondary btn-sm mb-2">تدفئة مقاعد
                                </div>
                                <div data-id="ext_int_seats_clst"
                                     class=" ext_int_seats btn btn-outline-secondary btn-sm mb-2">تبريد مقاعد
                                </div>
                                <div data-id="ext_int_seats_mast"
                                     class=" ext_int_seats btn btn-outline-secondary btn-sm mb-2">مساج مقاعد
                                </div>
                                <div data-id="ext_int_seats_spst"
                                     class=" ext_int_seats btn btn-outline-secondary btn-sm mb-2">مقاعد رياضية
                                </div>
                                <div data-id="ext_int_seats_elst"
                                     class=" ext_int_seats btn btn-outline-secondary btn-sm mb-2">تحكم كهرباء
                                </div>
                                <div data-id="ext_int_seats_mest"
                                     class=" ext_int_seats btn btn-outline-secondary btn-sm mb-2">ذاكرة مقاعد
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="card mb-1">
                            <div class="card-header text-white bg-blue">الشاشات
                                <div class="float-start">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value=""
                                               id="ext_int_screens_check">
                                        <label class="form-check-label" for="ext_int_screens_check">إختيار
                                            الجميع</label>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <input hidden type="text" value="" name="ext_int_screens" id="ext_int_screens">
                                <div data-id="ext_int_screens_frsc"
                                     class=" ext_int_screens btn btn-outline-secondary btn-sm mb-2">شاشة أمامية
                                </div>
                                <div data-id="ext_int_screens_basc"
                                     class="  ext_int_screens btn btn-outline-secondary btn-sm mb-2">شاشات خلفية
                                </div>
                                <div data-id="ext_int_screens_blue"
                                     class="  ext_int_screens btn btn-outline-secondary btn-sm mb-2">بلوتوث
                                </div>
                                <div data-id="ext_int_screens_usb"
                                     class="  ext_int_screens btn btn-outline-secondary btn-sm mb-2">USB
                                </div>
                                <div data-id="ext_int_screens_ebph"
                                     class="  ext_int_screens btn btn-outline-secondary btn-sm mb-2">قاعدة بلوتوث
                                    للهواتف
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="card mb-1">
                            <div class="card-header text-white bg-blue">إضافات داخلية أخرى
                                <div class="float-start">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value=""
                                               id="ext_int_other_check">
                                        <label class="form-check-label" for="price_type_check">إختيار الجميع</label>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <input hidden type="text" value="" name="ext_int_other" id="ext_int_other">
                                <div data-id="ext_int_other_eio1"
                                     class=" ext_int_other btn btn-outline-secondary btn-sm mb-2">زر تشغيل
                                </div>
                                <div data-id="ext_int_other_eio2"
                                     class="  ext_int_other btn btn-outline-secondary btn-sm mb-2">إضاءة داخلية
                                </div>
                                <div data-id="ext_int_other_eio3"
                                     class="  ext_int_other btn btn-outline-secondary btn-sm mb-2">نظام صوتي
                                </div>
                                <div data-id="ext_int_other_eio4"
                                     class="  ext_int_other btn btn-outline-secondary btn-sm mb-2">إغلاق مركزي
                                </div>
                                <div data-id="ext_int_other_eio5"
                                     class="  ext_int_other btn btn-outline-secondary btn-sm mb-2">وسائد هوائية
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="card mb-1">
                            <div class="card-header text-white bg-blue">المقود
                                <div class="float-start">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value=""
                                               id="ext_int_steering_check">
                                        <label class="form-check-label" for="price_type_check">إختيار الجميع</label>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <input type="hidden" value="" name="ext_int_steering" id="ext_int_steering">
                                <div data-id="ext_int_steering_refi"
                                     class=" ext_int_steering btn btn-outline-secondary btn-sm mb-2">غيارات مقود
                                </div>
                                <div data-id="ext_int_steering_stco"
                                     class=" ext_int_steering btn btn-outline-secondary btn-sm mb-2">تحكم مقود
                                </div>
                                <div data-id="ext_int_steering_hste"
                                     class=" ext_int_steering btn btn-outline-secondary btn-sm mb-2">تدفئة مقود
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr/>
                <div class="page_divider_title">إضافات خارجية</div>
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="card mb-1">
                            <div class="card-header text-white bg-blue">الإضاءة
                                <div class="float-start">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value=""
                                               id="ext_ext_light_check">
                                        <label class="form-check-label" for="ext_ext_light_check">إختيار الجميع</label>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <input hidden type="text" value="" name="ext_ext_light" id="ext_ext_light">
                                <div data-id="ext_ext_light_znon"
                                     class=" ext_ext_light btn btn-outline-secondary btn-sm mb-2">زينون
                                </div>
                                <div data-id="ext_ext_light_ledl"
                                     class=" ext_ext_light btn btn-outline-secondary btn-sm mb-2">ليد
                                </div>
                                <div data-id="ext_ext_light_fogl"
                                     class=" ext_ext_light btn btn-outline-secondary btn-sm mb-2">ضباب
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="card mb-1">
                            <div class="card-header text-white bg-blue">المرايا
                                <div class="float-start">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value=""
                                               id="ext_ext_mirrors_check">
                                        <label class="form-check-label" for="price_type_check">إختيار الجميع</label>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <input hidden type="text" value="" name="ext_ext_mirrors" id="ext_ext_mirrors">
                                <div data-id="ext_ext_mirrors_limi"
                                     class=" ext_ext_mirrors btn btn-outline-secondary btn-sm mb-2">إضاءة مرايا
                                </div>
                                <div data-id="ext_ext_mirrors_clel"
                                     class=" ext_ext_mirrors btn btn-outline-secondary btn-sm mb-2">إغلاق كهرباء
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="card mb-1">
                            <div class="card-header text-white bg-blue">الجنط</div>
                            <div class="card-body">
                                <input hidden type="text" value="" name="ext_ext_rims" id="ext_ext_rims">
                                <div data-id="ext_ext_rims_norl"
                                     class="  ext_ext_rims btn btn-outline-secondary btn-sm mb-2">عادي
                                </div>
                                <div data-id="ext_ext_rims_magn"
                                     class="  ext_ext_rims btn btn-outline-secondary btn-sm mb-2">مغنيسيوم
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
                        <div class="card mb-1">
                            <div class="card-header text-white bg-blue">الحساسات
                                <div class="float-start">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value=""
                                               id="ext_ext_sensors_check">
                                        <label class="form-check-label" for="price_type_check">إختيار الجميع</label>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <input hidden type="text" value="" name="ext_ext_sensors" id="ext_ext_sensors">
                                <div data-id="ext_ext_sensors_frot"
                                     class=" ext_ext_sensors btn btn-outline-secondary btn-sm mb-2">امامي
                                </div>
                                <div data-id="ext_ext_sensors_bake"
                                     class=" ext_ext_sensors btn btn-outline-secondary btn-sm mb-2">خلفي
                                </div>
                                <div data-id="ext_ext_sensors_tsds"
                                     class=" ext_ext_sensors btn btn-outline-secondary btn-sm mb-2">360 درجة
                                </div>
                                <div data-id="ext_ext_sensors_rain"
                                     class=" ext_ext_sensors btn btn-outline-secondary btn-sm mb-2">مطر
                                </div>
                                <div data-id="ext_ext_sensors_ligh"
                                     class=" ext_ext_sensors btn btn-outline-secondary btn-sm mb-2">إضاءة
                                </div>
                                <div data-id="ext_ext_sensors_blin"
                                     class=" ext_ext_sensors btn btn-outline-secondary btn-sm mb-2"> النقطة العمياء
                                </div>
                                <div data-id="ext_ext_sensors_sele"
                                     class=" ext_ext_sensors btn btn-outline-secondary btn-sm mb-2">تحديد مسار
                                </div>
                                <div data-id="ext_ext_sensors_sign"
                                     class=" ext_ext_sensors btn btn-outline-secondary btn-sm mb-2">قارئ اٍشارات
                                </div>
                                <div data-id="ext_ext_sensors_self"
                                     class=" ext_ext_sensors btn btn-outline-secondary btn-sm mb-2">اٍصطفاف ذاتي
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="card mb-1">
                            <div class="card-header text-white bg-blue">الكاميرات
                                <div class="float-start">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value=""
                                               id="ext_ext_cameras_check">
                                        <label class="form-check-label" for="price_type_check">إختيار الجميع</label>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <input hidden type="text" value="" name="ext_ext_cameras" id="ext_ext_cameras">
                                <div data-id="ext_ext_cameras_frnt"
                                     class=" ext_ext_cameras btn btn-outline-secondary btn-sm mb-2">أمامية
                                </div>
                                <div data-id="ext_ext_cameras_back"
                                     class=" ext_ext_cameras btn btn-outline-secondary btn-sm mb-2">خلفية
                                </div>
                                <div data-id="ext_ext_cameras_tsdc"
                                     class=" ext_ext_cameras btn btn-outline-secondary btn-sm mb-2">360 درجة
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="card mb-1">
                            <div class="card-header text-white bg-blue">إضافات خارجية أخرى
                                <div class="float-start">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value=""
                                               id="ext_ext_other_check">
                                        <label class="form-check-label" for="price_type_check">إختيار الجميع</label>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <input hidden type="text" value="" name="ext_ext_other" id="ext_ext_other">
                                <div data-id="ext_ext_other_hudp"
                                     class=" ext_ext_other btn btn-outline-secondary btn-sm mb-2">Head Up Display
                                </div>
                                <div data-id="ext_ext_other_sela"
                                     class=" ext_ext_other btn btn-outline-secondary btn-sm mb-2">اٍصطفاف ذاتي
                                </div>
                                <div data-id="ext_ext_other_bump"
                                     class=" ext_ext_other btn btn-outline-secondary btn-sm mb-2">360صدّام أمامي
                                </div>
                                <div data-id="ext_ext_other_hydr"
                                     class=" ext_ext_other btn btn-outline-secondary btn-sm mb-2">360رفع وخفض
                                    هيدروليكي
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                        <div class="card mb-1">
                            <div class="card-header text-white bg-blue">إضافات أخرى
                                <div class="float-start">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value=""
                                               id="ext_gen_other_check">
                                        <label class="form-check-label" for="price_type_check">إختيار الجميع</label>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <input hidden type="text" value="" name="ext_gen_other" id="ext_gen_other">
                                <div data-id="ext_gen_other_fing"
                                     class=" ext_gen_other btn btn-outline-secondary btn-sm mb-2">بصمة أبواب
                                </div>
                                <div data-id="ext_gen_other_remo"
                                     class="  ext_gen_other btn btn-outline-secondary btn-sm mb-2">صدّام أمامي
                                </div>
                                <div data-id="ext_gen_other_elec"
                                     class="  ext_gen_other btn btn-outline-secondary btn-sm mb-2">قيادة ذاتية
                                </div>
                                <div data-id="ext_gen_other_ecos"
                                     class="  ext_gen_other btn btn-outline-secondary btn-sm mb-2">نظام ECO
                                </div>
                                <div data-id="ext_gen_other_abss"
                                     class="  ext_gen_other btn btn-outline-secondary btn-sm mb-2">نظام ABS
                                </div>
                                <div data-id="ext_gen_other_navi"
                                     class="  ext_gen_other btn btn-outline-secondary btn-sm mb-2">نظام خرائط
                                </div>
                                <div data-id="ext_gen_other_door"
                                     class="  ext_gen_other btn btn-outline-secondary btn-sm mb-2">أبواب شفط
                                </div>
                                <div data-id="ext_gen_other_safe"
                                     class="  ext_gen_other btn btn-outline-secondary btn-sm mb-2">رادار قياس مسافة
                                    الأمان
                                </div>
                                <div data-id="ext_gen_other_crui"
                                     class="  ext_gen_other btn btn-outline-secondary btn-sm mb-2">محدد سرعة
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-3 mt-3 d-grid gap-2">
                <button class="btn btn-danger">إضافة</button>
            </div>
            <br/>
            <br/>
            <div class="modal fade" id="modelModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">الرجاء إختيار الموديل</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body row">

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
                                    data-bs-target="#modelModal">إغلاق
                            </button>
                            <button id="save_model_modal" type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#modelModal">حفظ
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">لون السيارة</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body row">
                            <div class="col-6 mb-2 c-color" data-id="#ffffff" data-name="أبيض">
                                <div class="bx-color"
                                     style="background-color: #ffffff; border: 1px solid #383838"></div>
                                <label>أبيض</label><label class="checkafter"></label>
                            </div>
                            <div class="col-6 mb-2 c-color" data-id="#1e14de" data-name="نيلي">
                                <div class="bx-color"
                                     style="background-color: #1e14de; border: 1px solid #ffffff"></div>
                                <label>نيلي</label><label class="checkafter"></label>
                            </div>
                            <div class="col-6 mb-2 c-color" data-id="#15b367" data-name="أزرق مخضر">
                                <div class="bx-color"
                                     style="background-color: #15b367; border: 1px solid #ffffff"></div>
                                <label>أزرق مخضر</label><label class="checkafter"></label>
                            </div>
                            <div class="col-6 mb-2 c-color" data-id="#0e103d" data-name="كحلي ">
                                <div class="bx-color"
                                     style="background-color: #0e103d; border: 1px solid #ffffff"></div>
                                <label>كحلي </label><label class="checkafter"></label>
                            </div>
                            <div class="col-6 mb-2 c-color" data-id="#ba0909" data-name="خمري">
                                <div class="bx-color"
                                     style="background-color: #ba0909; border: 1px solid #ffffff"></div>
                                <label>خمري</label><label class="checkafter"></label>
                            </div>
                            <div class="col-6 mb-2 c-color" data-id="#544c4a" data-name="رمادي">
                                <div class="bx-color"
                                     style="background-color: #544c4a; border: 1px solid #ffffff"></div>
                                <label>رمادي</label><label class="checkafter"></label>
                            </div>
                            <div class="col-6 mb-2 c-color" data-id="#000000" data-name="أسود">
                                <div class="bx-color"
                                     style="background-color: #000000; border: 1px solid #ffffff"></div>
                                <label>أسود</label><label class="checkafter"></label>
                            </div>
                            <div class="col-6 mb-2 c-color" data-id="#f0e9e9" data-name="أبيض كريمي">
                                <div class="bx-color"
                                     style="background-color: #f0e9e9; border: 1px solid #383838"></div>
                                <label>أبيض كريمي</label><label class="checkafter"></label>
                            </div>
                            <div class="col-6 mb-2 c-color" data-id="#24070d" data-name="بنفسجي">
                                <div class="bx-color"
                                     style="background-color: #24070d; border: 1px solid #ffffff"></div>
                                <label>بنفسجي</label><label class="checkafter"></label>
                            </div>
                            <div class="col-6 mb-2 c-color" data-id="#c48f60" data-name="بني برونزي">
                                <div class="bx-color"
                                     style="background-color: #c48f60; border: 1px solid #ffffff"></div>
                                <label>بني برونزي</label><label class="checkafter"></label>
                            </div>
                            <div class="col-6 mb-2 c-color" data-id="#ffadbb" data-name="زهري">
                                <div class="bx-color"
                                     style="background-color: #ffadbb; border: 1px solid #383838"></div>
                                <label>زهري</label><label class="checkafter"></label>
                            </div>
                            <div class="col-6 mb-2 c-color" data-id="#fcba03" data-name="أصفر">
                                <div class="bx-color"
                                     style="background-color: #fcba03; border: 1px solid #383838"></div>
                                <label>أصفر</label><label class="checkafter"></label>
                            </div>
                            <div class="col-6 mb-2 c-color" data-id="#ff0000" data-name="أحمر">
                                <div class="bx-color"
                                     style="background-color: #ff0000; border: 1px solid #383839"></div>
                                <label>أحمر</label><label class="checkafter"></label>
                            </div>
                            <div class="col-6 mb-2 c-color" data-id="#0bde16" data-name="أخضر">
                                <div class="bx-color"
                                     style="background-color: #0bde16; border: 1px solid #383840"></div>
                                <label>أخضر</label><label class="checkafter"></label>
                            </div>
                            <div class="col-6 mb-2 c-color" data-id="#1e9dba" data-name="أزرق فاتح">
                                <div class="bx-color"
                                     style="background-color: #1e9dba; border: 1px solid #383838"></div>
                                <label>أزرق فاتح</label><label class="checkafter"></label>
                            </div>
                            <div class="col-6 mb-2 c-color" data-id="#de6b18" data-name="برتقالي">
                                <div class="bx-color"
                                     style="background-color: #de6b18; border: 1px solid #383839"></div>
                                <label>برتقالي</label><label class="checkafter"></label>
                            </div>
                            <div class="col-6 mb-2 c-color" data-id="#c7c1bd" data-name="فضي">
                                <div class="bx-color"
                                     style="background-color: #c7c1bd; border: 1px solid #383839"></div>
                                <label>فضي</label><label class="checkafter"></label>
                            </div>
                            <div class="col-6 mb-2 c-color" data-id="#2a4221" data-name="زيتي">
                                <div class="bx-color"
                                     style="background-color: #2a4221; border: 1px solid #ffffff"></div>
                                <label>زيتي</label><label class="checkafter"></label>
                            </div>
                            <div class="col-6 mb-2 c-color" data-id="#6b6560" data-name="سكني">
                                <div class="bx-color"
                                     style="background-color: #6b6560; border: 1px solid #ffffff"></div>
                                <label>سكني</label><label class="checkafter"></label>
                            </div>
                            <div class="col-6 mb-2 c-color" data-id="#362517" data-name="بني غامق">
                                <div class="bx-color"
                                     style="background-color: #362517; border: 1px solid #ffffff"></div>
                                <label>بني غامق</label><label class="checkafter"></label>
                            </div>
                            <div class="col-6 mb-2 c-color" data-id="#700d0d" data-name="أحمر قاني">
                                <div class="bx-color"
                                     style="background-color: #700d0d; border: 1px solid #ffffff"></div>
                                <label>أحمر قاني</label><label class="checkafter"></label>
                            </div>
                            <div class="col-6 mb-2 c-color" data-id="#70431e" data-name="بني">
                                <div class="bx-color"
                                     style="background-color: #70431e; border: 1px solid #ffffff"></div>
                                <label>بني</label><label class="checkafter"></label>
                            </div>
                            <div class="col-6 mb-2 c-color" data-id="#120a0a" data-name="أسود مطفي">
                                <div class="bx-color"
                                     style="background-color: #120a0a; border: 1px solid #ffffff"></div>
                                <label>أسود مطفي</label><label class="checkafter"></label>
                            </div>
                            <div class="col-6 mb-2 c-color" data-id="#215769" data-name="أزرق غامق">
                                <div class="bx-color"
                                     style="background-color: #215769; border: 1px solid #ffffff"></div>
                                <label>أزرق غامق</label><label class="checkafter"></label>
                            </div>
                            <div class="col-6 mb-2 c-color" data-id="#386352" data-name="أخضر غامق">
                                <div class="bx-color"
                                     style="background-color: #386352; border: 1px solid #ffffff"></div>
                                <label>أخضر غامق</label><label class="checkafter"></label>
                            </div>
                            <div class="col-6 mb-2 c-color" data-id="#8fe813" data-name="فسفوري">
                                <div class="bx-color"
                                     style="background-color: #8fe813; border: 1px solid #ffffff"></div>
                                <label>فسفوري</label><label class="checkafter"></label>
                            </div>


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">حفظ</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">لون الفرش الداخلي</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body row">
                            <div class="col-6 mb-2 f-color" data-id="#fcfcfc" data-name="أبيض">
                                <div class="bx-color"
                                     style="background-color: #fcfcfc; border: 1px solid #000000"></div>
                                <label>أبيض</label><label class="checkafter"></label>
                            </div>
                            <div class="col-6 mb-2 f-color" data-id="#000000" data-name="أسود">
                                <div class="bx-color"
                                     style="background-color: #000000; border: 1px solid #000000"></div>
                                <label>أسود</label><label class="checkafter"></label>
                            </div>
                            <div class="col-6 mb-2 f-color" data-id="#c40a0a" data-name="أحمر">
                                <div class="bx-color"
                                     style="background-color: #c40a0a; border: 1px solid #c40a0a"></div>
                                <label>أحمر</label><label class="checkafter"></label>
                            </div>
                            <div class="col-6 mb-2 f-color" data-id="#5e3b18" data-name="بني">
                                <div class="bx-color"
                                     style="background-color: #5e3b18; border: 1px solid #5e3b18"></div>
                                <label>بني</label><label class="checkafter"></label>
                            </div>
                            <div class="col-6 mb-2 f-color" data-id="#755196" data-name="بنفسجي">
                                <div class="bx-color"
                                     style="background-color: #755196; border: 1px solid #755196"></div>
                                <label>بنفسجي</label><label class="checkafter"></label>
                            </div>
                            <div class="col-6 mb-2 f-color" data-id="#fbffd9" data-name="بيج">
                                <div class="bx-color"
                                     style="background-color: #fbffd9; border: 1px solid #000000"></div>
                                <label>بيج</label><label class="checkafter"></label>
                            </div>
                            <div class="col-6 mb-2 f-color" data-id="#c9902e" data-name="عسلي">
                                <div class="bx-color"
                                     style="background-color: #c9902e; border: 1px solid #c9902e"></div>
                                <label>عسلي</label><label class="checkafter"></label>
                            </div>
                            <div class="col-6 mb-2 f-color" data-id="#751010" data-name="خمري">
                                <div class="bx-color"
                                     style="background-color: #751010; border: 1px solid #751010"></div>
                                <label>خمري</label><label class="checkafter"></label>
                            </div>
                            <div class="col-6 mb-2 f-color" data-id="#b5b3b3" data-name="سكني">
                                <div class="bx-color"
                                     style="background-color: #b5b3b3; border: 1px solid #b5b3b3"></div>
                                <label>سكني</label><label class="checkafter"></label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">حفظ</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    @push('js')
        <script>
            $(function () {
                $(".c-color").on('click', function () {
                    var val = $(this).attr('data-id');
                    $("#carExternalColor").css({'background-color': val, 'border-color': val})
                    $("#carExternalColorBxName").text($(this).attr('data-name'))
                    $("#carExternalColorBx").val(val)
                    $(".checkafter").removeClass("fa fa-check")
                    $(this).find('.checkafter').addClass('fa fa-check');
                })
                $(".f-color").on('click', function () {
                    var val = $(this).attr('data-id');
                    $("#carInternalColor").css({'background-color': val, 'border-color': val})
                    $("#carFurnitureColorBxName").text($(this).attr('data-name'))
                    $("#carFurnitureColorBx").val(val)
                    $(".checkafter").removeClass("fa fa-check")
                    $(this).find('.checkafter').addClass('fa fa-check');
                });

                //$("#target").css("display","none");
                function setData(className) {
                    $("." + className).click(function () {
                        $("." + className).removeClass("btn-secondary");
                        $(this).addClass("btn-secondary");
                        $("#" + className).val($(this).attr("data-id"));
                    })
                }

                setData("outerSkin");
                setData("fuelType");
                setData("gearType");
                setData("numSeats");
                setData("vehicleStatus");
                setData("priceHideShow");
                setData("drivetrain_system");
                setData("ext_int_sunroof");
                setData("customs_exemption");
                setData("origin");
                setData("num_of_keys");
                setData("previous_owners");
                setData("ext_int_furniture");
                setData("ext_ext_rims");

                $(".toggle").click(function () {
                    $("#target").slideToggle(1000);
                    $("#toggleicon").toggleClass('fa fa-angle-up').toggleClass('fa fa-angle-down');
                })

                $("#deleteUserChoice").on('click', function () {
                    $("#made_type").val('')
                    $("#ModelName").text('');
                    $("#MakeName").text('');
                    $("#MakeImg").html('');
                    $("#makes_type").val('');
                    $("#chosenCarOnAdd").addClass('d-none');
                })

                $('body').on('change', '.radioModelName', function () {
                    if ($("input[name='optradio']:checked")) {
                        var name = $(this).attr('data-id');
                        $("#made_type").val($(this).val())
                        $("#ModelName").text(name);
                    }
                })

                $("#viewMoreMake").on('click', function () {
                    $.ajax({
                        url: '/getAllMake/',
                        type: 'get',
                        headers: {
                            'X-CSRF-TOKEN': "oLul21SS9u1JCGju3CxupPcZceNhmovBMfCjAIWz"
                        },
                        beforeSend: function () {
                            $('#allMake').html('<img style="max-width: 30px" src="{{asset('Front/img/loading.gif')}}">');
                        },
                        success: function (data) {
                            console.log(data);
                            if (data != null) {
                                var models = '';
                                models += '<div class="row">';
                                $.each(data, function (k, v) {
                                    console.log(v);
                                    models += '' +
                                        '<div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-4 text-center mb-2 carMake" data-id="' + v.id + '">' +
                                        '<img src="/images/logos/' + v.logo + '" height="' + v.web_height + '" width="' + v.web_width + '"/>' +
                                        '<div>' + v.name + '</div>' +
                                        '</div>' +
                                        '';
                                });
                                models += '</div>';
                                $("#allMake").html(models);
                                $("#viewMoreMake").hide();
                            }
                        },
                    });
                })
//to remove
                $('body').on('click', '.arrowModelName', function () {
                    var val = $(this).attr('data-id');
                    if (val) {
                        $.ajax({
                            url: '/admin/dashboard/made/get-moulds-child/' + val,
                            type: 'get',
                            headers: {},
                            success: function (data) {
                                let result = data.data;
                                if (result != null) {
                                    var models = '';
                                    $.each(result, function (k, v) {
                                        models += '' +
                                            '<div class="col-4 mb-2"> ' +
                                            '<div class="form-check">' +
                                            '<input name="optradio" value="' + v.id + '" data-id="' + v.name + '" class="radioModelName form-check-input" type="radio"> ' +
                                            '<label name="checkedName"  class="form-check-label">' + v.name + '</label>' +
                                            ' </div>' +
                                            '</div>';
                                    });
                                    $("#modelModal .modal-body").html(models);
                                    $('#modelModal').modal('show');
                                }
                            },
                        });
                    }
                });
                $('body').on('click', '.carMake', function () {
                    $("#chosenCarOnAdd").removeClass('d-none');
                    var val = $(this).attr("data-id");
                    var name = $(this).children('div').text();
                    var img = $(this).children('img').attr('src');
                    $("#MakeName").text(name);
                    $("#MakeImg").html('<img src="' + img + '"/>');
                    $("#makes_type").val(val);
                    if (val) {
                        $.ajax({

                            url: "/admin/dashboard/made/get-moulds-id/" + val,
                            type: 'get',
                            headers: {},
                            beforeSend: function () {
                                $('#vehicle').html('<img style="max-width: 30px" src="{{asset('Front/img/loading.gif')}}">');
                            },
                            complete: function () {
                                $('#vehicle').html('');
                            },
                            success: function (data) {
                                let result = data.data;
                                console.log(result);
                                if (result != null) {
                                    var models = '';
                                    $.each(result, function (k, v) {
                                        models += '' +
                                            '<div class="col-4 mb-2"> ' +
                                            '<div class="form-check">';
                                        if (v.children.length === 0) {
                                            models += '<input name="optradio" value="' + v.id + '" data-id="' + v.name + '" class="radioModelName form-check-input" type="radio"> ';
                                        } else {
                                            models += '<i data-id="' + v.id + '" class="fas fa-arrow-circle-left arrowModelName"></i>&nbsp;&nbsp;';
                                        }
                                        models += '<label name="checkedName"  class="form-check-label">' + v.name + '</label>' +
                                            ' </div>' +
                                            '</div>';
                                    });
                                    $("#modelModal .modal-body").html(models);
                                    $('#modelModal').modal('show');
                                }
                            },
                        });
                    }
                })

                checkOne('ext_int_glass', 'ext_int_glass', 'ext_int_glass_check')
                checkAll('ext_int_glass_check', 'ext_int_glass', 'ext_int_glass');

                checkOne('ext_int_seats', 'ext_int_seats', 'ext_int_seats_check')
                checkAll('ext_int_seats_check', 'ext_int_seats', 'ext_int_seats');

                checkOne('ext_int_screens', 'ext_int_screens', 'ext_int_screens_check')
                checkAll('ext_int_screens_check', 'ext_int_screens', 'ext_int_screens');

                checkOne('ext_int_other', 'ext_int_other', 'ext_int_other_check')
                checkAll('ext_int_other_check', 'ext_int_other', 'ext_int_other');

                checkOne('ext_int_steering', 'ext_int_steering', 'ext_int_steering_check')
                checkAll('ext_int_steering_check', 'ext_int_steering', 'ext_int_steering');

                checkOne('ext_ext_light', 'ext_ext_light', 'ext_ext_light_check')
                checkAll('ext_ext_light_check', 'ext_ext_light', 'ext_ext_light');

                checkOne('ext_ext_mirrors', 'ext_ext_mirrors', 'ext_ext_mirrors_check')
                checkAll('ext_ext_mirrors_check', 'ext_ext_mirrors', 'ext_ext_mirrors');

                checkOne('ext_ext_sensors', 'ext_ext_sensors', 'ext_ext_sensors_check')
                checkAll('ext_ext_sensors_check', 'ext_ext_sensors', 'ext_ext_sensors');

                checkOne('ext_ext_cameras', 'ext_ext_cameras', 'ext_ext_cameras_check')
                checkAll('ext_ext_cameras_check', 'ext_ext_cameras', 'ext_ext_cameras');

                checkOne('ext_ext_other', 'ext_ext_other', 'ext_ext_other_check')
                checkAll('ext_ext_other_check', 'ext_ext_other', 'ext_ext_other');

                checkOne('ext_gen_other', 'ext_gen_other', 'ext_gen_other_check')
                checkAll('ext_gen_other_check', 'ext_gen_other', 'ext_gen_other');

                checkOne('payment_method', 'payment_method', 'price_type_check')
                checkAll('price_type_check', 'payment_method', 'payment_method');

                function checkAll(id, className, classNameC) {
                    $("#" + id).on('change', function () {
                        if ($(this).is(":checked")) {
                            $('.' + className).addClass("btn-secondary")
                        } else {
                            $('.' + className).removeClass("btn-secondary")
                        }
                        putData(className, classNameC);
                    })
                }

                function checkOne(id, className, mainId) {
                    var boxId = $("#" + mainId);
                    $("." + className).on('click', function () {
                        $(this).toggleClass('btn-secondary');
                        if (boxId.is(":checked")) {
                            boxId.prop('checked', false);
                        }
                        putData(className, id);
                    })
                }

                function putData(className, id) {
                    var string = $("." + className + ".btn-secondary").map(function (i, v) {
                        return $(this).attr("data-id");
                    }).get().join(",");
                    $("#" + id).val(string);//input id
                }

                $('#addCar').click(function () {
                    var payment_method = $("#payment_method").val();
                    if (!payment_method) {
                        $('html, body').animate({
                            scrollTop: $("#payment_method")
                        }, 500);
                    }
                })
                $('#multiple_files').change(function () {
                    var error_images = '';
                    var form_data = new FormData();
                    var files = $('#multiple_files')[0].files;
                    if (files.length > 20) {
                        $('#success label').html('<div class="alert alert-danger">يرجى إختيار 20 صوره أو أقل، الحد المسموح به فقط 20 صورة لكل مركبة.....</div>');
                    } else {
                        for (var i = 0; i < files.length; i++) {
                            var name = document.getElementById("multiple_files").files[i].name;
                            var ext = name.split('.').pop().toLowerCase();
                            if (jQuery.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
                                error_images += '<p>Invalid ' + i + ' File</p>';
                            }
                            var oFReader = new FileReader();
                            oFReader.readAsDataURL(document.getElementById("multiple_files").files[i]);
                            var f = document.getElementById("multiple_files").files[i];
                            var fsize = f.size || f.fileSize;
                            if (fsize > 4000000) {
                                error_images += '<p>' + i + ' حجم الصورة كبيرة جدا</p>';
                            } else {
                                form_data.append("file[]", document.getElementById('multiple_files').files[i]);
                            }
                        }

                        if (error_images === '') {
                            $('#multiple_files').hide();
                            $.ajax({
                                xhr: function () {
                                    var xhr = new window.XMLHttpRequest();
                                    xhr.upload.addEventListener("progress", function (evt) {
                                        if (evt.lengthComputable) {
                                            var percentComplete = ((evt.loaded / evt.total) * 100);
                                            $(".progress-bar").width(percentComplete + '%');
                                            $(".progress-bar").html(percentComplete + '%');
                                        }
                                    }, false);
                                    return xhr;
                                },
                                headers: {
                                    'X-CSRF-TOKEN': "{{csrf_token()}}"
                                },
                                url: "{{route('upload','vehicles')}}",
                                method: "POST",
                                data: form_data,
                                contentType: false,
                                cache: false,
                                processData: false,
                                beforeSend: function () {
                                    $('#success label').html('' +
                                        '<div class="alert alert-success">الرجاء الإنتظار جاري تحميل الصور.....</div>');
                                },
                                complete: function () {
                                    $('#success label').html('');
                                },

                                success: function (data) {
                                    window.setTimeout(function () {
                                        var val = $('.oimg').val();
                                        if (data) {
                                            for (var i = 0; i < data.length; i++) {
                                                $('#success').append('<img src="{{asset('storage')}}/' + data[i] + '" width="100" height="100" class="img-thumbnail" />');
                                            }
                                            $('.oimg').val(val + data);
                                        }
                                    }, 600);
                                    // $('.progress-bar').css('width', '0%');
                                }
                            });
                        } else {
                            $('#success label').html(error_images);
                            // $('#multiple_files').val('');
                            // $('#success').html("<span class='text-danger'>" + error_images + "</span>");
                            // return false;
                        }
                    }
                });
            })


        </script>

    @endpush
</x-front>
