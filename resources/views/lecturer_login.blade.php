@extends('layout')
@section('content')
<div class="row justify-content-center mt-5">
<div class="col-md-5">
<div class="card shadow">
<div class="card-header bg-dark text-white text-center">
<h5>KABALE UNIVERSITY</h5>
<small>Admin / Lecturer Login</small>
</div>
<div class="card-body">
@if(session('error')) <div class="alert alert-danger">{{session('error')}}</div> @endif
@if(session('success')) <div class="alert alert-success">{{session('success')}}</div> @endif

<form method="POST" action="/admin/login">
@csrf
<div class="mb-3">
<label class="fw-bold">Email Address</label>
<input type="email" name="email" class="form-control" required placeholder="admin@kab.ac.ug">
</div>
<div class="mb-3">
<label class="fw-bold">Password</label>
<input type="password" name="password" class="form-control" required placeholder="Enter password">
</div>
<button class="btn btn-dark w-100">Login to System</button>
</form>

<hr>
<div class="text-center">
<a href="/student/login" class="small">Are you a Student? Login Here</a><br>
<a href="/" class="small text-muted">Back to Home</a>
</div>

</div>
</div>
</div>
</div>
@endsection