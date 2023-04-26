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
                <h4 class="content-title mb-0 my-auto">Admins</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/ Create</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <form action="{{route('admin.admins.store')}}" method="post">
        @csrf
        <div class="form-group">
            <label>Name</label>
            <input class="form-control" type="text" name="name">
            @error('name')
            <div class="alert alert-danger mt-2">{{$message}}</div>
            @enderror

        </div>
        <div class="form-group">
            <label>Email</label>
            <input class="form-control" type="text" name="email">
            @error('email')
            <div class="alert alert-danger mt-2">{{$message}}</div>
            @enderror
        </div>
        <div class="form-group">
            <label>Phone</label>
            <input class="form-control" type="text" name="phone">
            @error('phone')
            <div class="alert alert-danger mt-2">{{$message}}</div>
            @enderror
        </div>


        <fieldset>
            <legend>{{ __('Roles') }}</legend>

            @foreach ($roles as $role)
                <div class="form-check">
                    <label class="form-check-label">
                        {{ $role->name }}
                    </label>

                    <input class="form-check-input" type="radio" name="role"
                           value="{{$role->id}}">
                </div>
            @endforeach
        </fieldset>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Insert</button>
        </div>

    </form>

    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
@endsection
