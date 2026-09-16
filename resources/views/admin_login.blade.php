@extends('layout')
@section('content')
<div class="row justify-content-center"><div class="col-md-4"><div class="card shadow">
<div class="card-header bg-dark text-white">Lecturer / Admin Login</div>
<div class="card-body">
@if(session('error'))<div class="alert alert-danger">{{session('error')}}</div>@endif
<form method="POST" action="/admin/login">@csrf
<label>Username</label><input name="username" class="form-control mb-2" required value="admin">
<label>Password</label><input type="password" name="password" class="form-control mb-3" required value="admin123">
<button class="btn btn-dark w-100">Login as Lecturer</button>
</form>
<p class="mt-2 small">Student login is different: <a href="/student/login">Click here</a></p>
</div></div></div></div>
@endsection