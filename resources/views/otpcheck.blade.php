@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">Confirm Your Account</div>
                        
                    </div>

                </div>

                <div class="card-body">
                    @if(Session::has('message'))
                        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                    @endif
                    <form action="{{url('/checkotp')}}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label for="" class="col-md-4">Enter OTP</label>
                            <div class="col-md-8">
                                <input id="otp" type="text" class="form-control @error('otp') is-invalid @enderror" name="otp" required autocomplete="new-otp">
                            </div>
                        </div>
                        <input type="submit" value="Submit" class="btn btn-success">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
