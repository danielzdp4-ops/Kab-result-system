@extends('layout')
@section('content')
<div class="row justify-content-center mt-5"><div class="col-md-8 text-center">
<h2>📚 Result Management System</h2><p class="text-muted">Choose your login</p>
<div class="row mt-4">
<div class="col-md-6"><div class="card shadow border-primary"><div class="card-body p-4">
<h4>👨‍🏫 Lecturer</h4><p>Manage Results & Students</p>
<a href="/admin/login" class="btn btn-primary btn-lg w-100">Lecturer Login</a>
<small class="d-block mt-2">admin / admin123</small>
</div></div></div>
<div class="col-md-6"><div class="card shadow border-success"><div class="card-body p-4">
<h4>🎓 Student</h4><p>View Transcript & GPA</p>
<a href="/student/login" class="btn btn-success btn-lg w-100">Student Login</a>
<small class="d-block mt-2">Reg No + Password</small>
</div></div></div>
</div>
<div class="alert alert-info mt-4">Security: Student trying Lecturer login will be blocked automatically.</div>
</div></div>
@endsection