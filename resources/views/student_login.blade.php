@extends('layout')
@section('content')
<div class="row justify-content-center">
<div class="col-md-5">
<div class="card shadow">
<div class="card-header bg-dark text-white">Student Login - Kabale University</div>
<div class="card-body">
@if(session('error')) <div class="alert alert-danger">{{session('error')}}</div> @endif
@if(session('success')) <div class="alert alert-success">{{session('success')}}</div> @endif
<form method="POST" action="/student/login">
@csrf
<div class="mb-3"><label>Reg No</label><input name="reg_no" class="form-control" placeholder="2025/A/BIT/8266/F" required></div>
<div class="mb-3"><label>Password</label><input type="password" name="password" class="form-control" required></div>
<button class="btn btn-success w-100">Login</button>
</form>
<hr>
<div class="d-flex justify-content-between">
<a href="/student/forgot" class="text-danger small">Forgot Password? Click to Recover</a>
<a href="/" class="small">Back Home</a>
</div>
<p class="mt-2 small text-muted">Use password given by admin. You will be required to change it on first login for privacy.</p>
</div>
</div>
</div>
</div>
@endsection