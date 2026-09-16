<!DOCTYPE html><html><head><title>Add Result</title><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"></head><body class="bg-light">
<nav class="navbar navbar-dark bg-dark"><div class="container"><a class="navbar-brand" href="/">Student Result System</a><a href="/results" class="btn btn-light btn-sm">Back to Results</a></div></nav>
<div class="container mt-4"><div class="row justify-content-center"><div class="col-md-7"><div class="card shadow"><div class="card-header bg-primary text-white"><h5 class="m-0">Add New Result - BIT</h5></div>
<div class="card-body">
@if(session('success'))<div class="alert alert-success">{{session('success')}}</div>@endif
<form method="POST" action="/results">@csrf
<label>Student</label><select name="student_id" class="form-select mb-3" required><option value="">Select Student</option>@foreach($students as $s)<option value="{{$s->id}}">{{$s->name}} - {{$s->reg_no}}</option>@endforeach</select>
<label>Course Code</label><select name="course_code" class="form-select mb-2" required><option value="BIT2101">BIT2101 - System Integration</option><option value="BIT2102">BIT2102 - E-commerce</option><option value="BIT2103">BIT2103 - Scripting</option><option value="BIT2104">BIT2104 - OOP</option><option value="BIT2105">BIT2105 - SAD</option><option value="BIT2106">BIT2106 - Network Security</option></select>
<label>Course Name</label><input name="course_name" class="form-control mb-3" required placeholder="e.g System Integration and Architecture">
<label>Score (0-100)</label><input type="number" name="score" class="form-control mb-3" min="0" max="100" required>
<button class="btn btn-primary w-100">Save Result & Show Grading</button></form></div></div></div></div></div></body></html>