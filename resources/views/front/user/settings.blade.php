<x-front title="إعدادات الحساب">

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
