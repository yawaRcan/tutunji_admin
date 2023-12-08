@extends('admin.layouts.master')
<!-- title -->
@section('title')
    <title> Add Role </title>
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
{{--                        <h1>Add Role Form</h1>--}}
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
{{--                            <li class="breadcrumb-item"><a href=""></a>Properties</li>--}}
{{--                            <li class="breadcrumb-item"><a href="#">Role</a></li>--}}
                        </ol>
                    </div>
                </div>
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
                            <div class="card-header" style="background-color: #1ED65f">
                                <h3 class="card-title">Add Role</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{url('/admin/add-role')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <!-- success-message -->
                                    @if(Session()->has('success'))
                                        <div class="alert alert-success">
                                            {{ session()->get('success') }}
                                        </div>
                                    @endif
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Role Name<span style="color: red;">*</span></label>
                                                <input type="text" name="roleName" id="roleName" class="form-control" value="{{old('roleName')}}" placeholder="Enter role name">
                                               @error('roleName')<p style="color: red;">{{$message}}</p>@enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="row">
                                                    @foreach($permissionData as $permissionValue)
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <input type="checkbox" name="permission[]" value="{{$permissionValue->id}}">&nbsp;<b>{{$permissionValue->name}}</b>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
{{--                                    <div class="row">--}}
{{--                                        <div class="col-md-6">--}}
{{--                                            <label>Amenities</label>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-md-6">--}}
{{--                                            <div class="form-group">--}}
{{--                                                <div class="row">--}}
{{--                                                    @foreach($checkBoxValue as $dataValue)--}}
{{--                                                        <div class="col-md-4">--}}
{{--                                                            <div class="form-group">--}}
{{--                                                                <input type="checkbox" name="amenities[]" value="{{$dataValue->id}}">&nbsp;{{$dataValue->name}}--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    @endforeach--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary" style="background-color: #1ED65F;border-color: #1ED65F;">Save</button>
                                    <a href="{{url('/admin/list-roles')}}" class="btn btn-default" style="background-color: #949496;border-color: #949496;color: white">Back</a>
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
@endsection


