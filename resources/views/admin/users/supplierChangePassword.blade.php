@extends('layouts.sample')
@section('title', 'Change Password')
@section('content')
<!-- partial -->

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h4 class="card-title">Change Password</h4>
                        </div>
                        <form method="POST" action="{{ route('users.updateSupplierPassword', Auth::id()) }}">
                            @csrf
                            @method('PUT')
                            <div class="col-md-12 grid-margin stretch-card">
                                <div class="card">
                                    @if ($errors->any())
                                    <div class="alert alert-danger">
                                            @foreach ($errors->all() as $error)
                                                <p>{{ $error }}</p>
                                            @endforeach
                                    </div>
                                    @endif
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Old Password</label>
                                            <input type="password" class="form-control" name="oldpassword" required> 
                                        </div>
                                        <div class="form-group">
                                            <label>New Password</label>
                                            <input id="password" type="password" class="form-control" name="newpassword" required autocomplete="newpassword">
                                        </div>
                                        <div class="form-group">
                                            <label>Confirm Password</label>
                                            <input id="password-confirm" type="password" class="form-control" name="newpassword_confirmation" required autocomplete="newpassword_confirmation">
                                        </div>
                                                                       
                                        <button type="submit" class="btn btn-primary">Update</button>     
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
</div>
<!-- main-panel ends -->
@endsection
