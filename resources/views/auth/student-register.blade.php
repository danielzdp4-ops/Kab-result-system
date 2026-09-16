@extends('layouts.app')
@section('content')
<h2>Register New BIT Student</h2>
<form method="POST" action="/student/register">
@csrf
<label>Full Name</label>
<input name="name" required placeholder="Daniel Praiz">
<label>Reg No</label>
<input name="reg_no" required placeholder="BIT/002/2024">
<label>Email</label>
<input type="email" name="email" required>
<label>Password</label>
<input type="password" name="password" value="123456" required>
<button>Register Student</button>
</form>
@endsection