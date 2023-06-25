<x-front title="تأكيد كلمة المرور">
    <div class="container">
        <h2 class="mb-4 text-sm">
            هذه منطقة آمنة في التطبيق. يرجى تأكيد كلمة المرور الخاصة بك قبل المتابعة.
        </h2>
        <div class="card m-auto mt-5 mb-5">
            <div class="card-header bg-blue text-white">تأكيد كلمة المرور</div>
            <div class="card-body">
                <form method="POST" action="{{ route('password.confirm') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="password" class="form-label">كلمة المرور</label>
                        <input name="password" type="password" class="form-control" id="password" required
                               autocomplete="current-password">
                    </div>
                    @error('password')
                    <div class="alert alert-danger">
                        {{__('auth.password')}}
                    </div>
                    @enderror

                    <div class="d-grid gap-2 col-12 mx-auto">
                        <button type="submit" class="btn bg-blue text-white btn-block">متابعة</button>
                    </div>
                </form>
            </div>

        </div>
    </div>

</x-front>
