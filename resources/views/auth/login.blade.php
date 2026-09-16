@extends('layouts.app')
@section('content')
<h2>Lecturer Login - Secure</h2>
<form method="POST" action="/login">
@csrf
<label>Lecturer Email</label>
<input type="email" name="email" required placeholder="lecturer@bit.com" value="admin@bit.com">
<label>Password</label>
<input type="password" name="password" required value="123456">
<button style="background:#2c2e6f">Login as Lecturer</button>
<p style="text-align:center;margin-top:15px">Only Lecturers can enter results</p>
</form>
@endsection