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
        <ul>
            @foreach($errors->updateProfileInformation->all() as $error)
                <li class=" alert alert-danger">{{$error}}</li>
            @endforeach
        </ul>
        {{--        @error('name','updateProfileInformation')--}}
        {{--        <span class="alert alert-danger">{{$message}}</span>--}}
        {{--        @enderror--}}

        <div class="card m-auto  mb-5">
            <div class="card-header bg-dark text-white">
                تعديل الحساب
            </div>
            <div class="card-body">
                <form method="POST"
                      action="{{route('user-profile-information.update')}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <td>الاسم</td>
                                <td>
                                    <input name="name"
                                           value="{{$user->name}}"
                                           type="text" class="form-control"
                                           placeholder="الاسم">
                                </td>
                            </tr>
                            <tr>
                                <td>رقم الهاتف</td>
                                <td>
                                    <input name="phone"
                                           value="{{$user->phone}}"
                                           type="text" class="form-control"
                                           placeholder="رقم الهاتف">
                                </td>
                            </tr>
                            <tr>
                                <td>البريد الإلكتروني</td>
                                <td><input
                                        value="{{old($user->email)}}"
                                        name="email" type="email" class="form-control"
                                        placeholder="البريد الإلكتروني"></td>
                            </tr>
                            <tr>
                                <td>كلمة المرور</td>
                                <td>
                                    <input name="password" type="password" class="form-control"
                                           placeholder="كلمة المرور">
                                </td>
                            </tr>
                            <tr>
                                <td>تأكيد كلمة المرور</td>
                                <td>
                                    <input name="password_confirmation" type="password" class="form-control"
                                           placeholder="تأكيد كلمة المرور">
                                </td>
                            </tr>
                            @if($user->seller!==null)
                                <tr>
                                    <td> إسم
                                        المعرض
                                    </td>
                                    <td>
                                        <input name="seller_name"
                                               value="{{old('seller_name',$user->seller->seller_name)}}"
                                               type="text" class="form-control"
                                               placeholder=" إسم المعرض ">
                                    </td>
                                </tr>
                                <tr>
                                    <td> رقم
                                        المعرض
                                    </td>
                                    <td><input name="seller_mobile"
                                               value="{{old('seller_mobile',$user->seller->seller_mobile)}}"
                                               type="tel" class="form-control"
                                               placeholder=" رقم المعرض ">
                                    </td>
                                </tr>
                                <x-regions :selectedRegionId="$user->seller->region_id"/>
                                <tr>
                                    <td>العنوان</td>
                                    <td>
                                        <input
                                            value="{{old('seller_address',$user->seller->seller_address)}}"
                                            name="seller_address"
                                            type="text"
                                            class="form-control"
                                            placeholder="العنوان"
                                        />
                                    </td>
                                </tr>
                                <tr>
                                    <td>صوره للمعرض</td>
                                    <td>
                                        <label class="custom-file">
                                            <input
                                                type="file"
                                                id="file"
                                                class="custom-file-input"
                                            />
                                            <span
                                                class="custom-file-control custom-file-control-primary"
                                            ></span>
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <div id="success">
                                            <label></label>
                                            <div class="progress">
                                                <div class="progress-bar bg-success" role="progressbar"
                                                     style="width: 0%"
                                                     aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <img src="{{asset("storage/{$user->seller->image}")}}" width="100"
                                                 height="100" class="img-thumbnail old_image">
                                        </div>
                                        <input type="hidden" value="{{$user->seller->image}}" name="image"
                                               class="oimg">
                                    </td>
                                </tr>
                            @endif
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
    @push('js')
        <script>
            $('#file').change(function () {
                var error_images = '';
                var form_data = new FormData();
                var files = $('#file')[0].files;

                for (var i = 0; i < files.length; i++) {
                    var name = document.getElementById("file").files[0].name;
                    var ext = name.split('.').pop().toLowerCase();
                    if (jQuery.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) === -1) {
                        error_images += '<p>Invalid ' + i + ' File</p>';
                    }
                    var oFReader = new FileReader();
                    oFReader.readAsDataURL(document.getElementById("file").files[i]);
                    var f = document.getElementById("file").files[i];
                    var fsize = f.size || f.fileSize;
                    if (fsize > 4000000) {
                        error_images += '<p>' + i + ' حجم الصورة كبيرة جدا</p>';
                    } else {
                        form_data.append("file[]", document.getElementById('file').files[i]);
                    }
                }

                if (error_images === '') {
                    $('file').hide();
                    $.ajax({
                        xhr: function () {
                            var xhr = new window.XMLHttpRequest();
                            xhr.upload.addEventListener("progress", function (evt) {
                                if (evt.lengthComputable) {
                                    var percentComplete = ((evt.loaded / evt.total) * 100);
                                    $(".progress-bar").width(percentComplete + '%');
                                    $(".progress-bar").html(percentComplete + '%');
                                }
                            }, false);
                            return xhr;
                        },
                        headers: {
                            'X-CSRF-TOKEN': "{{csrf_token()}}"
                        },
                        url: "{{route('upload','sellers')}}",
                        method: "POST",
                        data: form_data,
                        contentType: false,
                        cache: false,
                        processData: false,
                        beforeSend: function () {
                            $('#success label').html('' +
                                '<div class="alert alert-success">الرجاء الإنتظار جاري تحميل الصور.....</div>');
                        },
                        complete: function () {
                            $('#success label').html('');
                        },

                        success: function (data) {
                            window.setTimeout(function () {
                                var val = $('.oimg').val();
                                if (data) {
                                    $('.old_image').hide();
                                    for (var i = 0; i < data.length; i++) {

                                        $('#success').append('<img src="{{asset('storage')}}/' + data[i] + '" width="100" height="100" class="img-thumbnail" />');
                                    }
                                    $('.oimg').val(data);
                                }
                            }, 600);
                            // $('.progress-bar').css('width', '0%');
                        }
                    });
                } else {
                    $('#success label').html(error_images);
                    // $('#multiple_files').val('');
                    // $('#success').html("<span class='text-danger'>" + error_images + "</span>");
                    // return false;
                }

            });

        </script>
    @endpush
</x-front>
