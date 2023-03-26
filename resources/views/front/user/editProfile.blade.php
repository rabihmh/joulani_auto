<x-front title="لوحة التحكم جولاني أوتو  Joulani Auto |">
    <x-slot:breadcrumbs>
        <div class="container">
            <span typeof="v:Breadcrumb"><a property="v:title" rel="v:url" href="/">الرئيسية</a></span>
            <span class="sep">»</span>
            <span typeof="v:Breadcrumb"><span property="v:title" class="current">تعديل الحساب</span></span>
        </div>
    </x-slot:breadcrumbs>
    <div class="container">
        <x-mini-nav/>
        <div class="card m-auto  mb-5">
            <div class="card-header bg-dark text-white">
                تعديل الحساب
            </div>
            <div class="card-body">
                <form method="POST"
                      action="">
                    @csrf
                    @method('PUT')
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <td> إسم
                                    المعرض
                                </td>
                                <td>
                                    <input name="name"
                                           value=" Rabih Mahmoud "
                                           type="text" class="form-control"
                                           placeholder=" إسم المعرض ">
                                    <input type="hidden" name="group" value=" se ">
                                </td>
                            </tr>
                            <tr>
                                <td> رقم
                                    المعرض
                                </td>
                                <td><input name="mobile"
                                           value=" +96176318226 "
                                           type="tel" class="form-control"
                                           placeholder=" رقم المعرض ">
                                </td>
                            </tr>
                            <x-regions/>
                            <tr>
                                <td>البريد الإلكتروني</td>
                                <td><input
                                        value=" rabihmahmoud772@gmail.com "
                                        name="email" type="email" class="form-control"
                                        placeholder="البريد الإلكتروني"></td>
                            </tr>
                            <tr>
                                <td>كلمة المرور</td>
                                <td><input name="password" type="password" class="form-control"
                                           placeholder="كلمة المرور">
                                </td>
                            </tr>
                            <tr>
                                <td>تأكيد كلمة المرور</td>
                                <td>
                                    <input name="password_confirm" type="password" class="form-control"
                                           placeholder="تأكيد كلمة المرور">
                                    <input type="hidden" name="oldPassword" value="rabihmahmoud772@gmail.com"/>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="d-grid gap-2 col-12 mx-auto">
                        <button type="submit" class="btn bg-blue text-white btn-block">
                            تعديل
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-front>
