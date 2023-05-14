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
                <h4 class="content-title mb-0 my-auto">Payments Methods</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/ All</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')

    <!-- row -->
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Image</th>
            <th colspan="2">Options</th>
        </tr>
        </thead>
        <tbody>

        @forelse($methods as $method)

            <tr>
                <td>{{$loop->iteration}}</td>
                <td><a href="{{route('admin.payment_methods.show',$method->id)}}">{{$method->name}}</a></td>
                <td><img src="{{asset('storage/'.$method->icon)}}"></td>

                <td>
                    <a href="{{route('admin.payment_methods.edit',$method->id)}}"
                       class="btn btn-sm btn-outline-success">Edit</a>
                </td>
                <td>
                    <form action="{{route('admin.payment_methods.destroy',$method->id)}}" method="post">
                        {{csrf_field()}}
                        <!--Form method spoofing-->
                        {{--<input type="hidden" name="_method" value="delete">--}}
                        @method('delete')
                        <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td class="text-center text-danger text-lg text-bold" colspan="4">No roles defined</td>
            </tr>
        @endforelse
        </tbody>
    </table>
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')

@endsection
