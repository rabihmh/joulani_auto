<x-front title="اشتراكاتي">
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

    </div>

</x-front>
