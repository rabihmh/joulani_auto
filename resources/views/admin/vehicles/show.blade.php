@extends('layouts.master')
@section('title')
    Admin -{{$vehicle->vehicle_name}}
@endsection
@section('css')
    <style>
        img.active {
            border-bottom: 10px solid black;
        }
    </style>
@endsection

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Vehicles</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{$vehicle->vehicle_name}}</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-lg-12">
            <h1>set Main Images</h1>
            @foreach($images as $image)

                <img id="img" data-image="{{$image}}" style="height: 300px" alt="Responsive image"
                     class="  img-thumbnail wd-100p wd-sm-200 {{$vehicle->main_image==$image?'active':''}} "
                     src="{{asset('storage/'.$image)}}">

            @endforeach
        </div>
    </div>
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <script>
        let imgElements = document.querySelectorAll('#img');

        imgElements.forEach(function (imgElement) {
            imgElement.addEventListener('click', function () {
                let id = {{$vehicle->id}};
                let img = this.getAttribute('data-image');
                let xhr = new XMLHttpRequest();
                xhr.open('PUT', 'http://127.0.0.1:8000/admin/dashboard/vehicles/set_main_image/' + id);
                xhr.setRequestHeader('X-CSRF-TOKEN', "{{csrf_token()}}");
                xhr.setRequestHeader('Content-Type', 'application/json');
                xhr.onreadystatechange = function () {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        imgElements.forEach(function (img) {
                            img.classList.remove('active')
                        });
                        this.classList.add('active');
                        alert('updated');
                    }
                }.bind(this);
                let data = JSON.stringify({image: img});
                xhr.send(data);
            });
        });
    </script>
@endsection
