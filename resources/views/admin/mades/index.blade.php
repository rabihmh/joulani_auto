@extends('layouts.master')
@section('title')
    Admin - Mades
@endsection
@section('css')
@endsection

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Mades</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/All</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <a href="{{route('admin.mades.trash')}}" class="btn btn-danger mb-4">Trash</a>
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
                                <th>Control</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($mades as $made)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$made->name}}</td>
                                    <td><img style="width: 50px" src="{{asset("storage/{$made->image}")}}"></td>
                                    <td>{{date('d-m-Y',strtotime($made->created_at))}}</td>
                                    <td class="d-flex">
                                        @can('mades.view')
                                            <a href="{{route('admin.mades.show',$made->id)}}"
                                               class="btn btn-primary ml-4">View</a>
                                        @endcan
                                        @can('mades.edit')
                                            <a href="{{route('admin.mades.edit',$made->id)}}"
                                               class="btn btn-success ml-4">Edit</a>
                                        @endcan
                                        @can('mades.delete')
                                            <form action="{{route('admin.mades.destroy',$made->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        @endcan
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-center text-danger text-lg text-bold" colspan="4">No mades defined
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
        {{$mades->withQueryString()->links()}}
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
@endsection
