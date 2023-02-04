<x-front>
    <x-slot:breadcrumbs>
        <div class="container">
            <span typeof="v:Breadcrumb"><a property="v:title" rel="v:url" href="/">الرئيسية</a></span>
            <span class="sep">»</span>
            <span typeof="v:Breadcrumb"><span property="v:title" class="current">إتصل بنا</span></span>
        </div>
    </x-slot:breadcrumbs>

    <div class="container mt-2 mb-5">
        <div class="row contact-icon">
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 min-box text-center">
                <a href="" target="_blank"><i
                        class="fab fa-facebook"></i></a>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 min-box text-center">
                <i class="fas fa-fax"></i>
                <label>
                    +96176318226
                </label>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 min-box text-center">
                <i class="fab fa-whatsapp"></i>
                <label>
                    +96176318226
                </label>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 min-box text-center">
                <i class="fas fa-phone-volume"></i>
                <label>
                    <a href="tel:">+96106875257</a>
                </label>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 min-box text-center">
                <i class="far fa-envelope"></i>
                <label>
                    info@joulani-auto.com
                </label>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 min-box text-center">
                <i class="fas fa-map-marker-alt"></i>
                <label>
                    عكار المقيطع
                </label>
            </div>
        </div>
        <div class="card m-auto mt-5 contact-box">
            <div class="card-body contact-form">
                <div class="text-center mb-2">
                    <p>يمكنكم طلب سيارة ضمن ميزات معينة عن طريق تعبئة الحقول في الأسفل وإرسالها إلينا , وسيتم الرد على
                        طلبكم في أسرع وقت.</p>
                </div>
                <form method="POST" action="">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group mb-3">
                                <label for="exampleInputName" class="form-label">الإسم</label>
                                <input type="name" name="name" value="" class="form-control" id="exampleInputName"
                                       aria-describedby="nameHelp">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group mb-3">
                                <label for="exampleInputTel" class="form-label">رقم الهاتف</label>
                                <input type="tel" name="number" value="" class="form-control" id="exampleInputTel"
                                       aria-describedby="telHelp">
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label for="exampleFormControlTextarea1">نوع ومواصفات المركبة المطلوبة</label>
                            <textarea name="message" class="form-control" id="exampleFormControlTextarea1"
                                      rows="3"></textarea>
                        </div>
                        <div class="d-grid gap-2 col-12 mx-auto">
                            <button type="submit" class="btn btn-danger btn-block btn-contact">إرسال</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>

</x-front>
