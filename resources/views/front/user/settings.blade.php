<x-front title="إعدادات الحساب">
    @push('css')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.css">

    @endpush
    <x-slot:breadcrumbs>
        <div class="container">
            <span typeof="v:Breadcrumb"><a property="v:title" rel="v:url"
                                           href="/">الرئيسية</a></span>
            <span class="sep">»</span>
            <span typeof="v:Breadcrumb"><a property="v:title" rel="v:url"
                                           href="{{route('front.vehicles.index')}}">المركبات</a></span>
            <span class="sep">»</span>
            <span typeof="v:Breadcrumb"><span property="v:title" class="current">لوحة التحكم</span></span>
        </div>
    </x-slot:breadcrumbs>
    <div class="container mt-2 mb-5">
        <x-mini-nav/>
        <div class="mt-4">
            <h3>إذا كنت ترغب في إضافة موقعك إلى المعرض الخاص بك، يرجى النقر على الزر أدناه.</h3>
            <p>السماح للموقع بالوصول إلى موقعك الحالي.</p>
            <button class="btn btn-primary" onclick="getLocation()">فعل</button>
        </div>
        <div class="mt-4">
            <h3> لمزيد من الخصوصية والأمان يمكنك تفعيل المصادقة الثنائية</h3>
            <h4> يمكنك تفعيل/إلغاء التفعيل <span>2FA</span></h4>
            <form action="{{route('two-factor.enable')}}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="title">
                        <h3>المصادقة الثنائية</h3>
                        <p>
                            يمكنك تفعيل /إلغاء التفعيل <span>2FA</span>
                        </p>
                    </div>
                    @if(session('status')=='two-factor-authentication-enabled')
                        <div class="mb-4 font-medium text-sm">
                            يرجى إكمال تكوين المصادقة الثنائية
                        </div>
                    @endif
                    <div class="button">
                        @if(!$user->two_factor_secret)
                            <button class="btn btn-primary" type="submit">تفعيل</button>
                        @else
                            <div >
                                {!!$user->twoFactorQrCodeSvg()!!}
{{--                                <h3>Recovery code</h3>--}}
{{--                                <ul>--}}
{{--                                    @foreach($user->recoveryCodes() as $code)--}}
{{--                                        <li>{{$code}}</li>--}}
{{--                                    @endforeach--}}
{{--                                </ul>--}}
                            </div>
                            @method('delete')
                            <button class="btn btn-danger mt-2" type="submit">إلغاء التفعيل</button>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>
    @push('js')

        <script>

            function getLocation() {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(success, fail);
                } else {
                    alert("Sorry, your browser does not support geolocation services.");
                }
            }

            function success(position) {
                let lat = position.coords.latitude;
                let long = position.coords.longitude
                addLocation(lat, long)
            }

            function fail() {
                // Could not obtain location
            }

            const addLocation = (lat, long) => {

                $.ajax({
                    url: "{{ route('front.sellers.location') }}",
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': "{{csrf_token()}}"
                    },
                    data: {
                        latitude: lat,
                        longitude: long
                    },
                    success: function (data) {
                        if (data != null) {
                            Swal.fire(
                                'تم اضافة احداثياتك الى الموقع',
                                '',
                                'success'
                            )
                        }
                    },
                    error: function (xhr, status, error) {
                        Swal.fire(
                            'حدث خطأ غير متوقع',
                            '',
                            'error'
                        )
                    }
                });
            }
        </script>

    @endpush
</x-front>
