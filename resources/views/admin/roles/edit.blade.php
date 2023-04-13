@extends('layouts.master')
@section('title')
    Admin - Roles - Edit
@endsection
@section('css')
@endsection

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Roles</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/ Edit</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <form action="{{route('admin.roles.update',$role->id)}}" method="post">
        @csrf
        @method('put')
        <div class="form-group">
            <label>Role Name</label>
            <input class="form-control" type="text" name="name" placeholder="Enter role name" value="{{$role->name}}">
            @error('name')
            <div class="alert alert-danger mt-2">{{$message}}</div>
            @enderror
        </div>
        @include('admin.roles._form',[
     'button_label'=>'Update'
 ])

    </form>
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')

@endsection
