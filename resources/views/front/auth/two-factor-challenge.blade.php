<x-front title="2FA challenge">
    <div class="container">
        <div class="card m-auto mt-5 mb-5">
            <div class="card-header bg-blue text-white">كود المصادقة الثنائية</div>
            <div class="card-body">
                <form class="card login-form" method="POST"
                      action="{{ route('two-factor.login') }}">
                    @csrf
                    <div class="mb-3">
                        <input value="" name="code" type="text" class="form-control" id="exampleInputEmail1"
                               aria-describedby="emailHelp" placeholder="كود المصادقة الثنائية">
                    </div>
                    @if($errors->has('code'))
                        <div class="alert alert-danger">
                            رمز المصادقة غير صحيح.
                        </div>
                    @endif

                    <div class="d-grid gap-2 col-12 mx-auto">
                        <button type="submit" class="btn bg-blue text-white btn-block">متابعة</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-front>
