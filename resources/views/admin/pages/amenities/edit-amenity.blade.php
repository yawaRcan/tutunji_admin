@extends('admin.layouts.master')
@section('title')
    <title> Edit Amenity</title>
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Amenity</h1>
                    </div>
                    {{--                    <div class="col-sm-6">--}}
                    {{--                        <ol class="breadcrumb float-sm-right">--}}
                    {{--                            <li class="breadcrumb-item"><a href=""></a>Dashboard</li>--}}
                    {{--                            <li class="breadcrumb-item"><a href="#">Property</a></li>--}}
                    {{--                        </ol>--}}
                    {{--                    </div>--}}
                </div>
                {{--                <div class="text-right"><a href="{{url('/admin/add-property')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Add Property</a></div>--}}
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header" style="background-color: #1ED65F;">
                                <h3 class="card-title">Edit Amenity</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{url('/admin/edit-amenity',$amenityData->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <!-- validation-error message -->
                                    @if($errors->any())
                                        <div class="alert alert-danger">
                                            <p><strong>Opps Something went wrong</strong></p>
                                            <ul id="error_list">
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Name<span style="color: red;">*</span></label>
                                                <input type="text" name="name" class="form-control" value="{{(Input::old('name')) ? Input::old('name') : $amenityData->name }}" placeholder="Enter name">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Icon<span style="color: red;">*</span></label><br>
                                                <input type="file" name="file_icon" id="uploadphoto">
                                                <p style="color: grey">* Only SVG icons accepted.</p>
                                                @if($amenityData->icon)
                                                    <img src="{{asset('admin-panel/assets/property-images/amenities/icons/'.$amenityData->icon)}}" height="80px" width="80px" id="db_img">
                                                @endif
                                                    <img id="preview" src="" height="80px">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary" style="background-color: #1ED65F;border-color: #1ED65F;">Update</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!--/.col (left) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    <script>
        function readURL(input) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#preview').attr('src', e.target.result).show();
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#uploadphoto").change(function () {
            readURL(this);
            $('#preview').show();
            $('#db_img').hide();
        });

        $('#preview').on("click", function () {
            $('#uploadphoto').replaceWith(selected_photo = $('#uploadphoto').clone(true));
            $('#preview').removeProp('src').hide();;
        });
    </script>

@endsection
