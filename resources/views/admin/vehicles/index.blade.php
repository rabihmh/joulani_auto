@extends('layouts.master')
@section('title')
    Admin - Vehicles
@endsection
@section('css')
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
                                        <a href="{{route('admin.vehicles.show',$vehicle->id)}}"class="btn btn-primary ml-4">View</a>
                                        <a class="btn btn-success ml-4">Edit</a>
                                        <form action="" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-center text-danger text-lg text-bold" colspan="4">No Vehicles
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
@endsection
