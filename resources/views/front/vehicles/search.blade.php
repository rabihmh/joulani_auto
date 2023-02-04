<x-front>
    <x-slot:breadcrumbs>
        <div class="container">
            <span typeof="v:Breadcrumb"><a property="v:title" rel="v:url" href="/">الرئيسية</a></span>
            <span class="sep">»</span>
            <span typeof="v:Breadcrumb"><span property="v:title" class="current">المركبات</span></span>
            <div class="btn-danger showSidebar">
                <i class="fas fa-search"></i>
            </div>
        </div>
    </x-slot:bradcrumbs>
    <div class="container position-relative">
        <div class="row mb-5 mt-2">
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12 hideinmobile">
                <div class="btn btn-danger closeSidebar">بحث</div>
                <div class="card mb-3">
                    <div class="card-header text-white bg-blue">الشركة المصنعة</div>
                    <div class="card-body">
                        <select multiple="multiple" id="makes" placeholder="الرجاء إختيار الشركة المصنعة"
                                onchange="console.log($(this).children(':selected').length)"
                                class="choosenbox form-control">
                            <option value="21">
                                Mercedes - Benz
                            </option>
                            <option value="3">
                                BMW
                            </option>
                            <option value="23">
                                Opel
                            </option>
                            <option value="32">
                                Volkswagen
                            </option>
                            <option value="28">
                                Skoda
                            </option>
                            <option value="16">
                                Kia
                            </option>
                            <option value="11">
                                Hyundai
                            </option>
                            <option value="27">
                                Seat
                            </option>
                            <option value="2">
                                Audi
                            </option>
                            <option value="8">
                                Ford
                            </option>
                            <option value="18">
                                Lexus
                            </option>
                            <option value="24">
                                Peugeot
                            </option>
                            <option value="29">
                                Smart
                            </option>
                            <option value="33">
                                Volvo
                            </option>
                            <option value="5">
                                Citroen
                            </option>
                            <option value="9">
                                Honda
                            </option>
                            <option value="22">
                                Nissan
                            </option>
                            <option value="31">
                                Toyota
                            </option>
                            <option value="1">
                                Alfa Romeo
                            </option>
                            <option value="36">
                                Cadillac
                            </option>
                            <option value="4">
                                Chevrolet
                            </option>
                            <option value="6">
                                Dacia
                            </option>
                            <option value="34">
                                DS
                            </option>
                            <option value="7">
                                Fiat
                            </option>
                            <option value="10">
                                Hummer
                            </option>
                            <option value="35">
                                Lamborghini
                            </option>
                            <option value="17">
                                Land Rover
                            </option>
                            <option value="20">
                                Mazda
                            </option>
                            <option value="19">
                                MINI
                            </option>
                            <option value="25">
                                Porsche
                            </option>
                            <option value="26">
                                Renault
                            </option>
                            <option value="12">
                                Infiniti
                            </option>
                            <option value="13">
                                Isuzu
                            </option>
                            <option value="15">
                                Jeep
                            </option>
                            <option value="14">
                                Jaguar
                            </option>
                            <option value="30">
                                Suzuki
                            </option>
                        </select>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-header text-white bg-blue">الموديل</div>
                    <div class="card-body">
                        <select id="carModels" disabled multiple="multiple" placeholder="الرجاء إختيار الموديل"
                                class="choosenbox form-control"></select>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-header text-white bg-blue">تاريخ الإنتاج</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <select class="form-control" id="made_from">
                                    1983
                                    2023
                                    <option value="">من</option>
                                    <option value="2023">2023</option>
                                    <option value="2022">2022</option>
                                    <option value="2021">2021</option>
                                    <option value="2020">2020</option>
                                    <option value="2019">2019</option>
                                    <option value="2018">2018</option>
                                    <option value="2017">2017</option>
                                    <option value="2016">2016</option>
                                    <option value="2015">2015</option>
                                    <option value="2014">2014</option>
                                    <option value="2013">2013</option>
                                    <option value="2012">2012</option>
                                    <option value="2011">2011</option>
                                    <option value="2010">2010</option>
                                    <option value="2009">2009</option>
                                    <option value="2008">2008</option>
                                    <option value="2007">2007</option>
                                    <option value="2006">2006</option>
                                    <option value="2005">2005</option>
                                    <option value="2004">2004</option>
                                    <option value="2003">2003</option>
                                    <option value="2002">2002</option>
                                    <option value="2001">2001</option>
                                    <option value="2000">2000</option>
                                    <option value="1999">1999</option>
                                    <option value="1998">1998</option>
                                    <option value="1997">1997</option>
                                    <option value="1996">1996</option>
                                    <option value="1995">1995</option>
                                    <option value="1994">1994</option>
                                    <option value="1993">1993</option>
                                    <option value="1992">1992</option>
                                    <option value="1991">1991</option>
                                    <option value="1990">1990</option>
                                    <option value="1989">1989</option>
                                    <option value="1988">1988</option>
                                    <option value="1987">1987</option>
                                    <option value="1986">1986</option>
                                    <option value="1985">1985</option>
                                    <option value="1984">1984</option>
                                    <option value="1983">1983</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <select class="form-control" id="made_to">
                                    1983
                                    2023
                                    <option value="">إلى</option>
                                    <option value="2023">2023</option>
                                    <option value="2022">2022</option>
                                    <option value="2021">2021</option>
                                    <option value="2020">2020</option>
                                    <option value="2019">2019</option>
                                    <option value="2018">2018</option>
                                    <option value="2017">2017</option>
                                    <option value="2016">2016</option>
                                    <option value="2015">2015</option>
                                    <option value="2014">2014</option>
                                    <option value="2013">2013</option>
                                    <option value="2012">2012</option>
                                    <option value="2011">2011</option>
                                    <option value="2010">2010</option>
                                    <option value="2009">2009</option>
                                    <option value="2008">2008</option>
                                    <option value="2007">2007</option>
                                    <option value="2006">2006</option>
                                    <option value="2005">2005</option>
                                    <option value="2004">2004</option>
                                    <option value="2003">2003</option>
                                    <option value="2002">2002</option>
                                    <option value="2001">2001</option>
                                    <option value="2000">2000</option>
                                    <option value="1999">1999</option>
                                    <option value="1998">1998</option>
                                    <option value="1997">1997</option>
                                    <option value="1996">1996</option>
                                    <option value="1995">1995</option>
                                    <option value="1994">1994</option>
                                    <option value="1993">1993</option>
                                    <option value="1992">1992</option>
                                    <option value="1991">1991</option>
                                    <option value="1990">1990</option>
                                    <option value="1989">1989</option>
                                    <option value="1988">1988</option>
                                    <option value="1987">1987</option>
                                    <option value="1986">1986</option>
                                    <option value="1985">1985</option>
                                    <option value="1984">1984</option>
                                    <option value="1983">1983</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-header text-white bg-blue">السعر</div>
                    <div class="card-body">
                        <div class="cs-price-range">
                            <form>
                                <input id="price" type="text" class="span2" value="3000" data-slider-min="20000"
                                       data-slider-max="400000" data-slider-step="10000"
                                       data-slider-value="[20000,400000]"/>
                                <div class="selector-value">
                                    <span class="float-start mt-2" id="min-price">20000&nbsp;<i
                                            class="fas fa-shekel-sign"></i></span>
                                    <span id="max-price">400000 &nbsp;<i class="fas fa-shekel-sign"></i></span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-header text-white bg-blue">نوع الوقود</div>
                    <div class="card-body">
                        <div data-id="bin" class="fuelType btn btn-outline-secondary btn-sm mb-2">بنزين</div>
                        <div data-id="des" class="fuelType btn btn-outline-secondary btn-sm mb-2">سولار</div>
                        <div data-id="binelec" class="fuelType btn btn-outline-secondary btn-sm mb-2">بنزين/كهرباء</div>
                        <div data-id="elec" class="fuelType btn btn-outline-secondary btn-sm mb-2">كهرباء</div>
                        <div data-id="gaz" class="fuelType btn btn-outline-secondary btn-sm mb-2">غاز</div>
                        <div data-id="deselec" class="fuelType btn btn-outline-secondary btn-sm mb-2">ديزل/كهرباء</div>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-header text-white bg-blue">ناقل الحركة</div>
                    <div class="card-body">
                        <div data-id="man" class="gearType btn btn-outline-secondary btn-sm mb-2">عادي</div>
                        <div data-id="aut" class="gearType btn btn-outline-secondary btn-sm mb-2">أوتماتيك</div>
                        <div data-id="sau" class="gearType btn btn-outline-secondary btn-sm mb-2">نصف اوتماتيك</div>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-header text-white bg-blue">
                        طرق الدفعات
                    </div>
                    <div class="card-body">
                        <div data-id="payment_method_types_pay1"
                             class="payamentMethod btn btn-outline-secondary btn-sm mb-2">
                            كاش
                        </div>
                        <div data-id="payment_method_types_pay2"
                             class="payamentMethod btn btn-outline-secondary btn-sm mb-2">عن
                            طريق البنك
                        </div>
                        <div data-id="payment_method_types_pay3"
                             class="payamentMethod btn btn-outline-secondary btn-sm mb-2">
                            تقسيط مباشر
                        </div>
                        <div data-id="payment_method_types_pay4"
                             class="payamentMethod btn btn-outline-secondary btn-sm mb-2">
                            دفعة أولى + شيكات
                        </div>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-header text-white bg-blue">عدد المقاعد</div>
                    <div class="card-body">
                        <div data-id="s0" class="numSeats btn btn-outline-secondary btn-sm mb-2">1+1</div>
                        <div data-id="s1" class="numSeats btn btn-outline-secondary btn-sm mb-2">2+1</div>
                        <div data-id="s2" class="numSeats btn btn-outline-secondary btn-sm mb-2">3+1</div>
                        <div data-id="s3" class="numSeats btn btn-outline-secondary btn-sm mb-2">4+1</div>
                        <div data-id="s4" class="numSeats btn btn-outline-secondary btn-sm mb-2">5+1</div>
                        <div data-id="s5" class="numSeats btn btn-outline-secondary btn-sm mb-2">6+1</div>
                        <div data-id="s6" class="numSeats btn btn-outline-secondary btn-sm mb-2">7+1</div>
                        <div data-id="s7" class="numSeats btn btn-outline-secondary btn-sm mb-2">8+1</div>
                        <div data-id="s8" class="numSeats btn btn-outline-secondary btn-sm mb-2">9+1</div>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-header text-white bg-blue">حالة المركبة</div>
                    <div class="card-body">
                        <div data-id="new" class="vehicleStatus btn btn-outline-secondary btn-sm mb-2">جديد</div>
                        <div data-id="usd" class="vehicleStatus btn btn-outline-secondary btn-sm mb-2">مستعمل</div>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-header text-white bg-blue">فتحة سقف</div>
                    <div class="card-body">
                        <div data-id="ext_int_sunroof_norm"
                             class="ext_int_sunroof btn btn-outline-secondary btn-sm mb-2">عادية
                        </div>
                        <div data-id="ext_int_sunroof_pano"
                             class="ext_int_sunroof btn btn-outline-secondary btn-sm mb-2">بانوراما
                        </div>
                        <div data-id="ext_int_sunroof_conv"
                             class="ext_int_sunroof btn btn-outline-secondary btn-sm mb-2">سقف متحرك
                        </div>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-header text-white bg-blue">نظام الدفع</div>
                    <div class="card-body">
                        <div data-id="fbf" class="drivetrain_system btn btn-outline-secondary btn-sm mb-2">4*4</div>
                        <div data-id="tbf" class="drivetrain_system btn btn-outline-secondary btn-sm mb-2">2*4</div>
                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-12">
                <div id="vehiclearea">
                    <div class="loading-img">
                        <div class="loading-img-title">جاري تحميل المركبات...</div>
                        <div class="loading-img-area"></div>
                    </div>
                    <div id="vehiclearea-content" class="row">
                        <div class="col-lg-4 col-lg-4 col-sm-6 col-xs-12">
                            <div class="car-bx car-bx-2">
                                <a class="hover01" href="/vehicle/4354">
                                    <figure><img
                                            src="/images/vehicles/121671270406.jpeg"
                                            class="car-bx-img-top" alt="..."></figure>
                                    <div class="car-bx-body">
                                        <h2 class="car-bx-title">
                                            Volkswagen Golf GTI
                                        </h2>
                                        <p class="car-bx-price">
                                            <i class="fas fa-shekel-sign"></i>&nbsp;&nbsp;195000
                                        </p>
                                        <div class="row">
                                            <div class="col-4 min-box text-center mb-3">
                                                <div class="aut car-sb-img"></div>
                                                <label>أوتماتيك</label>
                                            </div>
                                            <div class="col-4 min-box text-center mb-3">
                                                <div class="fuel car-sb-img"></div>
                                                <label>بنزين</label>
                                            </div>
                                            <div class="col-4 min-box text-center mb-3">
                                                <div class="power car-sb-img"></div>
                                                <label>2000</label>
                                            </div>
                                            <div class="col-4 min-box text-center mb-3">
                                                <div class="hp car-sb-img"></div>
                                                <label>245 </label>
                                            </div>
                                            <div class="col-4 min-box text-center mb-3">
                                                <div class="date car-sb-img"></div>
                                                <label>2020</label>
                                            </div>
                                            <div class="col-4 min-box text-center mb-3">
                                                <div class="distance car-sb-img"></div>
                                                <label>11000</label>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <div data-id="4354" data-img="/storage/vehicles/121671270406.jpeg" data-name=" "
                                     class="compareVehicle btn btn-sm btn-compare mb-2 text-white">مقارنة
                                </div>
                                <a href="/vehicle/4354">
                                    <div class="car-more-details"> عرض المزيد
                                        <i class="fas fa-arrow-left"></i>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-lg-4 col-sm-6 col-xs-12">
                            <div class="car-bx car-bx-2">
                                <a class="hover01" href="/vehicle/4205">
                                    <figure><img
                                            src="/images/vehicles/201670093560.jpeg"
                                            class="car-bx-img-top" alt="..."></figure>
                                    <div class="car-bx-body">
                                        <h2 class="car-bx-title">
                                            Peugeot Rifter
                                        </h2>
                                        <p class="car-bx-price">
                                            <i class="fas fa-shekel-sign"></i>&nbsp;&nbsp;97000
                                        </p>
                                        <div class="row">
                                            <div class="col-4 min-box text-center mb-3">
                                                <div class="man car-sb-img"></div>
                                                <label>يدوي</label>
                                            </div>
                                            <div class="col-4 min-box text-center mb-3">
                                                <div class="fuel car-sb-img"></div>
                                                <label>ديزل</label>
                                            </div>
                                            <div class="col-4 min-box text-center mb-3">
                                                <div class="power car-sb-img"></div>
                                                <label>1500</label>
                                            </div>
                                            <div class="col-4 min-box text-center mb-3">
                                                <div class="hp car-sb-img"></div>
                                                <label>130 </label>
                                            </div>
                                            <div class="col-4 min-box text-center mb-3">
                                                <div class="date car-sb-img"></div>
                                                <label>2019</label>
                                            </div>
                                            <div class="col-4 min-box text-center mb-3">
                                                <div class="distance car-sb-img"></div>
                                                <label>62000</label>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <div data-id="4205" data-img="/storage/vehicles/201670093560.jpeg" data-name=" "
                                     class="compareVehicle btn btn-sm btn-compare mb-2 text-white">مقارنة
                                </div>
                                <a href="/vehicle/4205">
                                    <div class="car-more-details"> عرض المزيد
                                        <i class="fas fa-arrow-left"></i>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-lg-4 col-sm-6 col-xs-12">
                            <div class="car-bx car-bx-2">
                                <a class="hover01" href="/vehicle/4183">
                                    <figure><img
                                            src="/images/vehicles/181670076128_1.jpg"
                                            class="car-bx-img-top" alt="..."></figure>
                                    <div class="car-bx-body">
                                        <h2 class="car-bx-title">
                                            Hyundai Elantra
                                        </h2>
                                        <p class="car-bx-price">
                                            <i class="fas fa-shekel-sign"></i>&nbsp;&nbsp;70000
                                        </p>
                                        <div class="row">
                                            <div class="col-4 min-box text-center mb-3">
                                                <div class="aut car-sb-img"></div>
                                                <label>أوتماتيك</label>
                                            </div>
                                            <div class="col-4 min-box text-center mb-3">
                                                <div class="fuel car-sb-img"></div>
                                                <label>بنزين</label>
                                            </div>
                                            <div class="col-4 min-box text-center mb-3">
                                                <div class="power car-sb-img"></div>
                                                <label>1600</label>
                                            </div>
                                            <div class="col-4 min-box text-center mb-3">
                                                <div class="hp car-sb-img"></div>
                                                <label>128 </label>
                                            </div>
                                            <div class="col-4 min-box text-center mb-3">
                                                <div class="date car-sb-img"></div>
                                                <label>2016</label>
                                            </div>
                                            <div class="col-4 min-box text-center mb-3">
                                                <div class="distance car-sb-img"></div>
                                                <label>68000</label>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <div data-id="4183" data-img="/storage/vehicles/181670076128_1.jpg" data-name=" "
                                     class="compareVehicle btn btn-sm btn-compare mb-2 text-white">مقارنة
                                </div>
                                <a href="/vehicle/4183">
                                    <div class="car-more-details"> عرض المزيد
                                        <i class="fas fa-arrow-left"></i>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-lg-4 col-sm-6 col-xs-12">
                            <div class="car-bx car-bx-2">
                                <a class="hover01" href="/vehicle/4182">
                                    <figure><img
                                            src="/images/vehicles/101670071013.jpeg"
                                            class="car-bx-img-top" alt="..."></figure>
                                    <div class="car-bx-body">
                                        <h2 class="car-bx-title">
                                            Hyundai Accent
                                        </h2>
                                        <p class="car-bx-price">
                                            <i class="fas fa-shekel-sign"></i>&nbsp;&nbsp;115000
                                        </p>
                                        <div class="row">
                                            <div class="col-4 min-box text-center mb-3">
                                                <div class="aut car-sb-img"></div>
                                                <label>أوتماتيك</label>
                                            </div>
                                            <div class="col-4 min-box text-center mb-3">
                                                <div class="fuel car-sb-img"></div>
                                                <label>بنزين</label>
                                            </div>
                                            <div class="col-4 min-box text-center mb-3">
                                                <div class="power car-sb-img"></div>
                                                <label>1600</label>
                                            </div>
                                            <div class="col-4 min-box text-center mb-3">
                                                <div class="hp car-sb-img"></div>
                                                <label>120 </label>
                                            </div>
                                            <div class="col-4 min-box text-center mb-3">
                                                <div class="date car-sb-img"></div>
                                                <label>2022</label>
                                            </div>
                                            <div class="col-4 min-box text-center mb-3">
                                                <div class="distance car-sb-img"></div>
                                                <label>0</label>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <div data-id="4182" data-img="/storage/vehicles/101670071013.jpeg" data-name=" "
                                     class="compareVehicle btn btn-sm btn-compare mb-2 text-white">مقارنة
                                </div>
                                <a href="/vehicle/4182">
                                    <div class="car-more-details"> عرض المزيد
                                        <i class="fas fa-arrow-left"></i>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="clear"></div>
                    <nav>
                        <ul class="pagination">
                            <li class="page-item disabled" aria-disabled="true" aria-label="&laquo; Previous">
                                <span class="page-link" aria-hidden="true">&lsaquo;</span>
                            </li>
                            <li class="page-item active" aria-current="page"><span class="page-link">1</span></li>
                            <li class="page-item"><a class="page-link"
                                                     href="">2</a></li>
                            <li class="page-item"><a class="page-link"
                                                     href="">3</a></li>
                            <li class="page-item"><a class="page-link"
                                                     href="">4</a></li>
                            <li class="page-item disabled" aria-disabled="true"><span class="page-link">...</span></li>
                            <li class="page-item"><a class="page-link"
                                                     href="">9</a></li>
                            <li class="page-item"><a class="page-link" href="">10</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="" rel="next"
                                   aria-label="Next &raquo;">&rsaquo;</a>
                            </li>
                        </ul>
                    </nav>

                </div>
            </div>
        </div>
    </div>

</x-front>
