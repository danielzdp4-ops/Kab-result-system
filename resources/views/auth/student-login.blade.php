@extends('layouts.app')
@section('content')
<h2>Student Login - BIT Results</h2>
<form method="POST" action="/student/login">
@csrf
<label>Email</label>
<input type="email" name="email" required placeholder="student@bit.com">
<label>Password</label>
<input type="password" name="password" required>
<button>Login as Student</button>
<p style="text-align:center;margin-top:15px"><a href="/student/register">Don't have account? Register</a></p>
</form>
@endsection