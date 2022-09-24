@extends('admin.admin_master')

@section('admin')

 <div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">

            <div class="col-lg-6">
                <div class="card">
                    <center>
                        <img class="card-img-top img-fluid" src="{{(!empty($adminData->profile_image)) ? url('upload/admin_image/'.$adminData->profile_image):url('upload/nophoto.jpg')}}" alt="Card image cap" style="width: 150px">
                    </center>
                    <div class="card-body">
                        <h4 class="card-title">Name : {{ $adminData->name }}</h4>
                        <hr>
                        <h4 class="card-title">Email : {{ $adminData->email }}</h4>
                        <hr>
                        <a href="{{route('edit.profile')}}" class="btn btn-info btn-rounded waves-effect waves-light">Edit Profile</a>
                    </div>
                </div>
            </div>
    </div>
    </div>
    </div>

@endsection
