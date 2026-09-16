<!DOCTYPE html><html><head><title>Edit Result</title><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"></head><body class="bg-light">
<div class="container mt-4 col-md-6"><div class="card shadow"><div class="card-header"><h5>Edit Result</h5></div><div class="card-body">
<form method="POST" action="/results/{{$result->id}}">@csrf @method('PUT')
<label>Student</label><select name="student_id" class="form-select mb-3">@foreach($students as $s)<option value="{{$s->id}}" {{$result->student_id==$s->id?'selected':''}}>{{$s->name}}</option>@endforeach</select>
<label>Course Code</label><input name="course_code" value="{{$result->course_code}}" class="form-control mb-2" required>
<label>Course Name</label><input name="course_name" value="{{$result->course_name}}" class="form-control mb-3" required>
<label>Score</label><input type="number" name="score" value="{{$result->score}}" class="form-control mb-3" required>
<button class="btn btn-success w-100">Update</button></form></div></div></div></body></html>