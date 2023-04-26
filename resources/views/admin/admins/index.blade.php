@extends('layouts.master')
@section('title')
    Admins - All
@endsection
@section('css')
    <!--switchery css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.css">
@endsection

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Admins</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/ All</span>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped mg-b-0 text-md-nowrap">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Type</th>
                                <th>Created at</th>
                                <th>Control</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($admins as $admin)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$admin->name}}</td>
                                    <td>{{$admin->email}}</td>
                                    <td>{{$admin->type}}</td>
                                    <td>{{date('d-m-Y',strtotime($admin->created_at))}}</td>
                                    <td class="d-flex">
                                        @can('admins.view')
                                            <a href="{{route('admin.admins.show',$admin->id)}}"
                                               class="btn btn-primary ml-4">View</a>
                                        @endcan
                                        @can('admins.edit')
                                            <a href="{{route('admin.admins.edit',$admin->id)}}"
                                               class="btn btn-success ml-4">Edit</a>
                                        @endcan
                                        @can('admins.delete')
                                            <a class="btn btn-danger" id="delete-button"
                                               data-id="{{$admin->id}}">Delete</a>
                                        @endcan
                                    </td>
                                    @can('admins.edit')
                                        <td>
                                            <input type="checkbox" data-id="{{ $admin->id }}" name="status"
                                                   class="js-switch status" {{ $admin->status == 'active' ? 'checked' : '' }}>
                                        </td>
                                    @endcan
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-center text-danger text-lg text-bold" colspan="7">No admins defined
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <!--switchery js-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.js"></script>
    <script>
        let elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
        elems.forEach(function (html) {
            let switchery = new Switchery(html, {size: 'small'});
        });
        $(document).ready(function () {
            $('.status').change(function () {
                let status = $(this).prop('checked') === true ? 'active' : 'inactive';
                let admin_id = $(this).data('id');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': '{{csrf_token()}}'
                    }
                });
                $.ajax({
                    type: "put",
                    dataType: "json",
                    url: '/admin/dashboard/admins/status-update/' + admin_id,
                    data: {'status': status},
                    success: function (data) {
                        Swal.fire(
                            'تم!',
                            data.message,
                            'success'
                        )
                    }
                });
            });
        });

    </script>
    <script>
        let d_btn = document.querySelectorAll('#delete-button');
        d_btn.forEach(function (btn) {
            btn.addEventListener('click', function () {
                let id = btn.getAttribute('data-id');
                Swal.fire({
                    title: '?Are You Sure',
                    text: "!You will not be able to revert this",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    cancelButtonText: 'Cancel',
                    confirmButtonText: 'Yes, Confirm'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire(
                            'Deleted!',
                            'Deleted Successfully',
                            'success'
                        ).then(() => {

                            fetch('/admin/dashboard/admins/' + id, {
                                method: 'DELETE',
                                headers: {
                                    'X-CSRF-TOKEN': "{{csrf_token()}}",
                                    'Content-Type': 'application/json'
                                }
                            }).then(() => {
                                location.reload();
                            }).catch((error) => {
                                console.error('Error:', error);
                            });
                        });
                    }
                });
            })
        })
    </script>

@endsection
