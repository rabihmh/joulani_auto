<x-front title="حسابي">
    @push('css')
        <style>
            td.image-cell {
                width: 100px;
                height: 100px; /* set a fixed height */
                vertical-align: middle; /* center the image vertically */
            }

            td.image-cell img {
                max-width: 100%;
                max-height: 100%; /* set the image to fill the available height */
                object-fit: contain;
            }

        </style>
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
        <div class="row mb-2">
            <div class="col-4">
                <div class="d-grid gap-2">
                    <a href="/userDashboard" class="btn btn-sm  btn-outline-secondary ">سياراتي</a>
                </div>
            </div>
            <div class="col-4">
                <div class="d-grid gap-2">
                    <a href="#" class="btn btn-sm  btn-outline-secondary ">معلومات
                        الحساب</a>
                </div>
            </div>
            @can('vehicles.create')
                <div class="col-4">
                    <div class="d-grid gap-2">
                        <a href="{{route('front.vehicles.create')}}" class="btn btn-sm btn-outline-secondary">إضافة
                            مركبة</a>
                    </div>
                </div>
            @endcan
        </div>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="bg-blue text-white">
                <tr>
                    <th>#</th>
                    <th>صوره</th>
                    <th>إسم السيارة</th>
                    <th>تعديل</th>
                    <th>حذف</th>
                </tr>
                </thead>
                <tbody>
                @foreach($vehicles as $vehicle)
                    <tr>
                        <td class="number-cell">{{$loop->iteration}}</td>
                        <td class="image-cell"><img src="{{asset('storage/'.$vehicle->main_image)}}"
                                                    class="vehicle-image"></td>
                        <td>{{$vehicle->vehicle_name}}</td>
                        @can('vehicles.edit')
                            <td><a class="btn btn-primary"
                                   href="{{route('front.vehicles.edit',$vehicle->id)}}">تعديل</a>
                            </td>
                        @endcan
                        @can('vehicles.delete')
                            <td><a class="btn btn-danger" id="delete-button" data-id="{{$vehicle->id}}">حذف</a></td>
                        @endcan
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @push('js')
        <script>
            let csrf = "{{csrf_token()}}"
            let d_btn = document.querySelectorAll('#delete-button');
            d_btn.forEach(function (btn) {
                btn.addEventListener('click', function () {
                    let id = btn.getAttribute('data-id');
                    displayAlert(id, csrf);
                })
            })
        </script>

    @endpush
</x-front>
