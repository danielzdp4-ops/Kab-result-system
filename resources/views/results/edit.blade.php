@extends('layout')
@section('content')
<div class="row justify-content-center"><div class="col-md-6">
<div class="card shadow"><div class="card-header bg-dark text-white"><h5>Edit Result</h5></div>
<div class="card-body">
<form method="POST" action="/results/{{$result->id}}">@csrf @method('PUT')
<label>Student</label>
<select name="student_id" class="form-select mb-3" required>
@foreach($students as $s)<option value="{{$s->id}}" {{$result->student_id==$s->id?'selected':''}}>{{$s->name}} - {{$s->reg_no}}</option>@endforeach
</select>
<label>Course Code</label><input name="course_code" value="{{$result->course_code}}" class="form-control mb-2" required>
<label>Course Name</label><input name="course_name" value="{{$result->course_name}}" class="form-control mb-3" required>
<label>Score (0-100)</label><input type="number" name="score" value="{{$result->score??$result->marks}}" class="form-control mb-3" required>
<button class="btn btn-success w-100">Update Result</button>
<a href="/results" class="btn btn-secondary w-100 mt-2">Cancel - Back to Results</a>
</form></div></div></div></div>
@endsection