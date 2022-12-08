<!doctype html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <title>Auto and Drive</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
    <title>أوتو أند درايف</title>
    @yield('css')

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
            <a href="https://www.autoanddrive.com" class="">الرئيسية</a>
            <a href="https://www.autoanddrive.com/vehicles" class="">البحث</a>
            <a href="https://www.autoanddrive.com/get_app" class="">تحميل التطبيق</a>
            <a href="https://www.autoanddrive.com/seller" class="">معارض السيارات</a>
            <a href="https://www.autoanddrive.com/contact" class="">إتصل بنا</a>
            {{--            <a href="https://www.autoanddrive.com/add" class=" active ">إضافة مركبة</a>--}}
            {{--            <a href="https://www.autoanddrive.com/userdashboard" class="">حسابي</a>--}}
            <a href="https://www.autoanddrive.com/admin/logout"
               onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                تسجيل الدخول
            </a>
            <form id="frm-logout" action="https://www.autoanddrive.com/logout" method="POST" style="display: none;">
                <input type="hidden" name="_token" value="sCqI4SS9Tc3yZWnJGOptjwM36m1DpBoFWMD5dCFV">
            </form>
        </nav>
        <div class="mobile-social mt-5 flex">
            <a href="https://www.facebook.com/Auto-and-Drive-102747047769028/" target="_blank" class="facebook"><i
                    class="fab fa-facebook "></i></a>
            <a href="https://api.whatsapp.com/send?phone=+970597557799" target="_blank" class="whatsapp"><i
                    class="fab fa-whatsapp"></i></a>
            <a href="https://wa.me/0597557799" target="_blank" class="instagram"><i class="fas fa-phone-volume"></i></a>
            <a href="https://wa.me/info@autoanddrive.com" target="_blank" class="googleplus"><i
                    class="far fa-envelope"></i></a>
        </div>
        <div class="location mt-5">
            <i class="fas fa-map-marker-alt"></i> &nbsp;الخليل - جسر حلحول - بجانب مركز الشرطة
        </div>
    </div>
    <div class="mobileLogo">
        <a href="/">
            <img src="{{asset('Front/img/logo.png')}}" alt="أوتو أند درايف" title="أوتو أند درايف" class="mr-3"/>
        </a>
    </div>
    <header id="header">
        <div class="container">
            <nav id="nav">
                <a href="https://www.autoanddrive.com" class="">الرئيسية</a>
                <a href="https://www.autoanddrive.com/vehicles" class="">البحث</a>
                <a href="https://www.autoanddrive.com/get_app" class="">تحميل التطبيق</a>
                <a href="https://www.autoanddrive.com/seller" class="">معارض السيارات</a>
                <a href="https://www.autoanddrive.com/contact" class="">إتصل بنا</a>
                <a href="https://www.autoanddrive.com/contact" class="">تسجيل الدخول</a>
                {{--                <a href="https://www.autoanddrive.com/add" class=" active ">إضافة مركبة</a>--}}
                {{--                <a href="https://www.autoanddrive.com/userdashboard" class="">حسابي</a>--}}
                {{--                <a href="https://www.autoanddrive.com/admin/logout"--}}
                {{--                   onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">--}}
                {{--                    تسجيل الخروج--}}
                {{--                </a>--}}
                <form id="frm-logout" action="https://www.autoanddrive.com/logout" method="POST" style="display: none;">
                    <input type="hidden" name="_token" value="sCqI4SS9Tc3yZWnJGOptjwM36m1DpBoFWMD5dCFV">
                </form>
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
        @yield('breadcrumbs')
    </div>
    @yield('content')
    <footer class="bg-blue">
        <div class="container p-3">
            <div class="row">
                <div class="col-lg-8 col-lg-8 col-sm-12 col-xs-12 text-center">
                    <nav id="nav">
                        <a href="https://www.autoanddrive.com" class="">الرئيسية</a>
                        <a href="https://www.autoanddrive.com/vehicles" class="">البحث</a>
                        <a href="https://www.autoanddrive.com/get_app" class="">تحميل التطبيق</a>
                        <a href="https://www.autoanddrive.com/seller" class="">معارض السيارات</a>
                        <a href="https://www.autoanddrive.com/contact" class="">إتصل بنا</a>
                        {{--                        <a href="https://www.autoanddrive.com/add" class=" active ">إضافة مركبة</a>--}}
                        {{--                        <a href="https://www.autoanddrive.com/userdashboard" class="">حسابي</a>--}}
                        <a href="https://www.autoanddrive.com/userdashboard" class="">تسجيل الدخول</a>
                        {{--                        <a href="https://www.autoanddrive.com/admin/logout" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">--}}
                        {{--                            تسجيل الخروج--}}
                        {{--                        </a>--}}
                        <form id="frm-logout" action="https://www.autoanddrive.com/logout" method="POST"
                              style="display: none;">
                            <input type="hidden" name="_token" value="sCqI4SS9Tc3yZWnJGOptjwM36m1DpBoFWMD5dCFV">
                        </form>
                    </nav>
                </div>
                <div class="col-lg-4 col-lg-4 col-sm-12 col-xs-12">
                    <div class="row mt-4">
                        <div class="row mt-4">
                            <div class="col-6 text-center">
                                <a href="https://apps.apple.com/us/app/auto-and-drive/id1519804560#?platform=iphone">
                                    <img class="appicon" src="{{asset('Front/images/icons/app-store-badge.png')}}"
                                         alt="auto and drive" title="auto and drive"/>
                                </a>
                            </div>
                            <div class="col-6 text-center">
                                <a href="https://play.google.com/store/apps/details?id=auto.n.drive">
                                    <img class="appicon" src="{{asset('Front/images/icons/playstore.png')}}"
                                         alt="auto and drive" title="auto and drive"/>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 center text-white mt-2 mb-2">
                    جميع الحقوق محفوظة لموقع أوتو أند درايف @ 2022
                </div>
            </div>
        </div>
    </footer>
    <div class="mb-mobile"></div>
    <div class="mobile-footer p-1">
        <div class="row mt-1">
            <div class="col-6 text-center">
                <a href="https://apps.apple.com/us/app/auto-and-drive/id1519804560#?platform=iphone">
                    <img class="appicon" src="{{asset('Front/images/icons/app-store-badge.png')}}" alt="auto and drive"
                         title="auto and drive"/>
                </a>
            </div>
            <div class="col-6 text-center">
                <a href="https://play.google.com/store/apps/details?id=auto.n.drive">
                    <img class="appicon" src="{{asset('Front/images/icons/playstore.png')}}" alt="auto and drive"
                         title="auto and drive"/>
                </a>
            </div>
        </div>
        <div class="col-12 center text-white mt-1 mb-1">
            جميع الحقوق محفوظة لموقع أوتو أند درايف @ 2022
        </div>
    </div>


    <script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
            integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
            integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
            crossorigin="anonymous"></script>
    <script src="{{URL::asset('Front/js/swiper.min.js')}}"></script>
    <script src="{{asset('Front/js/jquery.sumoselect.min.js')}}"></script>
    <script src="{{asset('Front/js/fontawesome.min.js')}}"></script>
    <script src="{{asset('Front/js/all.min.js')}}"></script>
    <script src="{{asset('Front/js/bootstrap-slider.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.umd.js"></script>
    <script src="{{asset('Front/js/myCode.js')}}"></script>
    @yield('js')

</body>

</html>
