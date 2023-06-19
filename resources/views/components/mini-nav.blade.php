<div class="row mb-2">
    <div class="col-3">
        <div class="d-grid gap-2">
            <a href="{{route('front.user.profile')}}"
               class="btn btn-sm {{\Illuminate\Support\Facades\Request::is('userDashboard/profile')?'btn-secondary':'btn-outline-secondary'}}">معلومات
                الحساب</a>
        </div>
    </div>
    <div class="col-3">
        <div class="d-grid gap-2">
            <a href="{{route('front.user.settings')}}"
               class="btn btn-sm {{\Illuminate\Support\Facades\Request::is('userDashboard/settings')?'btn-secondary':'btn-outline-secondary'}}">
                إعدادات الحساب</a>
        </div>
    </div>

    <div class="col-3">
        <div class="d-grid gap-2">
            <a href="{{route('front.user.vehicles')}}"
               class="btn btn-sm {{\Illuminate\Support\Facades\Request::is('userDashboard/vehicles')?'btn-secondary':'btn-outline-secondary'}}">سياراتي</a>
        </div>
    </div>
    <div class="col-3">
        <div class="d-grid gap-2">
            <a href="{{route('front.user.subscriptions')}}"
               class="btn btn-sm {{Request::is('userDashboard/subscriptions')?'btn-secondary':'btn-outline-secondary'}}">الاشتراكات</a>
        </div>
    </div>
</div>
