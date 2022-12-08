$(document).ready(function() {

    // $('.socialAndroid').on('click', function() {
    //     window.location.href = "https://play.google.com/store/apps/details?id=auto.n.drive";
    // });
    //
    // $('.socialIOS').on('click', function() {
    //     window.location.href = "https://apps.apple.com/us/app/auto-and-drive/id1519804560#?platform=iphone";
    // });
    //
    // // $("#datepicker").datepicker( {
    // //     minViewMode: 2,
    // //     format: 'yyyy'
    // // });
    // // $("#datepicker1").datepicker( {
    // //     minViewMode: 2,
    // //     format: 'yyyy'
    // // });
    //
    // // show more content for vehicle
    // $(function(){
    //     $("#target").css("display","none");
    //     $(".toggle").click(function(){
    //         $("#target").slideToggle(1000);
    //         $("#toggleicon").toggleClass('fa fa-angle-up').toggleClass('fa fa-angle-down');
    //     })
    // })
    //
    // // show more content for edit vehicle
    // $(function(){
    //     $("#target-edit-vehicle").css("display","none");
    //     $(".toggle-edit").click(function(){
    //         $("#target-edit-vehicle").slideToggle(1000);
    //         $("#toggleicon-edit").toggleClass('fa fa-angle-up').toggleClass('fa fa-angle-down');
    //     })
    // })
    //
    // function copyToClipboard(element) {
    //     var $temp = $("<input>");
    //     $("body").append($temp);
    //     $temp.val($(element).text()).select();
    //     document.execCommand("copy");
    //     $temp.remove();
    // }
    //
    // $(function(){
    //     //$("#toggleProfileDiv").css("display","none");
    //     $("#toggleProfile").click(function(){
    //         swal({
    //             html: '',
    //             showConfirmButton: false,
    //         });
    //
    //         $("#formLogOut").click(function(){
    //             $.ajax({
    //                 url: 'logout',
    //                 method:"GET",
    //                 success: function (xml) {
    //                     setInterval(location.reload(true), 5000);
    //                 }
    //             })
    //         })
    //
    //         var urlV = window.location.href;
    //         var element = $("#urlProfileCopied");
    //         var arrV = urlV.split('more');
    //         $("#profileSellerCopy").click(function(){
    //             id = $(this).attr('data-id');
    //             newUrl = arrV[0] + "all-vehicle/"+ id;
    //             element.html(newUrl);
    //             copyToClipboard(element);
    //             swal("",  "تم نسخ رابط الملف الشخصي بنجاح");
    //         });
    //     })
    // })
    //
    // $(document).ready(function() {
    //
    //     $("#formVehicle").css('display','block');
    //
    //     var fileupload = $("#FileUpload");
    //     var filePath = $("#spnFilePath");
    //     var count = 0;
    //
    //     $(".add-multiple-images").click(function() {
    //         fileupload.click();
    //
    //     });
    //
    //     fileupload.change(function () {
    //         readURL(this);
    //     });
    //
    //     function readURL(input) {
    //         var filesAmount = input.files.length;
    //
    //         if (input.files ) {
    //             for (i = 0; i < filesAmount; i++) {
    //                 var reader = new FileReader();
    //
    //                 reader.onload = function (e) {
    //
    //                     $('#myImg').append('<div class="control-group row"><div class=" col-lg-6 col-sm-6 "> '
    //                         + '<div id="picturebox"><img src=' + e.target.result + ' style="width:50%; height:100px;">'
    //                         + '</div></div><div class="col-lg-6 col-sm-6" id="imagebuttonadd" >'
    //                         + '<div class="input-group-btn"> '
    //                         + '<button class="btn remove-image" type="button"><i class="fa fa-minus-circle" style="color:#0875ba;"></i> </button>'
    //                         + '</div></div></div>');
    //
    //                 }
    //
    //                 reader.readAsDataURL(input.files[i]);
    //             }
    //         }
    //     }
    //     $('#myImg').on('click', '.remove-image', function(){
    //         $(this).parents(".control-group").remove();
    //     });
    // });
    //
    //
    //
    // var vehicle_id = "";
    // $(document).ready(function(){
    //
    //     // Client Side validation for personal-register
    //     //  $('#validate-register-form').parsley();
    //     $('#validate-register-form').on('submit', function(event){
    //         event.preventDefault();
    //     });
    //
    //     // Client Side validation for seller-register
    //     // $('#validate-seller-register-form').parsley();
    //     // $('#validate-seller-register-form').on('submit', function(event){
    //     //     event.preventDefault();
    //     // });
    //
    //     var carcolor="", carColorCode = "", carColorCodeVal = "";
    //     $('.ul-car-color').on('click', 'li', function(e){
    //         var current = this;
    //         carColorCode = $(this).attr("value");
    //         carColorCodeVal = carColorCode.substr(1);
    //         carColorCodeVal = 'c' + carColorCodeVal;
    //         carcolor = $(this).attr('data-id');
    //         if(carColorCode.length > 0) {
    //             $(this).find('.checkafter').toggleClass('fa fa-check');
    //         }
    //
    //         $("#chooseCarColor").click(function () {
    //
    //             $("#car-color-modal").modal('hide');
    //             $("#color-car").css('background-color',carColorCode);
    //             $("#color-car").css('color','white');
    //             $("#cars-color span").text(carcolor);
    //             $("#body_color").val(carColorCodeVal);
    //             $(".checkafter").removeClass('fa fa-check');
    //         });
    //
    //     });
    //
    //     var color="", interiorColorCode="";
    //     $('.ul-interior-color').on('click', 'li', function(e){
    //         var current = this;
    //         interiorColor = $(this).attr("value");
    //         interiorColorCode = interiorColor.substr(1);
    //         interiorColorCode = 'c' + interiorColorCode;
    //         color = $(this).attr('data-id');
    //         if(color.length > 0) {
    //             $(this).find('.checkafter').toggleClass('fa fa-check');
    //         }
    //     });
    //
    //     $(document).on('click', '.chooseinteriorColor', function(){
    //         $("#interior-color-modal").modal('hide');
    //         $("#color-interior").css('background-color',interiorColor);
    //         $("#color-interior").css('color','white');
    //         $("#interior-color span").text(color);
    //         $("#interior_color").val(interiorColorCode);
    //         $(".checkafter").removeClass('fa fa-check');
    //     });
    //
    //
    //
    //     var $body = "", $make_id = "", $companyName = "", $model_id = "", companyLogo = "", modelName = "",
    //         logoWidth = "", logoHeight= "";
    //     // Body type value
    //     $('.bodyType input').on('change', function() {
    //         $bodyTypeVal = $('input[name=test]:checked').val();
    //         $("#body").val($bodyTypeVal);
    //         $body = $("#body").val();
    //     });
    //
    //     // Type & Modal values for the car
    //     $(document).on('click', '.modelsCars', function(){
    //         id = $(this).attr('data-id');
    //         $(".company-model-body").html("");
    //         var html="";
    //         $make_id = id;
    //         $.ajax({
    //             url: '/make/'+ id,
    //             method:"GET",
    //             dataType:"json",
    //
    //             success: function(data){
    //                 $companyName = data[0].name;
    //                 companyLogo = data[0].logo;
    //                 logoWidth = data[0].web_width;
    //                 logoHeight = data[0].web_height;
    //             }
    //         });
    //
    //         $.ajax({
    //             url: '/vehicle/'+ id,
    //             method:"GET",
    //             dataType:"json",
    //
    //             success: function(data) {
    //                 var datalength = data.length;
    //                 html += '<table class="table table-bordered" >';
    //                 $(".company-model-title").html($companyName);
    //                 for(var count=0; count < datalength; count++) {
    //
    //                     var length = data[count].length;
    //                     if(length == 1) {
    //                         var c = count;
    //                         html += '<tr>';
    //                         html += '<td><input class="radioModelName" data-id="'+ data[c][0].name +'" value="'+ data[c][0].id +'" type="radio" name="optradio">  ' + '   ' + data[c][0].name +'</td>';
    //                         html += '</tr>';
    //                     } else {
    //                         var cnt = count;
    //                         id = data[cnt][0].id;
    //                         html += '<tr rel="'+ data[cnt][0].id +'" class="rrr"><td><a data-id="'+ data[cnt][0].id +'" class="testttt"';
    //                         html += 'style="cursor:pointer">'+ data[cnt][0].name  +'</a></td></tr>';
    //
    //                         for(var i=1; i < length; i++) {
    //
    //                             html += '<tr class="moreModels11 row'+ id +'Collapse"style="display:none" > ';
    //                             html += '<td><input class="radioModelName" data-id="'+ data[cnt][i].name +'" value="'+ data[cnt][i].id +'" type="radio" name="optradio">  ' + '   ' + data[cnt][i].name +'</td>';
    //                             html += '</tr>';
    //                         }
    //                     }
    //                 }
    //                 html += '</table>';
    //                 $('.company-model-body').append(html);
    //                 $('#company-model-modal').modal('show');
    //                 $("#make").val($companyName);
    //                 $make = $("#make").val();
    //
    //
    //
    //                 $('.radioModelName').on('change', function() {
    //                     $model_id = $(this).val();
    //                     modelName = $(this).attr('data-id');
    //
    //                 });
    //
    //                 $('.company-model-modal-submit').on('click', function() {
    //                     $('#company-model-modal').modal('hide');
    //                     var logoPath = "/images/logos/"+companyLogo;
    //                     $("#bodyTypeLogos").fadeOut(200);
    //                     $('#bodyTypeLogoChoosen').empty().append('<div class="col-md-3 col-sm-3"> '
    //                         + '<img  src="'+ logoPath +' " width="'+ logoWidth +'"; height="'+ logoHeight+'";></div>'
    //                         + '<div class="col-md-3 col-sm-3"><label>'+ $companyName +'</label></div>'
    //                         + '<div class="col-md-3 col-sm-3"><label>'+ modelName +'</label></div>'
    //                         + '<div class="col-md-3 col-sm-3"><button class="btn remove-image-logo" type="button"><i class="fa fa-window-close" style="color:black; font-size:1.5em;"></i> </button>'
    //                         + '</div>'
    //                     );
    //                     $('.remove-image-logo').on('click', function() {
    //                         $("#bodyTypeLogoChoosen").empty();
    //                         $("#bodyTypeLogos").fadeIn(200);
    //                     });
    //                 });
    //
    //             }
    //         });
    //
    //     });
    //
    //     $(document).on('click', '.rrr' , function() {
    //         var rel = $(this).attr('rel');
    //         $('.row' + rel + 'Collapse').slideToggle();
    //     });
    //
    //     // Client Side validation for add vehicle
    //     $('#validate-vehicle-form').parsley();
    //
    //     $('#validate-vehicle-form').on('submit', function(event){
    //         var data =  $(this).serialize()+ "&make_id=" + $make_id + "&mould_id=" + $model_id +
    //             "&body=" + $body + "&body_color=" + carColorCodeVal + "&interior_color=" + interiorColorCode;
    //
    //         event.preventDefault();
    //         if($('#validate-vehicle-form').parsley().isValid()) {
    //             $.ajax({
    //                 url : '/vehicle',
    //                 method:"POST",
    //                 data: data,
    //                 dataType:"json",
    //                 success:function(data)
    //                 {
    //                     if (data == "غير مسموح الاضافة") {
    //                         errorsHtml = '<div id="errorAdding" class="alert alert-danger">'+ data +'</div>';
    //                         $('#vehicleError').html(errorsHtml);
    //                         $('html, body').animate({ scrollTop: 0 }, 'fast');
    //                     } else {
    //                         vehicle_id = data.id;
    //                         swal("", "تم اضافة معلومات المركبة بنجاح", "success");
    //                         $('#validate-vehicle-form')[0].reset();
    //                         $('#validate-vehicle-form').parsley().reset();
    //                         $("#formVehicle").css('dispaly','none');
    //                         $("#formVehicle").fadeOut(200);
    //                         $("#imagesForVehicle").css('display','block');
    //                     }
    //                 },
    //             });
    //         }
    //     });
    // });
    //
    //
    // $(document).ready(function() {
    //
    //     $("#upload-multiple-images").fadeOut(200);
    //     var fileupload = $("#ImagesVehicleUpload");
    //     var count = 0;
    //
    //     $(".add-multiple-images").click(function() {
    //         fileupload.click();
    //
    //     });
    //
    //     fileupload.change(function () {
    //         readURL(this);
    //     });
    //
    //     function readURL(input) {
    //         var filesAmount = input.files.length;
    //
    //         if (input.files ) {
    //             for (i = 0; i < filesAmount; i++) {
    //                 var reader = new FileReader();
    //
    //                 reader.onload = function (e) {
    //
    //                     $('#myImg').append('<input id="" value="' + vehicle_id + '" style="display:none" disabled>'
    //                         + '<div class="control-group text-center d-flex flex-row"><div class=" col-lg-8 col-sm-8 "> '
    //                         + '<div class="card-img-top "><img src=' + e.target.result + ' style="width:100%; height:70px; object-fit: contain">'
    //                         + '</div></div><div class="col-lg-4 col-sm-4" id="imagebuttonadd" >'
    //                         + '<div class="input-group-btn"></br>'
    //                         + '<button class="btn remove-image" type="button"><i class="fa fa-minus-circle" style="color:#0875ba; font-size:1.1em;"></i> </button>'
    //                         + '</div></div></div>');
    //                     $("#upload-multiple-images").fadeIn(200);
    //                 }
    //                 $("#vehicleId").val(vehicle_id );
    //                 reader.readAsDataURL(input.files[i]);
    //             }
    //         }
    //     }
    //
    //     $('#myImg').on('click', '.remove-image', function(){
    //         $(this).parents(".control-group").remove();
    //     });
    //
    // });
    //
    // // select all fuel type
    // $('#fuel_check').on('change', function() {
    //     if($(this).is(":checked")) {
    //         $('.fuel_checkbox').prop("checked", true);
    //     } else {
    //         $('.fuel_checkbox').prop("checked", false);
    //     }
    // });
    // // select all drivetrain type
    // $('#drivetrain_system_check').on('change', function() {
    //     if($(this).is(":checked")) {
    //         $('.drive_train_check').prop("checked", true);
    //     } else {
    //         $('.drive_train_check').prop("checked", false);
    //     }
    // });
    // // select all seats type
    // $('#num_of_seats_check').on('change', function() {
    //     if($(this).is(":checked")) {
    //         $('.num_of_seats_checkbox').prop("checked", true);
    //     } else {
    //         $('.num_of_seats_checkbox').prop("checked", false);
    //     }
    // });
    // // select all vehicle status type
    // $('#vehicle_status_check').on('change', function() {
    //     if($(this).is(":checked")) {
    //         $('.vehicle_status_checkbox').prop("checked", true);
    //     } else {
    //         $('.vehicle_status_checkbox').prop("checked", false);
    //     }
    // });
    // // select all gear status type
    // $('#gear_check').on('change', function() {
    //     if($(this).is(":checked")) {
    //         $('.gear_checkbox').prop("checked", true);
    //     } else {
    //         $('.gear_checkbox').prop("checked", false);
    //     }
    // });
    // // select all price type
    // $('#price_type_check').on('change', function() {
    //     if($(this).is(":checked")) {
    //         $('.price_type_checkbox').prop("checked", true);
    //     } else {
    //         $('.price_type_checkbox').prop("checked", false);
    //     }
    // });
    //
    // // select all external extra
    // $('#ext_ext_other_check').on('change', function() {
    //     if($(this).is(":checked")) {
    //         $('.ext_ext_other_checkbox').prop("checked", true);
    //     } else {
    //         $('.ext_ext_other_checkbox').prop("checked", false);
    //     }
    // });
    //
    // // select all sensors
    // $('#ext_ext_sensors_check').on('change', function() {
    //     if($(this).is(":checked")) {
    //         $('.ext_ext_sensors_checkbox').prop("checked", true);
    //     } else {
    //         $('.ext_ext_sensors_checkbox').prop("checked", false);
    //     }
    // });
    //
    // // select all other extra
    // $('#ext_gen_other_check').on('change', function() {
    //     if($(this).is(":checked")) {
    //         $('.ext_gen_other_checkbox').prop("checked", true);
    //     } else {
    //         $('.ext_gen_other_checkbox').prop("checked", false);
    //     }
    // });
    //
    // // select all cameras
    // $('#ext_ext_cameras_check').on('change', function() {
    //     if($(this).is(":checked")) {
    //         $('.ext_ext_cameras_checkbox').prop("checked", true);
    //     } else {
    //         $('.ext_ext_cameras_checkbox').prop("checked", false);
    //     }
    // });
    //
    // // select all mirrors
    // $('#ext_ext_mirrors_check').on('change', function() {
    //     if($(this).is(":checked")) {
    //         $('.ext_ext_mirrorsbox').prop("checked", true);
    //     } else {
    //         $('.ext_ext_mirrorsbox').prop("checked", false);
    //     }
    // });
    //
    // // select all external lights
    // $('#ext_ext_light_check').on('change', function() {
    //     if($(this).is(":checked")) {
    //         $('.ext_ext_light_checkbox').prop("checked", true);
    //     } else {
    //         $('.ext_ext_light_checkbox').prop("checked", false);
    //     }
    // });
    //
    // // select all internal extra
    // $('#ext_int_other_check').on('change', function() {
    //     if($(this).is(":checked")) {
    //         $('.ext_int_other_checkbox').prop("checked", true);
    //     } else {
    //         $('.ext_int_other_checkbox').prop("checked", false);
    //     }
    // });
    //
    // // select all internal glass
    // $('#ext_int_glass_check').on('change', function() {
    //     if($(this).is(":checked")) {
    //         $('.ext_int_glass_checkbox').prop("checked", true);
    //     } else {
    //         $('.ext_int_glass_checkbox').prop("checked", false);
    //     }
    // });
    //
    // // select all screens
    // $('#ext_int_screens_check').on('change', function() {
    //     if($(this).is(":checked")) {
    //         $('.ext_int_screens_checkbox').prop("checked", true);
    //     } else {
    //         $('.ext_int_screens_checkbox').prop("checked", false);
    //     }
    // });
    //
    // // select all steering
    // $('#ext_int_steering_check').on('change', function() {
    //     if($(this).is(":checked")) {
    //         $('.ext_int_steering_checkbox').prop("checked", true);
    //     } else {
    //         $('.ext_int_steering_checkbox').prop("checked", false);
    //     }
    // });
    //
    // // select all seats
    // $('#ext_int_seats_check').on('change', function() {
    //     if($(this).is(":checked")) {
    //         $('.ext_int_seats_checkbox').prop("checked", true);
    //     } else {
    //         $('.ext_int_seats_checkbox').prop("checked", false);
    //     }
    // });
    //
    // $('#whatsAppLink').on('click', function() {
    //     whatsAppNumber = $(this).attr("data-id");
    //     swal("تواصل معنا على رقم الواتس",  whatsAppNumber, "info");
    // });
    new Swiper(".art-blog-slider", {
        slidesPerView: 3,
        spaceBetween: 30,
        speed: 1000,
        autoplay: {
            delay: 4e3
        },
        autoplaySpeed: 7e3,
        pagination: {
            el: ".swiper-pagination",
            clickable: !0
        },
        navigation: {
            nextEl: ".art-blog-swiper-next",
            prevEl: ".art-blog-swiper-prev"
        },
        breakpoints: {
            1500: {
                slidesPerView: 3
            },
            1200: {
                slidesPerView: 2
            },
            992: {
                slidesPerView: 1
            }
        },
    })

    // $(".choosenbox").chosen({rtl: true});
    $('.choosenbox').SumoSelect({
        search: true,
        searchText: 'بحث...',
        selectAll: true,
        okCancelInMulti: true,
        locale: ['بحث', 'إلغاء', 'إختيار الجميع'],
    });
    Fancybox.bind('[data-fancybox="gallery"]', {
        Toolbar: false,
        animated: false,
        dragToClose: false,

        showClass: false,
        hideClass: false,

        closeButton: "top",

        Image: {
            click: "close",
            wheel: "slide",
            zoom: false,
            fit: "cover",
        },

        Thumbs: {
            minScreenHeight: 0,
        },
    });
    Fancybox.bind('[data-fancybox="gallery"]', {
        Toolbar: false,
        animated: false,
        dragToClose: false,

        showClass: false,
        hideClass: false,

        closeButton: "top",

        Image: {
            click: "close",
            wheel: "slide",
            zoom: false,
            fit: "cover",
        },

        Thumbs: {
            minScreenHeight: 0,
        },
    });

    if (document.getElementById("price")) {
        var finalSelectedPrice;
        $('#price').slider().on('change', function(ev) {
            var uiprice = $('#price').data('slider').getValue();
            $("#max-price").html(uiprice[1] + '&nbsp;<i class="fas fa-shekel-sign"></i>');
            $("#min-price").html(uiprice[0] + '&nbsp;<i class="fas fa-shekel-sign"></i>');
        });
        $("#price").slider().on('slideStop', function(ev) {
            finalSelectedPrice = $('#price').data('slider').getValue();
            search()
        });
    }


    $(".web-btn").click(function() {
        $(".web-btn").toggleClass("expand");
        $("#menu").toggleClass('showMenu', 1000);
    });

    $("#made_from").on('change', function() {
        search();
    })
    $("#made_to").on('change', function() {
        search();
    })
    $(".outerSkin").click(function() {
        $(this).toggleClass("btn-secondary");
        search();
    });
    $(".fuelType").on('click', function() {
        $(this).toggleClass("btn-secondary");
        search();
    })
    $(".numSeats").on('click', function() {
        $(this).toggleClass("btn-secondary");
        search();
    })
    $(".vehicleStatus").on('click', function() {
        $(this).toggleClass("btn-secondary");
        search();
    })
    $(".ext_int_sunroof").on('click', function() {
        $(this).toggleClass("btn-secondary");
        search();
    })
    $(".gearType").on('click', function() {
        $(this).toggleClass("btn-secondary");
        search();
    })
    $(".drivetrain_system").on('click', function() {
        $(this).toggleClass("btn-secondary");
        search();
    })
    $(".payamentMethod").on('click', function() {
        $(this).toggleClass("btn-secondary");
        search();
    })
    $("#makes").on('change', function() {
        search();
    })
    $("#carModels").on('change', function() {
        search();
    })

    function search() {
        var made_to = $("#made_to").val();
        var made_from = $("#made_from").val();
        var makes = $("#makes").val();
        var carModels = $("#carModels").val();
        var body = [];
        $(".outerSkin.btn-secondary").each((i, el) => {
            body.push(el.getAttribute("data-id"));
        })
        var fuel = [];
        $(".fuelType.btn-secondary").each((i, el) => {
            fuel.push(el.getAttribute("data-id"));
        })
        var gear = [];
        $(".gearType.btn-secondary").each((i, el) => {
            gear.push(el.getAttribute("data-id"));
        })
        var seats = [];
        $(".numSeats.btn-secondary").each((i, el) => {
            seats.push(el.getAttribute("data-id"));
        })
        var status = [];
        $(".vehicleStatus.btn-secondary").each((i, el) => {
            status.push(el.getAttribute("data-id"));
        })
        var payament = [];
        $(".payamentMethod.btn-secondary").each((i, el) => {
            payament.push(el.getAttribute("data-id"));
        })
        var sunroof = [];
        $(".ext_int_sunroof.btn-secondary").each((i, el) => {
            sunroof.push(el.getAttribute("data-id"));
        })
        var drivetrain = [];
        $(".drivetrain_system.btn-secondary").each((i, el) => {
            drivetrain.push(el.getAttribute("data-id"));
        })
        $('#vehiclearea .loading-img').show();
        $.ajax({
            url: '/search?makes=' + makes + '&model=' + carModels + '&price=' + finalSelectedPrice + '&body=' + body + '&fuel=' + fuel + '&drivetrain=' + drivetrain + '&sunroof=' + sunroof + '&payament=' + payament + '&gear=' + gear + '&seats=' + seats + '&status=' + status + '&made_from=' + made_from + '&made_to=' + made_to,
            type: 'get',
            cache: false,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            success: function(data) {
                $(".pagination").hide();
                $('#vehiclearea .loading-img').hide();
                if (data != null) {
                    var vehicle = '';
                    $.each(data[0], function(k, v) {
                        var image = null;
                        var price = null;
                        if (v.img['file_name']) {
                            image = '/images/vehicles/' + v.img['file_name'] + '';
                        } else {
                            image = '/Front/img/logo.png';
                        }
                        if (v.price_type !== 'price_type_types_fp2') {
                            price = v.price;
                        } else {
                            price = '';
                        }
                        vehicle += '<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">\n' +
                            '    <div class="car-bx car-bx-2">\n' +
                            '        <a class="hover01" href="vehicle/' + v.id + '">\n' +
                            '            <figure><img src="' + image + '" class="car-bx-img-top" alt="..."></figure>\n' +
                            '            <div class="car-bx-body">\n' +
                            '                <h2 class="car-bx-title">' + v.make['name'] + ' ' + v.mould['name'] + '</h2>\n' +
                            '                <p class="car-bx-price">&nbsp;&nbsp;' + price + '</p>\n' +
                            '                <div class="row">\n' +
                            '                    <div class="col-4 min-box text-center mb-3">\n' +
                            '                        <div class="' + v.gear + ' car-sb-img"></div>\n' +
                            '                        <label>' + v.gear_name + '</label>\n' +
                            '                    </div>\n' +
                            '                    <div class="col-4 min-box text-center mb-3">\n' +
                            '                        <div class="fuel car-sb-img"></div>\n' +
                            '                        <label>' + v.fuel_name + '</label>\n' +
                            '                    </div>\n' +
                            '                    <div class="col-4 min-box text-center mb-3">\n' +
                            '                        <div class="power car-sb-img"></div>\n' +
                            '                        <label>' + v.power + '</label>\n' +
                            '                    </div>\n' +
                            '                    <div class="col-4 min-box text-center mb-3">\n' +
                            '                        <div class="hp car-sb-img"></div>\n' +
                            '                        <label>' + v.hp + '</label>\n' +
                            '                    </div>\n' +
                            '                    <div class="col-4 min-box text-center mb-3">\n' +
                            '                        <div class="date car-sb-img"></div>\n' +
                            '                        <label>' + v.year_of_product + '</label>\n' +
                            '                    </div>\n' +
                            '                    <div class="col-4 min-box text-center mb-3">\n' +
                            '                        <div class="distance car-sb-img"></div>\n' +
                            '                        <label>' + v.mileage + '</label>\n' +
                            '                    </div>\n' +
                            '                </div>\n' +
                            '            </div>\n' +
                            '        </a>\n' +
                            '        <div data-id="' + v.id + '" data-img="' + image + '" data-name="' + v.make['name'] + ' ' + v.mould['name'] + '"\n' +
                            '             class="compareVehicle btn btn-sm btn-compare mb-2 text-white">مقارنة\n' +
                            '        </div>\n' +
                            '        <a href="/vehicle/' + v.id + '">\n' +
                            '            <div class="car-more-details"> عرض المزيد\n' +
                            '                <i class="fas fa-arrow-left"></i>\n' +
                            '            </div>\n' +
                            '        </a>\n' +
                            '    </div>\n' +
                            '    </div>' +
                            '';
                    });
                    $("#vehiclearea-content").html(vehicle);
                    if (data[1].length > 0) {
                        var v = $('#carModels');
                        v.prop('disabled', false);
                        var model = '';
                        $.each(data[1], function(i, data) {
                            if (data.childs.length > 0) {
                                model += '<optgroup label="' + data.name + '" class="group-' + data.id + '">';
                                $.each(data.childs, function(v1, v2) {
                                    model += '<option value="' + v2.id + '"> - ' + v2.name + '</option>';
                                })
                                model += '</optgroup>';
                            } else {
                                model += '<option value="' + data.id + '">' + data.name + '</option>';
                            }
                            //$('#carModels').append("<option value='" + data.id + "'>" + data.name + "</option>");
                        });
                        v.append(model);
                        $('select.choosenbox')[1].sumo.reload();
                    }
                    //
                    // $("#carModels").html('' +
                    //     '<option>fda</option>\n' +
                    //     '');
                }
            },
        });
    }

    $('body').on('click', '.compareVehicle', function() {
        var matched = $(".int-box");
        var val = $(this).attr('data-id');
        var img = $(this).attr('data-img');
        if (matched.length < 2) {
            var name = $(this).attr('data-name');
            $("#combareBox").css({
                'right': 0
            });
            $("#combar-bx-show").append('' +
                '<div class="col-6 int-box-outer" compare-id="' + val + '">' +
                '<div class="int-box">' +
                '<div class="car-title">' + name + '</div>' +
                '<div class="car-img"><img src="' + img + '"/></div>' +
                '<div class="d-grid gap-2"><div class="deleteCbOX btn btn-danger btn-sm">حذف</div></div>' +
                '</div>' +
                '</div>' +
                '');
            var lst = $(".int-box-outer");
            if (lst.length > 1) {
                var l1 = lst[0].getAttribute('compare-id');
                var l2 = lst[1].getAttribute('compare-id');
                $("#hrefCompare").attr("href", '/compare?car1=' + l1 + '&car2=' + l2 + '')
            }
        }

    })
    $('body').on('click', '.deleteCbOX', function() {
        $(this).parent().parent().parent('.int-box-outer').remove();
        var matched = $(".int-box");
        if (matched.length === 0) {
            $("#combareBox").css({
                'right': -400
            });
        }
    })
    $(".close-bx").click(function() {
        $("#combareBox").css({
            'right': -400
        });
        $(".int-box-outer").remove();
    })

    $(".showSidebar").click(function() {
        $(".hideinmobile").css({
            'right': '0',
            'z-index': 999,
            'background-color': 'white',
            'padding': '5px'
        });
        $(".closeSidebar").css({
            'display': 'block'
        });
    })
    $(".closeSidebar").click(function() {
        $(this).css({
            'display': 'none'
        });
        $(".hideinmobile").css({
            'right': -500
        });
    })
    $(".deleteImg").click(function() {
        var thisImg = $(this);
        var val = thisImg.attr('id');
        $.ajax({
            url: '/deleteCarImg/' + val,
            type: 'get',
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            success: function(data) {
                if (data == 1) {
                    thisImg.parent().parent().remove();
                }
            }
        })
    })
})