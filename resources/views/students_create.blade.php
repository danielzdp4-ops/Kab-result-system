@extends('layout')
@section('content')
<div class="row justify-content-center">
<div class="col-md-6">
<div class="card shadow">
<div class="card-header bg-dark text-white d-flex justify-content-between">
<span>Add New Student - Kabale University</span>
<span class="badge bg-success">Lecturer / Admin</span>
</div>
<div class="card-body">
@if($errors->any()) <div class="alert alert-danger">{{$errors->first()}}</div> @endif

<form method="POST" action="/students">
@csrf
<div class="mb-3">
<label class="fw-bold">Full Name *</label>
<input name="name" class="form-control" required placeholder="e.g Joshua Nuwagaba">
</div>

<div class="mb-3">
<label class="fw-bold">Registration Number * (Login ID)</label>
<input name="reg_no" class="form-control" required placeholder="2025/A/BIT/8266/F">
<small class="text-muted">This will be student's username - must be unique</small>
</div>

<div class="mb-3">
<label class="fw-bold">Course / Program</label>
<input name="course" class="form-control" value="Bachelor of IT" placeholder="Bachelor of IT">
</div>

<div class="mb-3">
<label class="fw-bold">Set Initial Password (Optional)</label>
<input name="password" class="form-control" placeholder="Leave blank = auto generates e.g 8266@KAB">
<small class="text-muted">If blank, system will generate unique password from Reg No. Each student gets different.</small>
</div>

<div class="d-flex gap-2 mt-4">
<button class="btn btn-primary flex-grow-1">💾 Save Student</button>
<a href="/students" class="btn btn-secondary flex-grow-1">⬅️ Back - Cancel</a>
</div>

</form>

<div class="alert alert-info mt-3 small">
<b>Privacy Note:</b> Password is auto-hashed. Student must change on first login. No two students share same password.
</div>

</div>
</div>
</div>
</div>
@endsection