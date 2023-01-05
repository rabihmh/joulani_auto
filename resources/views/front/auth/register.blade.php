@extends('layouts.front.index')
@section('content')
    <div class="container">
        <div class="card m-auto mb-5">
            <div class="card-header bg-dark text-white">إنشاء حساب شخصي</div>
            <div class="card-body">
                @if($errors)
                    @foreach($errors->all() as $error)
                        {{$error}}
                    @endforeach
                @endif
                <form method="POST" action="{{route('register')}}">
                    @csrf
                    <div class="table-responsive">
                        <table class="table table-bordered">

                            <tr>
                                <td>الإسم</td>
                                <td>
                                    <input
                                        name="name"
                                        value=""
                                        type="text"
                                        class="form-control"
                                        placeholder=" الإسم "
                                    />
                                </td>
                            </tr>
                            <tr>
                                <td>رقم الموبايل</td>
                                <td>
                                    <input
                                        name="phone"
                                        value=""
                                        type="tel"
                                        class="form-control"
                                        placeholder=" رقم الموبايل "
                                    />
                                </td>
                            </tr>
                            <x-regions/>
                            <tr>
                                <td>البريد الإلكتروني</td>
                                <td>
                                    <input
                                        value=""
                                        name="email"
                                        type="email"
                                        class="form-control"
                                        placeholder="البريد الإلكتروني"
                                    />
                                </td>
                            </tr>
                            <tr>
                                <td>كلمة المرور</td>
                                <td>
                                    <input
                                        name="password"
                                        type="password"
                                        class="form-control"
                                        placeholder="كلمة المرور"
                                    />
                                </td>
                            </tr>
                            <tr>
                                <td>تأكيد كلمة المرور</td>
                                <td>
                                    <input
                                        name="password_confirm"
                                        type="password"
                                        class="form-control"
                                        placeholder="تأكيد كلمة المرور"
                                    />
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="d-grid gap-2 col-12 mx-auto">
                        <button type="submit" class="btn bg-blue text-white btn-block">
                            إنشاء حساب
                        </button>
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <span class="btn btn-light text-danger"> تمتلك حساب</span>
                <div class="flex">
                    <a href="{{route('login')}}" class="btn-small btn btn-secondary">تسجيل الدخول</a>
                </div>
            </div>
        </div>
    </div>
@endsection
