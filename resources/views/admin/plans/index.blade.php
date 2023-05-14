@extends('layouts.master')
@section('title')
    Admin - Plans
@endsection
@section('css')
@endsection

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Plans</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/ All</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Billing Cycle</th>
            <th>Vehicle Limit</th>
            <th colspan="2">Options</th>
        </tr>
        </thead>
        <tbody>

        @forelse($plans as $plan)

            <tr>
                <td>{{$loop->iteration}}</td>
                <td><a href="{{route('admin.plans.show',$plan->id)}}">{{$plan->name}}</a></td>
                <td>{{$plan->price}}</td>
                <td>{{$plan->billing_cycle}}</td>
                <td>{{$plan->vehicle_limit}}</td>
                <td>
                    <a href="{{route('admin.plans.edit',$plan->id)}}"
                       class="btn btn-sm btn-outline-success">Edit</a>
                </td>
                <td>
                    <form action="{{route('admin.plans.destroy',$plan->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td class="text-center text-danger text-lg text-bold" colspan="6">No roles defined</td>
            </tr>
        @endforelse
        </tbody>
    </table>
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
@endsection
