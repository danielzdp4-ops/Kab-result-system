@extends('layout')
@section('content')
<div class="row justify-content-center"><div class="col-md-6">
<div class="card shadow"><div class="card-header bg-dark text-white"><h5>Edit Student - Change Password</h5></div>
<div class="card-body">
<form method="POST" action="/students/{{$student->id}}">@csrf @method('PUT')
<label>Name</label><input name="name" value="{{$student->name}}" class="form-control mb-3" required>
<label>Reg No</label><input name="reg_no" value="{{$student->reg_no}}" class="form-control mb-3" required>
<label>Email</label><input name="email" value="{{$student->email}}" class="form-control mb-3">
<label>Current Password (Recoverable): <b>{{$student->plain_password??'not set'}}</b></label>
<input name="password" class="form-control mb-3" placeholder="Leave empty to keep, or type new password">
<button class="btn btn-success w-100">Update & Set New Password</button>
<a href="/students" class="btn btn-secondary w-100 mt-2">Cancel</a>
</form></div></div></div></div>
@endsection