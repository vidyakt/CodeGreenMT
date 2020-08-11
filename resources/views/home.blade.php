@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">Profile</div>
                        <div class="col-md-6">
                            <a href="{{url('/editprofile', [$user_details->id])}}" class="btn btn-primary float-right">Edit Profile</a>
                        </div>
                    </div>

                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="form-group row">
                        <label for="" class="col-md-4">Name</label>
                        <label for="" class="col-md-8">{{$user_details->user_detail->name}}</label>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-md-4">Email</label>
                        <label for="" class="col-md-8">{{$user_details->user_detail->email}}</label>
                    </div>
                       
                    <div class="form-group row">
                        <label for="" class="col-md-4">Date of Birth</label>
                        <label for="" class="col-md-8">{{$user_details->user_detail->dob}}</label>
                    </div> 

                    <div class="form-group row">
                        <label for="" class="col-md-4">City</label>
                        <label for="" class="col-md-8">{{$user_details->user_detail->city}}</label>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
