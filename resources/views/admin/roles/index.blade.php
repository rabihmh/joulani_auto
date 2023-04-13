@extends('layouts.master')
@section('title')
    Admin - Roles
@endsection
@section('css')
@endsection

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Roles</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/ All</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <div class="mb-5">
        @can('create','App\Models\Role')
            <a href="{{route('admin.roles.create')}}" class="btn btn-sm btn-outline-primary mx-auto">Add
                Roles</a>
        @endcan

    </div>
    <!-- row -->
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Created At</th>
            <th colspan="2">Options</th>
        </tr>
        </thead>
        <tbody>
        @php
            $i=0;
        @endphp
        @forelse($roles as $role)

            <tr>
                <td>{{$i+=1}}</td>
                <td><a href="{{route('admin.roles.show',$role->id)}}">{{$role->name}}</a></td>
                <td>{{$role->created_at}}</td>

                    <td>
                        <a href="{{route('admin.roles.edit',$role->id)}}"
                           class="btn btn-sm btn-outline-success">Edit</a>
                    </td>
                    <td>
                        <form action="{{route('admin.roles.destroy',$role->id)}}" method="post">
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
    <div class="text-center">
        {{$roles->withQueryString()->links()}}
    </div>
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')

@endsection
