$(document).ready(function () {
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
        $('#price').slider().on('change', function (ev) {
            var uiprice = $('#price').data('slider').getValue();
            $("#max-price").html(uiprice[1] + '&nbsp;<i class="fas fa-dollar-sign"></i>');
            $("#min-price").html(uiprice[0] + '&nbsp;<i class="fas fa-dollar-sign"></i>');
        });
        $("#price").slider().on('slideStop', function (ev) {
            finalSelectedPrice = $('#price').data('slider').getValue();
            search()
        });
    }


    $(".web-btn").click(function () {
        $(".web-btn").toggleClass("expand");
        $("#menu").toggleClass('showMenu', 1000);
    });

    $("#made_from").on('change', function () {
        search();
    })
    $("#made_to").on('change', function () {
        search();
    })
    $(".outerSkin").click(function () {
        $(this).toggleClass("btn-secondary");
        search();
    });
    $(".fuelType").on('click', function () {
        $(this).toggleClass("btn-secondary");
        search();
    })
    $(".gearType").on('click', function () {
        $(this).toggleClass("btn-secondary");
        search();
    })
    $("#makes").on('change', function () {
        search();
    })
    $("#carModels").on('change', function () {
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
        // var seats = [];
        // $(".numSeats.btn-secondary").each((i, el) => {
        //     seats.push(el.getAttribute("data-id"));
        // })
        // var status = [];
        // $(".vehicleStatus.btn-secondary").each((i, el) => {
        //     status.push(el.getAttribute("data-id"));
        // })

        $('#vehiclearea .loading-img').show();
        $.ajax({
            url: '/search?makes=' + makes + '&model=' + carModels + '&price=' + finalSelectedPrice + '&fuel=' + fuel + '&gear=' + gear + '&made_from=' + made_from + '&made_to=' + made_to,
            type: 'get',
            cache: false,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            success: function (data) {
                $(".pagination").hide();
                $('#vehiclearea .loading-img').hide();
                if (data != null) {
                    var vehicle = '';
                    $.each(data[0], function (k, v) {
                        var image = null;
                        var price = v.price;
                        if (v.main_image) {
                            image = '/storage/' + v.main_image;
                        } else {
                            image = '/Front/img/logo.png';
                        }
                        let imgGear = '';
                        switch (v.gear) {
                            case'عادي':
                                imgGear = "man car-sb-img";
                                break;
                            case 'أوتوماتيك':
                                imgGear = "aut car-sb-img";
                                break;
                            case "ستيبترونيك":
                                imgGear = "aut car-sb-img";
                                break;
                            default:
                                imgGear = "aut car-sb-img";
                        }

                        vehicle += '<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">\n' +
                            '    <div class="car-bx car-bx-2">\n' +
                            '        <a class="hover01" href="vehicles/' + v.id + '">\n' +
                            '            <figure><img src="' + image + '" class="car-bx-img-top" alt="..."></figure>\n' +
                            '            <div class="car-bx-body">\n' +
                            '                <h2 class="car-bx-title">' + v.vehicle_name + '</h2>\n' +
                            '                <p class="car-bx-price"> <i class="fas fa-dollar-sign"></i>&nbsp;&nbsp;' + price + '</p>\n' +
                            '                <div class="row">\n' +
                            '                    <div class="col-4 min-box text-center mb-3">\n' +
                            '                        <div class="' + imgGear + '"></div>\n' +
                            '                        <label>' + v.gear + '</label>\n' +
                            '                    </div>\n' +
                            '                    <div class="col-4 min-box text-center mb-3">\n' +
                            '                        <div class="fuel car-sb-img"></div>\n' +
                            '                        <label>' + v.fuel + '</label>\n' +
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
                            '        <div data-id="' + v.id + '" data-img="' + image + '" data-name="' + v.vehicle_name + '"\n' +
                            '             class="compareVehicle btn btn-sm btn-compare mb-2 text-white">مقارنة\n' +
                            '        </div>\n' +
                            '        <a href="/vehicles/' + v.id + '">\n' +
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
                        $.each(data[1], function (i, data) {
                            if (data.children.length > 0) {
                                model += '<optgroup label="' + data.name + '" class="group-' + data.id + '">';
                                $.each(data.childs, function (v1, v2) {
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

    $('body').on('click', '.compareVehicle', function () {
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
    $('body').on('click', '.deleteCbOX', function () {
        $(this).parent().parent().parent('.int-box-outer').remove();
        var matched = $(".int-box");
        if (matched.length === 0) {
            $("#combareBox").css({
                'right': -400
            });
        }
    })
    $(".close-bx").click(function () {
        $("#combareBox").css({
            'right': -400
        });
        $(".int-box-outer").remove();
    })

    $(".showSidebar").click(function () {
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
    $(".closeSidebar").click(function () {
        $(this).css({
            'display': 'none'
        });
        $(".hideinmobile").css({
            'right': -500
        });
    })
    $(".deleteImg").click(function () {
        var thisImg = $(this);
        var val = thisImg.attr('id');
        $.ajax({
            url: '/deleteCarImg/' + val,
            type: 'get',
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            success: function (data) {
                if (data == 1) {
                    thisImg.parent().parent().remove();
                }
            }
        })
    })
})
