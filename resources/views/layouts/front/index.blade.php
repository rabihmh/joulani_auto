<!doctype html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="description"
          content="جولاني أوتو هو موقع  لتجارة السيارات في لبنان يتضمن العديد من المميزات منها البحث بدون كتابة المواصفات والمقارنة بين المركبات">
    <meta name="keywords" content=" تطبيق لتجارة السيارات في لبنان.">
    {{--    <link rel="canonical" href="">--}}
    <meta property="og:description"
          content="جولاني أوتو هو موقع  لتجارة السيارات في لبنان يتضمن العديد من المميزات منها البحث بدون كتابة المواصفات والمقارنة بين المركبات">
    <meta property="og:title" content=" جولاني أوتو - Joulani Auto">
    <meta property="og:type" content="articles">
    {{--    <meta property="og:url" content="">--}}
    <meta property="og:image" content="/Front/img/logo.png">
    <meta name="twitter:title" content=" جولاني أوتو - Joulani Auto">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$title}}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
          integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="{{asset('Front/css/sumoselect.css')}}"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="{{asset('Front/css/bootstrap-slider.css')}}"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css"/>
    <link rel="stylesheet" href="{{asset('Front/css/style.css')}}"/>

    <meta name="csrf-token" content="sCqI4SS9Tc3yZWnJGOptjwM36m1DpBoFWMD5dCFV"/>
    <link rel="icon" type="image/x-icon" href="{{asset('Front/img/logo.png')}}">
    @stack('css')

</head>
<body>
    <span class="web-btn">
		<label class="line1"></label>
		<label class="line2"></label>
		<label class="line3"></label>
</span>
    <div id="menu">
        <nav class="mobileMenu">
            <a href="/" class="mobile-logo">
                <img src="{{asset('Front/images/icons/logo.ico')}}" alt="أوتو أند درايف" title="أوتو أند درايف"/>
            </a>
            <a href="" class="">الرئيسية</a>
            <a href="{{route('front.vehicles.index')}}" class="">البحث</a>
            <a href="" class="">معارض السيارات</a>
            <a href="" class="">إتصل بنا</a>
            @auth('web')
                <a href="{{route('front.vehicles.create')}}" class=" active ">إضافة مركبة</a>
                <a href="" class="">حسابي</a>
                <a href="#"
                   onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                    تسجيل الخروج
                </a>
                <form id="frm-logout" action="{{route('logout')}}" method="POST" style="display: none;">
                    @csrf
                </form>
            @else
                <a href="{{route('login')}}" class="">تسجيل الدخول</a>
            @endauth

        </nav>
        <div class="mobile-social mt-5 flex">
            <a href="" target="_blank" class="facebook"><i
                    class="fab fa-facebook "></i></a>
            <a href="" target="_blank" class="whatsapp"><i
                    class="fab fa-whatsapp"></i></a>
            <a href="" target="_blank" class="instagram"><i class="fas fa-phone-volume"></i></a>
            <a href="" target="_blank" class="googleplus"><i
                    class="far fa-envelope"></i></a>
        </div>
        <div class="location mt-5">
            <i class="fas fa-map-marker-alt"></i> &nbsp;عكار - المقيطع
        </div>
    </div>
    <div class="mobileLogo">
        <a href="/">
            <img src="{{asset('Front/img/logo.png')}}" alt="جولاني أوتو" title="جولاني أوتو" class="mr-3"/>
        </a>
    </div>
    <header id="header">
        <div class="container">
            <nav id="nav">
                <a href="/"
                   class="{{\Illuminate\Support\Facades\Request::is('/')?'active':''}}">الرئيسية</a>
                <a href="{{route('front.vehicles.index')}}" class="">البحث</a>
                <a href="{{route('front.sellers.index')}}" class="">معارض السيارات</a>
                <a href="" class="">إتصل بنا</a>
                @auth('web')
                    <a href="{{route('front.vehicles.create')}}">إضافة مركبة</a>
                    <a href="/my" class="">حسابي</a>

                    <a href="#"
                       onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                        تسجيل الخروج
                    </a>
                    <form id="frm-logout" action="{{route('logout')}}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @else
                    <a href="{{route('login')}}" class="">تسجيل الدخول</a>
                @endauth
            </nav>
            <div class="logo">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                    <path fill="#EDF0F4" fill-opacity="1"
                          d="M0,288L48,277.3C96,267,192,245,288,213.3C384,181,480,139,576,106.7C672,75,768,53,864,64C960,75,1056,117,1152,160C1248,203,1344,245,1392,266.7L1440,288L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
                </svg>
                <img src="{{asset('Front/img/logo.png')}}" alt="" title="" class="mr-3"/>
            </div>
            <div class="clear"></div>
        </div>
    </header>


    <div class="breadcrumbs pt-2" xmlns:v="http://rdf.data-vocabulary.org/#">
        {{$breadcrumbs??""}}
    </div>
    @include('layouts.flash-message')
    {{$slot}}
    <footer class="bg-blue">
        <div class="container p-3">
            <div class="row">
                {{--                <div class="col-lg-8 col-lg-8 col-sm-12 col-xs-12 text-center">--}}
                {{--                    <nav id="nav">--}}
                {{--                        <a href="/"--}}
                {{--                           class="{{\Illuminate\Support\Facades\Request::is('/')?'active':''}}">الرئيسية</a>--}}
                {{--                        <a href="" class="">البحث</a>--}}
                {{--                        <a href="" class="">معارض السيارات</a>--}}
                {{--                        <a href="" class="">إتصل بنا</a>--}}
                {{--                        @auth('web')--}}
                {{--                            <a href="{{route('front.vehicles.create')}}" class=" active ">إضافة مركبة</a>--}}
                {{--                            <a href="/my" class="">حسابي</a>--}}

                {{--                            <a href="#"--}}
                {{--                               onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">--}}
                {{--                                تسجيل الخروج--}}
                {{--                            </a>--}}
                {{--                            <form id="frm-logout" action="{{route('logout')}}" method="POST" style="display: none;">--}}
                {{--                                @csrf--}}
                {{--                            </form>--}}
                {{--                        @else--}}
                {{--                            <a href="{{route('login')}}" class="">تسجيل الدخول</a>--}}
                {{--                        @endauth--}}
                {{--                    </nav>--}}
                {{--                </div>--}}
                <div class="col-12 center text-white mt-2 mb-2">
                    جميع الحقوق محفوظة لموقع جولاني أوتو @ 2022
                </div>
            </div>
        </div>
    </footer>
    <div class="mobile-footer p-1">
        <div class="col-12 center text-white mt-1 mb-1">
            جميع الحقوق محفوظة لموقع أوتو أند درايف @ 2022
        </div>
    </div>


    {{--    <script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>--}}
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
            integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
            integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
            integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
            crossorigin="anonymous"></script>
    <script src="{{asset('Front/js/swiper.min.js')}}"></script>
    <script src="{{asset('Front/js/jquery.sumoselect.min.js')}}"></script>
    <script src="{{asset('Front/js/fontawesome.min.js')}}"></script>
    <script src="{{asset('Front/js/all.min.js')}}"></script>
    <script src="{{asset('Front/js/bootstrap-slider.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.umd.js"></script>
    <script src="{{asset('Front/js/myCode.js')}}"></script>
    @stack('js')

</body>

</html>
