<x-front title="اشتراكاتي">
    <x-slot:breadcrumbs>
        <div class="container">
            <span typeof="v:Breadcrumb"><a property="v:title" rel="v:url"
                                           href="/">الرئيسية</a></span>
            <span class="sep">»</span>
            <span typeof="v:Breadcrumb"><a property="v:title" rel="v:url"
                                           href="{{route('front.vehicles.index')}}">الاشتراكات</a></span>
        </div>
    </x-slot:breadcrumbs>
    <div class="container mt-2 mb-5">
        <x-mini-nav/>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="bg-blue text-white">
                <tr>
                    <th>#</th>
                    <th>الخطة</th>
                    <th>دفع بواسطة</th>
                    <th>الحالة</th>
                    <th>تاريخ الاشتراك</th>
                    <th>تاريخ الانتهاء</th>
                    <th>إلغاء الاشتراك</th>
                </tr>
                </thead>
                <tbody>
                @forelse($subscriptions as $subscription)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$subscription->plan->name}}</td>
                        <td><img src="{{asset('storage/'.$subscription->method->icon)}}" alt="method"></td>
                        <td>{{$subscription->status=='active'?'نشط':'غير نشط'}}</td>
                        <td dir="ltr" class="text-center">{{$subscription->start_date}}</td>
                        <td dir="ltr" class="text-center">{{$subscription->end_date}}</td>
                        <td>
                            @if($subscription->status==='active')
                                <button class="btn btn-danger"
                                        onclick="document.getElementById('cancelForm{{$subscription->id}}').submit()">
                                    إلغاء الاشتراك
                                </button>
                                <form id="cancelForm{{$subscription->id}}"
                                      action="{{route('front.subscription.cancel',$subscription->id)}}"
                                      method="POST">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="text-center text-danger text-lg text-bold" colspan="7">لم تشترك بعد بأي خطة</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>

</x-front>
