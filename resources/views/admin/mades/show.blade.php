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
                <h4 class="content-title mb-0 my-auto"><a href="{{route('admin.mades.index')}}">Mades</a></h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/{{$made->name}}</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <a href="{{route('admin.moulds.trash')}}" class="btn btn-danger mb-4">Trash</a>

    <div class="row">
        <div class="card-body">
            <form action="{{route('admin.moulds.store',$made->id)}}" method="post">
                @csrf
                <div class="row">
                    <div class="col-lg-9 col-md-8 form-group mg-b-0">
                        <label class="form-label">Mould Parent Name: <span class="tx-danger">*</span></label>
                        <select class="form-control" name="parent_id">
                            <option value="">-----</option>
                            @foreach($made->moulds as $mould )
                                <option value="{{$mould->id}}">{{$mould->name}}</option>
                            @endforeach
                        </select>
                        @error('parent_id')
                        <p class="text-danger mt-2">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="col-lg-9 col-md-8 form-group mg-b-0">
                        <label class="form-label">Mould Name: <span class="tx-danger">*</span></label>
                        <input class="form-control" name="name" placeholder="Enter mould name" type="text">
                        @error('name')
                        <p class="text-danger mt-2">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="col-lg-3 col-md-4 mg-t-10 mg-sm-t-25">
                        <button class="btn btn-main-primary pd-x-20" type="submit">Add</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="col-xl-12">
            <div class="card">
                <h1 class="text-center">All the available Moulds</h1>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped mg-b-0 text-md-nowrap">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Created at</th>
                                <th>Control</th>
                            </tr>
                            </thead>
                            <tbody>

                            @forelse($made->moulds as $mould)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$mould->name}}</td>
                                    <td>{{date('d-m-Y',strtotime($mould->created_at))}}</td>
                                    {{--                                    <td>{{$mould->created_at->diffForHumans(['short'=>'true'])}}</td>--}}
                                    <td class="d-flex">
                                        <a href="{{route('admin.moulds.edit',$mould->id)}}"
                                           class="btn btn-success ml-4">Edit</a>
                                        <form action="{{route('admin.moulds.destroy',$mould->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-center text-danger text-lg text-bold" colspan="4">No moulds defined
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div><!-- bd -->
                </div><!-- bd -->
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
@endsection
