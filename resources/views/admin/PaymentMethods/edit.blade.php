@extends('layouts.master')
@section('title')
    Admin - Payment Methods
@endsection
@section('css')
@endsection

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Payment methods</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/{{$method->name}}</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('admin.payment_methods.update',$method->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-lg-9 col-md-8">
                                <fieldset>
                                    <legend>Basic Information</legend>
                                    <div class="form-group mg-b-0">
                                        <label class="form-label">Method Name: <span class="tx-danger">*</span></label>
                                        <input class="form-control" name="name" placeholder="Enter method name" type="text" value="{{$method->name}}">
                                        @error('name')
                                        <p class="text-danger mt-2">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group mg-b-0 mt-2">
                                        <select class="form-control" name="status">
                                            <option value="active" @selected($method->status=='active')>Active</option>
                                            <option value="inactive" @selected($method->status=='inactive')>Inactive</option>
                                        </select>
                                    </div>
                                </fieldset>
                            </div>
                            <div class="col-lg-9 col-md-8 mt-2">
                                <fieldset class="form-group">
                                    <legend>Options</legend>
                                    @foreach($options as $key=>$option)
                                        <label>{{$option['label']}}</label>
                                        <input class="form-control" type="{{$option['type']}}" placeholder="{{$option['placeholder']}}" name="options[{{$key}}]" value="{{$method->options[$key]}}">
                                    @endforeach
                                </fieldset>
                            </div>
                            <div class="col-lg-9 col-md-8 mt-2">
                                <div class="form-group mg-b-0">
                                    <button class="btn btn-main-primary pd-x-20" type="submit">Update</button>
                                </div>
                            </div>
                        </div>

                    </form>
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
@endsection
