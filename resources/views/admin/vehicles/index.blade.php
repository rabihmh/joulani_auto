@extends('layouts.master')
@section('title')
    Admin - Vehicles
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
                <h4 class="content-title mb-0 my-auto">Vehicles</h4><span
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
                                <th>ID</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Created at</th>
                                <th>Added by</th>
                                <th>Control</th>
                                <th>Status</th>
                                <th>Is Special</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($vehicles as $vehicle)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$vehicle->made->name.', '.$vehicle->mould->name}}</td>
                                    <td>
                                        <img style="width:100px" src="{{asset('storage').'/'.$vehicle->main_image}}">
                                    </td>
                                    <td>{{date('d-m-Y',strtotime($vehicle->created_at))}}</td>
                                    <td>{{$vehicle->user->name}}</td>
                                    <td class="d-flex">
                                        <a href="{{route('admin.vehicles.show',$vehicle->id)}}"
                                           class="btn btn-primary ml-4">View</a>
                                        <a class="btn btn-success ml-4">Edit</a>
                                        <a type="submit" class="btn btn-danger"
                                           onclick="document.getElementById('form_delete').submit()">Delete</a>
                                        <form action="{{route('admin.vehicles.destroy',$vehicle->id)}}" method="POST"
                                              id="form_delete">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                    <td>
                                        <input type="checkbox" data-id="{{ $vehicle->id }}" name="status"
                                               class="js-switch status" {{ $vehicle->status == 'active' ? 'checked' : '' }}>
                                    </td>
                                    <td>
                                        <input type="checkbox" data-id="{{ $vehicle->id }}" name="is_special"
                                               class="js-switch special" {{ $vehicle->is_special == 1 ? 'checked' : '' }}>
                                    </td>

                                </tr>
                            @empty
                                <tr>
                                    <td class="text-center text-danger text-lg text-bold" colspan="8">No Vehicles
                                        defined
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div><!-- bd -->
                </div><!-- bd -->
            </div><!-- bd -->
        </div>
    </div>
    <!-- row closed -->
    </div>
    <div class="text-center m-auto">
        {{$vehicles->withQueryString()->links()}}
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
    </script>
    <script>
        $(document).ready(function () {
            $('.status').change(function () {
                let status = $(this).prop('checked') === true ? 'active' : 'inactive';
                let vehicle_id = $(this).data('id');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': '{{csrf_token()}}'
                    }
                });
                $.ajax({
                    type: "put",
                    dataType: "json",
                    url: '/admin/dashboard/vehicles/status-update/' + vehicle_id,
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
            $('.special').change(function () {
                let special = $(this).prop('checked') === true ? 1 : 0;
                let vehicle_id = $(this).data('id');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': '{{csrf_token()}}'
                    }
                });
                $.ajax({
                    type: "put",
                    dataType: "json",
                    url: '/admin/dashboard/vehicles/set-is-special/' + vehicle_id,
                    data: {'special': special},
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
@endsection
