@extends('admin.layouts.master')
@section('title')
    <title> All Today Website Members</title>
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>All Today Website Members</h1>
                    </div>
{{--                    <div class="col-sm-6">--}}
{{--                        <ol class="breadcrumb float-sm-right">--}}
{{--                            <li class="breadcrumb-item"><a href=""></a>Website Members</li>--}}
{{--                            <li class="breadcrumb-item"><a href="#">New Members</a></li>--}}
{{--                        </ol>--}}
{{--                    </div>--}}
                </div>
                {{--                <div class="text-right"><a href="{{url('/admin/add-property')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Add Property</a></div>--}}
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">List of Today Website Members</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            @include('flash-message')
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php($no = 1)
                                @foreach($todayMemberData as $newMember)
                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td>
                                            @if($newMember['image'] == null)
                                                <img src="{{asset('default/blank-profile.png')}}" class="profile-img" height="100px" width="100px">
                                            @else
                                                <img src="{{asset('frontend/assets/profile/'.$newMember['image'])}}" class="profile-img" height="100px" width="100px">
                                            @endif
                                        </td>
                                        <td>{{($newMember['name']) ? $newMember['name'] : '-'}}</td>
                                        <td>{{($newMember['email']) ? $newMember['email'] : '-'}}</td>
                                        <td>{{($newMember['phone']) ? $newMember['phone'] : '-'}}</td>
                                        <td>{{date('Y-m-d', strtotime($newMember['created_at'])) ? date('Y-m-d', strtotime($newMember['created_at'])) : '-'}}</td>
                                        <td>-</td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
