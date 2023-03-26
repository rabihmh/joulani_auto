<x-front title="Home">
    <div class="premium-section">
        <div class="container">
            <section class="swiper-container art-blog-slider">
                <div class="section-title mb-4"><h3>مركبات مميزة</h3></div>
                <div class="swiper-wrapper">
                    @foreach($specials as $vehicle)
                        <a href="{{route('front.vehicles.show',$vehicle->id)}}"
                           class="car-premium-card swiper-slide hover01">
                            <figure><img
                                    src="{{asset('storage/'.$vehicle->main_image)}}"
                                    alt="BMW " title=" " width="" height=""/></figure>
                            <div class="car-premium-title">
                                <h2></h2>
                            </div>
                            <div class="car-premium-info flex bg-blue">
                                <div>
                                    <h3>{{$vehicle->price}}&nbsp;&nbsp;<i class="ml-1 fas fa-dollar-sign"></i></h3>
                                </div>
                                <div>
                                    <h3>{{__('vehicle.'.$vehicle->gear)}}&nbsp;<i class="ml-1 fas fa-cog"></i></h3>
                                </div>
                                <div>
                                    <h3>{{$vehicle->year_of_product}}&nbsp;&nbsp;<i
                                            class="ml-1 far fa-calendar-alt"></i></h3>
                                </div>
                            </div>
                            <div class="swiper-overlay"></div>
                        </a>
                    @endforeach
                </div>
                <div class="art-slider-navigation">
                    <div class="art-sn-left">
                        <div class="swiper-pagination"></div>
                    </div>
                    <div class="art-sn-right">
                        <div class="art-slider-nav-frame">
                            <div class="art-slider-nav art-blog-swiper-prev"><i class="fa fa-chevron-left"></i></div>
                            <div class="art-slider-nav art-blog-swiper-next"><i class="fa fa-chevron-right"></i></div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>


    <div class="car-box">
        <div class="container">
            <div class="row" id="vehiclearea">
                @foreach($vehicles as $vehicle)
                    <div class="col-lg-3 col-lg-3 col-sm-6 col-xs-12">
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
                            <div data-id="{{$vehicle->id}}" data-img="{{asset('storage/'.$vehicle->main_image)}}"
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
