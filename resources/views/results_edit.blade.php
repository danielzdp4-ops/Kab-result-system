@extends('layout')
@section('content')
<div class="row justify-content-center"><div class="col-md-6"><div class="card shadow">
<div class="card-header bg-primary text-white">Edit Result</div>
<div class="card-body">
<form method="POST" action="/results/{{ $result->id }}">@csrf @method('PUT')
<label>Student</label>
<select name="student_id" class="form-control mb-2" required>
@foreach($students as $s)<option value="{{ $s->id }}" {{ $result->student_id==$s->id?'selected':'' }}>{{ $s->name }} - {{ $s->reg_no }}</option>@endforeach
</select>
<label>Course Code</label><input name="course_code" value="{{ $result->course_code }}" class="form-control mb-2" required>
<label>Course Name</label><input name="course_name" value="{{ $result->course_name }}" class="form-control mb-2" required>
<label>Score</label><input type="number" name="score" value="{{ $result->score ?? $result->marks }}" class="form-control mb-3" required>
<button class="btn btn-primary w-100">Update Result</button>
<a href="/results" class="btn btn-secondary w-100 mt-2">Cancel</a>
</form></div></div></div></div>
@endsection