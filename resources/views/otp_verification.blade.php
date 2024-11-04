@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h3 class="mt-5 text-center text-warning">Email Verification</h3>
            @if (session('activated'))
                <div class="alert alert-success" role="alert">
                    {{ session('activated') }}
                </div>
            @endif
            
            <form action="{{ route('verifyotp') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="">Enter OTP</label>
                    <input type="number" name="token" class="form-control" placeholder="Enter token">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>



        </div>
    </div>
</div>
@endsection
