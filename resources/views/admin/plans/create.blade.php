@extends('layouts.master')
@section('title')
    Admin - Create
@endsection
@section('css')
@endsection

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Plans</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/ Create</span>
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
                    <form action="{{route('admin.plans.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-9 col-md-8">
                                <div class="form-group mg-b-0">
                                    <label class="form-label">Plan Name: <span class="tx-danger">*</span></label>
                                    <input class="form-control" name="name" placeholder="Enter plan name"
                                           type="text" value="{{old('name')}}">
                                    @error('name')
                                    <p class="text-danger mt-2">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-9 col-md-8">
                                <div class="form-group mg-b-0">
                                    <label class="form-label">Description : <span class="tx-danger">*</span></label>
                                    <input class="form-control" name="description" placeholder="Enter Description "
                                           type="text" value="{{old('description')}}">
                                    @error('description')
                                    <p class="text-danger mt-2">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-9 col-md-8">
                                <div class="form-group mg-b-0">
                                    <label class="form-label">Price : <span class="tx-danger">*</span></label>
                                    <input class="form-control" name="price" placeholder="Enter Price "
                                           type="number" value="{{old('price')}}">
                                    @error('description')
                                    <p class="text-danger mt-2">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-9 col-md-8">
                                <div class="form-group mg-b-0 mt-2">
                                    <label class="form-label">Cycle : <span class="tx-danger">*</span></label>
                                    <select class="form-control" name="billing_cycle">
                                        <option value="month">Month</option>
                                        <option value="year">Year
                                        </option>
                                    </select>
                                </div>

                            </div>
                            <div class="col-lg-9 col-md-8">
                                <div class="form-group mg-b-0">
                                    <label class="form-label">Vehicle Limit : <span class="tx-danger">*</span></label>
                                    <input class="form-control" name="vehicle_limit" placeholder="Enter vehicle limit "
                                           type="number" value="{{old('vehicle_limit')}}">
                                    @error('vehicle_limit')
                                    <p class="text-danger mt-2">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-9 col-md-8 mt-2">
                                <div class="form-group mg-b-0">
                                    <button class="btn btn-main-primary pd-x-20" type="submit">Create</button>
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
