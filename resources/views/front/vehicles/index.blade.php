<x-front title="المركبات | جولاني أوتو">
    <x-slot:breadcrumbs>
        <div class="container">
            <span typeof="v:Breadcrumb"><a property="v:title" rel="v:url" href="/">الرئيسية</a></span>
            <span class="sep">»</span>
            <span typeof="v:Breadcrumb"><span property="v:title" class="current">المركبات</span></span>
            <div class="btn-danger showSidebar">
                <i class="fas fa-search"></i>
            </div>
        </div>
    </x-slot:breadcrumbs>
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
                            @foreach($mades as $made)
                                <option value="{{$made->id}}">
                                    {{$made->name}}
                                </option>
                            @endforeach
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
                                <input id="price" type="text" class="span2" value="3000" data-slider-min="1000"
                                       data-slider-max="100000" data-slider-step="500"
                                       data-slider-value="[1000,100000]"/>
                                <div class="selector-value">
                                    <span class="float-start mt-2" id="min-price">1000&nbsp;<i
                                            class="fas fa-dollar-sign"></i></span>
                                    <span id="max-price">100000 &nbsp;<i class="fas fa-dollar-sign"></i></span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-header text-white bg-blue">نوع الوقود</div>
                    <div class="card-body">
                        <div data-id="bin" class="fuelType btn btn-outline-secondary btn-sm mb-2">بنزين</div>
                        <div data-id="des" class="fuelType btn btn-outline-secondary btn-sm mb-2">ديزل</div>
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
                        <div data-id="sau" class="gearType btn btn-outline-secondary btn-sm mb-2">ستيبترونيك</div>
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
                        @foreach($vehicles as $vehicle)
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
                                                    <label>{{$vehicle->hp}} </label>
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
                                    <div data-id="{{$vehicle->id}}"
                                         data-img="{{asset('storage/'.$vehicle->main_image)}}" data-name=" "
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
                    <div class="clear"></div>
                    <nav class="pagination">
                        {{--                        <ul class="pagination">--}}
                        {{--                            <li class="page-item disabled" aria-disabled="true" aria-label="&laquo; Previous">--}}
                        {{--                                <span class="page-link" aria-hidden="true">&lsaquo;</span>--}}
                        {{--                            </li>--}}
                        {{--                            <li class="page-item active" aria-current="page"><span class="page-link">1</span></li>--}}
                        {{--                            <li class="page-item"><a class="page-link"--}}
                        {{--                                                     href="">2</a></li>--}}
                        {{--                            <li class="page-item"><a class="page-link"--}}
                        {{--                                                     href="">3</a></li>--}}
                        {{--                            <li class="page-item"><a class="page-link"--}}
                        {{--                                                     href="">4</a></li>--}}
                        {{--                            <li class="page-item disabled" aria-disabled="true"><span class="page-link">...</span></li>--}}
                        {{--                            <li class="page-item"><a class="page-link"--}}
                        {{--                                                     href="">9</a></li>--}}
                        {{--                            <li class="page-item"><a class="page-link" href="">10</a>--}}
                        {{--                            </li>--}}
                        {{--                            <li class="page-item">--}}
                        {{--                                <a class="page-link" href="" rel="next"--}}
                        {{--                                   aria-label="Next &raquo;">&rsaquo;</a>--}}
                        {{--                            </li>--}}
                        {{--                        </ul>--}}
                        {{$vehicles->links()}}
                    </nav>

                </div>
            </div>
        </div>
    </div>

</x-front>
