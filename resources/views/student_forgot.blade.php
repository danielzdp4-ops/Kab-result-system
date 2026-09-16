@extends('layout')
@section('content')
<div class="row justify-content-center">
<div class="col-md-5">
<div class="card shadow">
<div class="card-header bg-warning">Recover Password - Kabale University</div>
<div class="card-body">
@if(session('error')) <div class="alert alert-danger">{{session('error')}}</div> @endif
<form method="POST" action="/student/forgot">
@csrf
<div class="mb-2"><label>Reg No</label><input name="reg_no" class="form-control" required placeholder="Enter your Registration Number"></div>
<div class="mb-2"><label>Full Name (for verification)</label><input name="name" class="form-control" required placeholder="Enter name as registered"></div>
<div class="mb-2"><label>New Password</label><input type="password" name="password" class="form-control" required minlength="4" placeholder="Enter new password"></div>
<div class="mb-3"><label>Confirm New Password</label><input type="password" name="password_confirmation" class="form-control" required></div>
<button class="btn btn-warning w-100">Reset My Password</button>
</form>
<hr>
<a href="/student/login">Back to Login</a>
</div>
</div>
</div>
</div>
@endsection