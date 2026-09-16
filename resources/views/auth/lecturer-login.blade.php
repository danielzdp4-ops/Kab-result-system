@extends('layouts.app')
@section('content')
<h2>Lecturer Login - Secure</h2>
<form method="POST" action="/login">
@csrf
<label>Email</label>
<input type="email" name="email" required placeholder="lecturer@university.ac.ug" value="admin@bit.com">
<label>Password</label>
<input type="password" name="password" required value="123456">
<button>Login as Lecturer</button>
</form>
@endsection