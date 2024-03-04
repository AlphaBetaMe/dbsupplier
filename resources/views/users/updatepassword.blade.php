@extends('layouts.admin')
@section('title', 'Create Categories')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">Password</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">Update</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Update Password</h4>
                        <form id="updatePasswordForm" action="{{ route('update-password.update', ['id' => Auth::id()]) }}" method="post">
                            @csrf
                            @method('PATCH')
                                    <div class="form-group">
                                        <label for="oldpassword">Old Password</label>
                                        <input type="password" id="oldpassword" class="form-control" name="oldpassword" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="newpassword">New Password</label>
                                        <input type="password" id="newpassword" class="form-control" name="newpassword" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="confirm-password">Confirm Password</label>
                                        <input type="password" id="confirm-password" class="form-control" name="confirm-password" required>
                                    </div>
                                    <div class="row mt-3">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-success">Update Password</button>
                                    </div>
                                </div>
                            </div>
                        </form>
        </div>
    </div>
</div>
@endsection
