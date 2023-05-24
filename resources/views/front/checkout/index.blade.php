<x-front title="طرق الدفع">
    @push('css')
        <style>
            #loading-spinner {
                display: none;
                position: fixed;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                z-index: 10;
            }

            .box-container {
                display: flex;
                align-items: center;
                width: 300px;
            }

            .box-container .box-image {
                display: flex;
                border: 1px solid #ccc;
                margin-right: 10px;
                justify-content: center;
                width: 241px;
                height: 30px;
            }

            .box-container .box-image .box-radio {
                display: none;
            }

            .box-container .box-image .box-radio:checked + span {
                background-color: #999;
                border-color: #999;
            }

            .box-container .box-image .box-radio:checked + span::before {
                content: '';
                display: block;
                width: 30px;
                height: 30px;
                border-radius: 50%;
                background-color: #007bff;
                margin: 4px;
            }
        </style>

    @endpush
    <x-slot:breadcrumbs>
        <div class="container">
            <span typeof="v:Breadcrumb"><a property="v:title" rel="v:url" href="/">الرئيسية</a></span>
            <span class="sep">»</span>
            <span typeof="v:Breadcrumb"><span property="v:title" class="current">الخطط</span></span>
            <div class="btn-danger showSidebar">
                <i class="fas fa-search"></i>
            </div>
        </div>
    </x-slot:breadcrumbs>
    <div id="loading-spinner">
        <div class="spinner-grow text-primary" role="status">
            <span class="sr-only">Loading...</span>
        </div>
        <div class="spinner-grow text-secondary" role="status">
            <span class="sr-only">Loading...</span>
        </div>
        <div class="spinner-grow text-success" role="status">
            <span class="sr-only">Loading...</span>
        </div>
        <div class="spinner-grow text-danger" role="status">
            <span class="sr-only">Loading...</span>
        </div>
        <div class="spinner-grow text-warning" role="status">
            <span class="sr-only">Loading...</span>
        </div>
        <div class="spinner-grow text-info" role="status">
            <span class="sr-only">Loading...</span>
        </div>
        <div class="spinner-grow text-light" role="status">
            <span class="sr-only">Loading...</span>
        </div>
        <div class="spinner-grow text-dark" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <section style="background-color: #eee;">
        <div class="container py-5">
            <div class="card">
                <div class="card-header">
                    حدد عملية الدفع
                </div>
                <div class="card-body">
                    <div class="row d-flex justify-content-center pb-5">

                        <div class="col-md-7 col-xl-5 mb-4 mb-md-0">
                            <div class="pt-2">
                                <form class="pb-3">
                                    <input type="hidden" name="plan_id" value="{{$plan->id}}">
                                    <div id="payment-methods" class="d-flex flex-column pb-3">
                                        @foreach($payment_methods as $method)
                                            <div class="d-flex flex-row pb-3">
                                                <label class="box-container">
                                                    <input class="box-radio" type="radio" name="method"
                                                           value="{{ $method->slug }}"
                                                           aria-label="..." @checked($method->slug==='stripe')/>
                                                    <div class="box-image">
                                                        <input class="box-radio visually-hidden" type="radio"
                                                               name="method"
                                                               value="{{ $method->slug }}" aria-label="..."/>
                                                        <span></span>
                                                        <img src="{{ asset('storage/'.$method->icon) }}"
                                                             alt="Payment Method Icon"/>
                                                    </div>
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-5 col-xl-4 offset-xl-1">
                            <div class="rounded d-flex flex-column p-2" style="background-color: #f8f9fa;">
                                <div class="p-2 me-3">
                                    <h4>{{$plan->name}}</h4>
                                </div>
                                <div class="p-2 d-flex">
                                    <div class="col-8">Contracted Price</div>
                                    <div class="ms-auto">${{$plan->price}}</div>
                                </div>
                                <div class="border-top px-2 mx-2"></div>
                                <div class="pay-btn p-2">
                                    <button class="btn btn-primary" id="" onclick="checkout()">ادفع</button>
                                </div>
                                <div id="paypal-button-container"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @push('js')
        <script>
            function checkout() {
                var selectedMethod = $('input[name="method"]:checked').val();
                var planId = $('input[name="plan_id"]').val();
                if (selectedMethod === 'stripe') {
                    stripeCheckout(selectedMethod, planId);
                } else if (selectedMethod === 'paypal') {
                    paypalCheckout(selectedMethod, planId);
                }
            }

            function stripeCheckout(method, planID) {
                var loadingSpinner = $('#loading-spinner');
                loadingSpinner.show();

                $.ajax({
                    url: '{{ route('front.checkout') }}',
                    type: 'POST',
                    data: {
                        method: method,
                        plan_id: planID
                    },
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    dataType: 'json',
                    beforeSend: function () {
                        loadingSpinner.show();
                    },
                    success: function (response, textStatus, xhr) {
                        var contentType = xhr.getResponseHeader("content-type") || "";
                        if (contentType.indexOf("json") !== -1) {
                            var responseData = JSON.parse(xhr.responseText);
                            if (responseData && responseData.link) {
                                window.open(responseData.link, '_blank');
                            } else {
                                alert('Invalid response');
                            }
                        } else {
                            alert('Invalid response format');
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error(error);
                    },
                    complete: function () {
                        loadingSpinner.hide();
                    }
                });
            }

            function paypalCheckout(method, planID) {
                var loadingSpinner = $('#loading-spinner');
                loadingSpinner.show();

                $.ajax({
                    url: '{{ route('front.checkout') }}',
                    type: 'POST',
                    data: {
                        method: method,
                        plan_id: planID,
                        _token: "{{ csrf_token() }}"
                    },
                    dataType: 'json',
                    success: function (response) {
                        //these response from db
                        let clientId = response.clientID;
                        let orderID = response.orderID;
                        let paymentID = response.paymentID;

                        $('.pay-btn').hide();

                        var script = document.createElement('script');
                        script.src = 'https://www.paypal.com/sdk/js?client-id=' + clientId + '&vault=true&intent=subscription';
                        script.async = true;
                        script.onload = function () {
                            paypal.Buttons({
                                createSubscription: function (data, actions) {
                                    return actions.subscription.create({
                                        'plan_id': response.planID
                                    });
                                },
                                onApprove: function (data, actions) {
                                    let subscriptionID = data.subscriptionID;
                                    let orderPaypalId = data.orderID;

                                    actions.subscription.get(subscriptionID).then(function (response) {
                                        let subscriptionID = response.id;
                                        let successUrl = "{{ route('front.success', 'paypal') }}";

                                        let form = document.createElement('form');
                                        form.method = 'POST';
                                        form.action = successUrl;

                                        // Create and append input fields
                                        let csrfTokenField = document.createElement('input');
                                        csrfTokenField.type = 'hidden';
                                        csrfTokenField.name = '_token';
                                        csrfTokenField.value = '{{csrf_token()}}';
                                        form.appendChild(csrfTokenField);

                                        let subscriptionIDField = document.createElement('input');
                                        subscriptionIDField.type = 'hidden';
                                        subscriptionIDField.name = 'subscription_id';
                                        subscriptionIDField.value = subscriptionID;
                                        form.appendChild(subscriptionIDField);

                                        let orderPaypalIdField = document.createElement('input');
                                        orderPaypalIdField.type = 'hidden';
                                        orderPaypalIdField.name = 'orderPaypalId';
                                        orderPaypalIdField.value = orderPaypalId;
                                        form.appendChild(orderPaypalIdField);

                                        let OrderID = document.createElement('input');
                                        OrderID.type = 'hidden';
                                        OrderID.name = 'orderID';
                                        OrderID.value = orderID;
                                        form.appendChild(OrderID);

                                        let PaymentID = document.createElement('input');
                                        PaymentID.type = 'hidden';
                                        PaymentID.name = 'paymentID';
                                        PaymentID.value = paymentID;
                                        form.appendChild(PaymentID);

                                        // Append the form to the body and submit it
                                        document.body.appendChild(form);
                                        form.submit();
                                    });
                                }

                            }).render('#paypal-button-container');
                        };

                        document.body.appendChild(script);
                    },
                    error: function (xhr, status, error) {
                        console.error(error);
                    },
                    complete: function () {
                        loadingSpinner.hide();
                    }
                });
            }
        </script>
    @endpush

</x-front>
