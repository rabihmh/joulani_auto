@extends('layouts.front.index')
@section('content')
    <div class="container">
        <div class="card m-auto mt-5 mb-5">
            <div class="card-header bg-blue text-white">تسجيل الدخول</div>
            <div class="card-body">
                <form method="POST" action="{{route('login')}}">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">البريد الإلكتروني</label>
                        <input value="" name="email" type="email" class="form-control" id="exampleInputEmail1"
                               aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">كلمة المرور</label>
                        <input name="password" type="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="d-grid gap-2 col-12 mx-auto">
                        <button type="submit" class="btn bg-blue text-white btn-block">تسجيل الدخول</button>
                    </div>
                </form>
            </div>
            <div class="card-footer center">
                <span class="btn btn-light text-danger">ألا تمتلك حساب</span>
                <div>
                    <a href="{{route('register')}}" class="btn-small btn btn-secondary">إنشاء حساب شخصي</a>
                    <a href="/register/seller" class="btn-small btn btn-secondary">إنشاء حساب تاجر</a>
                </div>
            </div>
        </div>
    </div>
@endsection
