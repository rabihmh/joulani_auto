@extends('layouts.master')
@section('css')
@endsection

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Mades</h4><span
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
                                <th>Created at</th>
                                <th>Control</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $i=0;
                            @endphp
                            @forelse($mades as $made)
                                <tr>
                                    <th scope="row">{{$i+=1}}</th>
                                    <td>{{$made->name}}</td>
                                    <td>{{date('d-m-Y',strtotime($made->created_at))}}</td>
                                    <td class="d-flex">
                                        <form action="{{route('admin.mades.restore',$made->id)}}" method="POST" class="ml-4">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-success">Restore</button>
                                        </form>
                                        <form action="{{route('admin.mades.force-delete',$made->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Force Delete</button>
                                        </form>

                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-center text-danger text-lg text-bold" colspan="4">No mades defined
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
