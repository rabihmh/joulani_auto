<x-front>
    <x-slot:breadcrumbs>
        <div class="container">
            <span typeof="v:Breadcrumb"><a property="v:title" rel="v:url"
                                           href="/">الرئيسية</a></span>
            <span class="sep">»</span>
            <span typeof="v:Breadcrumb"><span property="v:title" class="current">معارض السيارات</span></span>
        </div>
    </x-slot:breadcrumbs>
    </div>
    <div class="container mt-2 mb-5">
        <div class="page_title mb-3">
            <h1 class="pull-right">معارض السيارات</h1>
            <div class="pull-left search">
                <form method="GET">
                    <div class="row">
                        <div class="col-6">
                            <input id="sellerTitle" class="form-control search-input" autocomplete="off" type="text"
                                   name="title" placeholder="البحث عن معرض">
                        </div>
                        <div class="col-6">
                            <select multiple="multiple" id="sellerCity" placeholder="الرجاء إختيار المدينة"
                                    onchange="console.log($(this).children(':selected').length)"
                                    class="choosenbox form-control">
                                <option value="1">
                                    الخليل
                                </option>
                                <option value="2">
                                    رام الله
                                </option>
                                <option value="3">
                                    القدس
                                </option>
                                <option value="4">
                                    نابلس
                                </option>
                                <option value="5">
                                    أريحا
                                </option>
                                <option value="6">
                                    طولكرم
                                </option>
                                <option value="7">
                                    البيرة
                                </option>
                                <option value="8">
                                    جنين
                                </option>
                                <option value="9">
                                    طوباس
                                </option>
                                <option value="10">
                                    قلقيلية
                                </option>
                                <option value="11">
                                    بيت لحم
                                </option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="clear"></div>
        </div>
        <div class="row" id="sellersArea">
            @foreach($sellers as $seller)
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="car-bx hover01">
                        <figure>
                            <img
                                src="{{asset('storage/'.$seller->image)}}"
                                class="card-img-top" alt="{{$seller->seller_name}}" title="{{$seller->seller_name}}">
                        </figure>
                        <div class="car-bx-body">
                            <h2 class="car-bx-title">{{$seller->seller_name}}</h2>
                            <div class="mb-1">
                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                                @php
                                 $region=\App\Models\Region::select('name')->where('id',$seller->region_id)->first()
                                @endphp
                                {{$region->name}}
                            </div>
                            <div class="mb-1">
                                <i class="fa fa-phone" aria-hidden="true"></i>
                                <a href="tel:{{$seller->seller_mobile}}">{{$seller->seller_mobile}}</a>
                            </div>
                            <div class="car-bx-counter">
                                <i class="fas fa-car"></i>
                                {{$seller->vehicles_count}}
                            </div>
                        </div>
                        <a href="/seller/21">
                            <div class="car-more-details"> عرض المزيد
                                <i class="fas fa-arrow-left"></i>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @push('js')
        <script>
            $("#sellerTitle").on('keyup', function () {
                search();
            });
            $("#sellerCity").on('change', function () {
                search();
            })

            function search() {
                var sellerTitle = $("#sellerTitle").val();
                var sellerCity = $("#sellerCity").val();

                console.log(sellerTitle, sellerCity);
                $.ajax({
                    url: '/getSeller?title=' + sellerTitle + '&city=' + sellerCity,
                    type: 'get',
                    headers: {
                        'X-CSRF-TOKEN': "xLZPGQy3YfxTbsqRa0aMgtY6dzVkk3mBhiE64yiw"
                    },
                    success: function (data) {
                        if (data != null) {
                            var sellers = '';
                            $.each(data, function (k, v) {
                                console.log(v);
                                sellers += ' <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">\n' +
                                    '   <div class="car-bx hover01">\n' +
                                    '   <figure><img src="/Front/img/logo.png"/></figure>\n' +
                                    '  <div class="car-bx-body">\n' +
                                    '      <h2 class="car-bx-title">' + v.seller_name + '</h2>\n' +
                                    '      <div class="mb-1">\n' +
                                    '          <i class="fa fa-map-marker" aria-hidden="true"></i>' + v.seller_address + '</div>\n' +
                                    '        <div class="mb-1">\n' +
                                    '               <i class="fa fa-phone" aria-hidden="true"></i>\n' +
                                    '                <a href="tel:' + v.seller_mobile + '">' + v.seller_mobile + '</a>\n' +
                                    '           </div>\n' +
                                    '        <div class="car-bx-counter"><i class="fas fa-car"></i>' + v.vehicles_count + '</div>\n' +
                                    '   </div>\n' +
                                    '    <a href="/seller/' + v.id + '">\n' +
                                    '        <div class="car-more-details"> عرض المزيد<i class="fas fa-arrow-left"></i></div>\n' +
                                    '   </a>\n' +
                                    ' </div>\n' +
                                    '</div>\n' +
                                    '';
                            });
                            $("#sellersArea").html(sellers);
                        }
                    },
                });
            }
        </script>
    @endpush
</x-front>
