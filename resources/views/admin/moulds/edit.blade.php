@extends('layouts.master')
@section('css')
@endsection

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Mades</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/ Edit</span>
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
                    <form action="{{route('admin.moulds.update',$mould->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-lg-9 col-md-8 form-group mg-b-0">
                                <label class="form-label">Made Name: <span class="tx-danger">*</span></label>
                                <input class="form-control" name="name" placeholder="Enter made name" type="text"
                                       value="{{$mould->name}}">
                                @error('name')
                                <p class="text-danger mt-2">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="col-lg-3 col-md-4 mg-t-10 mg-sm-t-25">
                                <button class="btn btn-main-primary pd-x-20" type="submit">Update</button>
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
