@extends('layouts.master')
@section('title')
    Admin - Moulds
@endsection
@section('css')
@endsection

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Moulds</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/ Trash</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
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
                                <th>Made</th>
                                <th>Created at</th>
                                <th>Control</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $i=0;
                            @endphp
                            @forelse($moulds as $mould)
                                <tr>
                                    <th scope="row">{{$i+=1}}</th>
                                    <td>{{$mould->name}}</td>
                                    <td><a href="{{route('admin.mades.show',$mould->made->id)}}">{{$mould->made->name}}</a></td>
                                    <td>{{date('d-m-Y',strtotime($mould->created_at))}}</td>
                                    <td class="d-flex">
                                        <form action="{{route('admin.moulds.restore',$mould->id)}}" method="POST"
                                              class="ml-4">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-success">Restore</button>
                                        </form>
                                        <form action="{{route('admin.moulds.force-delete',$mould->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Force Delete</button>
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
            </div><!-- bd -->
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
