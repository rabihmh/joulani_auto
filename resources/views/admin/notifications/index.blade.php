@extends('layouts.master')
@section('title')
    Admin - Notifications
@endsection
@section('css')
@endsection

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Notifications</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/ All</span>
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
                                <th>Content</th>
                                <th>Created at</th>
                                <th>Read at</th>
                                <th>Control</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($notifications as $notification)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>
                                        <a href="/{{$notification->data['url']}}?notification_id='{{$notification->id}}'">{{$notification->data['body']}}</a>
                                    </td>
                                    <td dir="ltr">{{ Carbon\Carbon::parse($notification->created_at)->locale('en')->diffForHumans() }}</td>
                                    @if($notification->read_at===null)
                                        <td>Not Read</td>
                                    @else
                                        <td dir="ltr">{{ Carbon\Carbon::parse($notification->read_at)->locale('en')->diffForHumans() }}</td>
                                    @endif
                                    <td class="d-flex">
                                        <a type="submit" class="btn btn-danger"
                                           onclick="document.getElementById('form_delete').submit()">Delete</a>
                                        <form action="{{route('admin.notifications.destroy',$notification->id)}}"
                                              method="POST"
                                              id="form_delete">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-center text-danger text-lg text-bold" colspan="">No Notifications
                                        defined
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
    <div class="text-center m-auto">
        {{$notifications->withQueryString()->links()}}
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
@endsection
