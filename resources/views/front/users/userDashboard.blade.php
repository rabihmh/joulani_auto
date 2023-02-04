<x-front title="حسابي">
    <x-slot:breadcrumbs>
        <div class="container">
            <span typeof="v:Breadcrumb"><a property="v:title" rel="v:url"
                                           href="/">الرئيسية</a></span>
            <span class="sep">»</span>
            <span typeof="v:Breadcrumb"><a property="v:title" rel="v:url"
                                           href="https://autoanddrive.com/vehicles">المركبات</a></span>
            <span class="sep">»</span>
            <span typeof="v:Breadcrumb"><span property="v:title" class="current">لوحة التحكم</span></span>
        </div>
    </x-slot:breadcrumbs>
    <div class="container mt-2 mb-5">
        <div class="row mb-2">
            <div class="col-4">
                <div class="d-grid gap-2">
                    <a href="https://autoanddrive.com/myCars" class="btn btn-sm  btn-outline-secondary ">سياراتي</a>
                </div>
            </div>
            <div class="col-4">
                <div class="d-grid gap-2">
                    <a href="https://autoanddrive.com/userprofile" class="btn btn-sm  btn-outline-secondary ">معلومات
                        الحساب</a>
                </div>
            </div>
            <div class="col-4">
                <div class="d-grid gap-2">
                    <a href="https://autoanddrive.com/add" class="btn btn-sm btn-outline-secondary">إضافة مركبة</a>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="bg-blue text-white">
                <th>#</th>
                <th>صوره</th>
                <th>إسم السيارة</th>
                <th>تعديل</th>
                <th>حذف</th>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>

    <div id="combareBox">
        <div class="page_divider_title">مقارنة المركبات<span class="float-start close-bx"><i
                    class="fas fa-times-circle"></i></span></div>
        <div class="row" id="combar-bx-show">
        </div>
        <a href="#" id="hrefCompare" class="btn btn-danger btn-sm float-start ml-2 mt-2">مقارنة</a>
    </div>
</x-front>
