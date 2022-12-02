@extends('layouts.master')
@section('css')
    <link href="{{asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/plugins/fileuploads/css/fileupload.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/plugins/fancyuploder/fancy_fileupload.css')}}" rel="stylesheet"/>
@endsection

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Vehicles</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/ Add</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        @if($errors)
            <ul>
                @foreach($errors->all() as $error)
                    <li class="text-danger">{{$error}}</li>
                @endforeach
            </ul>
        @endif
        <h1 class="text-center">Add A vehicle</h1>
            @if($errors)
                <ul>
                    @foreach($errors->all() as $error)
                        <li class="text-danger">{{$error}}</li>
                    @endforeach
                </ul>
            @endif
        <div class="col-lg-12 col-md-12">
            <form action="{{route('admin.vehicles.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <div class="row row-sm mg-b-20">
                            <div class="col-lg-6 mg-t-20 mg-lg-t-0">
                                <p class="mg-b-10">Mades</p>
                                <select class="form-control select2" name="made_id" id="mades">
                                    <option selected disabled>Choose the Made</option>
                                    @foreach($mades as $made)
                                        <option value="{{$made->id}}">
                                            {{$made->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <p class="mg-b-10">Moulds</p>
                                <select class="form-control select2-no-search" name="mould_id" id="moulds">
                                    <option disabled>Choose the Mould</option>
                                </select>
                            </div>
                        </div>
                        <div class="row row-sm mg-b-20">
                            <div class="col-lg-6 mg-t-20 mg-lg-t-0">
                                <p class="mg-b-10">Gear</p>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Enter gear type" type="text"
                                           autocomplete="off" name="gear">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <p class="mg-b-10">hp</p>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Enter horse power" type="text"
                                           autocomplete="off" name="hp">
                                </div>
                            </div>
                        </div>
                        <div class="row row-sm mg-b-20">
                            <div class="col-lg-6 mg-t-20 mg-lg-t-0">
                                <p class="mg-b-10">Power</p>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Enter Power " type="text"
                                           autocomplete="off" name="power">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <p class="mg-b-10">Mileage</p>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Enter mileage" type="text"
                                           autocomplete="off" name="mileage">
                                </div>
                            </div>
                        </div>
                        <div class="row row-sm mg-b-20">
                            <div class="col-lg-6 mg-t-20 mg-lg-t-0">
                                <p class="mg-b-10">Price</p>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Enter Price " type="number"
                                           autocomplete="off" name="price">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <p class="mg-b-10">Fuel</p>
                                <select class="form-control select2-no-search" name="fuel">
                                    <option value="benzine">Benzine</option>
                                    <option value="diesel">Diesel</option>
                                    <option value="electric">Electric</option>
                                </select>
                            </div>
                        </div>
                        <div class="row row-sm mg-b-20">
                            <div class="col-lg-6">
                                <p class="mg-b-10">Year of production</p>
                                <select class="form-control select2" name="year_of_production">
                                    @php
                                        for ($i=2022;$i>=1950;$i--){
                                       $option="<option value={$i}>{$i}</option>";
                                       echo $option;
                                        }
                                    @endphp
                                </select>
                            </div>
                        </div>
                        {{--                    <div class="row">--}}
                        {{--                        <div class="col-lg-12">--}}
                        {{--                            <div class="bg-gray-200 p-4">--}}

                        {{--                                <div class="form-group">--}}
                        {{--                                    <input class="form-control" placeholder="Enter your username" type="text"--}}
                        {{--                                           autocomplete="off">--}}
                        {{--                                </div>--}}
                        {{--                                <div class="form-group">--}}
                        {{--                                    <input class="form-control" placeholder="Enter your password" type="password">--}}
                        {{--                                </div>--}}
                        {{--                                <button class="btn btn-main-primary pd-x-20">Sign In</button>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                        {{--                    </div>--}}
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div>
                                            <h6 class="card-title mb-1">Images of car</h6>
                                            <h6 class="text-danger text-sm ">*Only 10 image</h6>
                                        </div>
                                        <div>
                                            <label
                                                class="custom-file-label" for="customFile">Choose file</label>
                                            <input name="images[]" type="file"
                                                   accept=".jpg, .png, image/jpeg, image/png" multiple max="10">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="text-center mb-4">

                        <button class="btn btn-main-primary pd-x-20 d-inline-block" type="submit">Sign In</button>
                    </div>

                </div>
            </form>
        </div>

    </div>
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <script src="{{asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
    <script src="{{asset('assets/plugins/jquery.maskedinput/jquery.maskedinput.js')}}"></script>
    <script src="{{asset('assets/plugins/spectrum-colorpicker/spectrum.js')}}"></script>
    <script src="{{asset('assets/plugins/select2/js/select2.min.js')}}"></script>
    <script src="{{asset('assets/plugins/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js')}}"></script>
    <script src="{{asset('assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.js')}}"></script>
    <script src="{{asset('assets/js/form-elements.js')}}"></script>

    <script src="{{asset('assets/plugins/fileuploads/js/fileupload.js')}}"></script>
    <script src="{{asset('assets/plugins/fileuploads/js/file-upload.js')}}"></script>
    <!--Internal Fancy uploader js-->
    <script src="{{asset('assets/plugins/fancyuploder/jquery.ui.widget.js')}}"></script>
    <script src="{{asset('assets/plugins/fancyuploder/jquery.fileupload.js')}}"></script>
    <script src="{{asset('assets/plugins/fancyuploder/jquery.iframe-transport.js')}}"></script>
    <script src="{{asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js')}}"></script>
    <script src="{{asset('assets/plugins/fancyuploder/fancy-uploader.js')}}"></script>
    <!--Internal  Form-elements js-->
    <script>
        $(document).ready(function () {
            $('#mades').change(function () {
                var id = $(this).val();

                $('#moulds').find('option').not(':first').remove();

                $.ajax({
                    url: 'http://127.0.0.1:8000/admin/dashboard/made/get-moulds-id/' + id,
                    type: 'get',
                    dataType: 'json',
                    success: function (response) {
                        var len = 0;
                        if (response.data != null) {
                            len = response.data.length;
                        }

                        if (len > 0) {
                            for (var i = 0; i < len; i++) {
                                var id = response.data[i].id;
                                var name = response.data[i].name;

                                var option = "<option value='" + id + "'>" + name + "</option>";

                                $("#moulds").append(option);
                            }
                        }
                    }
                })
            });
        });
    </script>

@endsection
