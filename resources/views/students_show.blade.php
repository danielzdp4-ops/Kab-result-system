@extends('layout')
@section('content')
@php
$stu = $student ?? $s ?? null;
@endphp

@if(!$stu)
<div class="alert alert-danger">Student not found</div>
@else
<div class="row">
<div class="col-md-4">
<div class="card shadow">
<div class="card-header bg-primary text-white">Student Particulars</div>
<div class="card-body">
<p><b>Name:</b> {{$stu->name}}</p>
<p><b>Reg No:</b> <span class="badge bg-dark">{{$stu->reg_no}}</span></p>
<p><b>Email:</b> {{$stu->email ?? 'N/A'}}</p>
<p><b>Course:</b> {{$stu->course ?? 'N/A'}}</p>
<p><b>Login Password:</b> <span class="badge bg-success">{{$stu->plain_password ?? '123456'}}</span></p>
<p><b>Total Courses:</b> {{$results->count() ?? $stu->results->count() ?? 0}}</p>
<hr>
<a href="/students/{{$stu->id}}/edit" class="btn btn-primary btn-sm">Edit</a>
<a href="/students/{{$stu->id}}/reset" class="btn btn-warning btn-sm">Reset Password</a>
<a href="/students" class="btn btn-secondary btn-sm">Back</a>
</div>
</div>
</div>

<div class="col-md-8">
<div class="card shadow">
<div class="card-header">Results</div>
<div class="card-body">
@if(isset($results) && $results->count()>0)
<table class="table table-bordered">
<tr><th>Course</th><th>Score</th><th>Grade</th></tr>
@foreach($results as $r)
<tr>
<td>{{$r->course_name ?? $r->subject ?? 'Course'}}</td>
<td>{{$r->score ?? $r->marks ?? 0}}</td>
<td>
@php $sc=$r->score ?? $r->marks ?? 0; @endphp
@if($sc>=80) A @elseif($sc>=70) B @elseif($sc>=60) C @elseif($sc>=50) D @else F @endif
</td>
</tr>
@endforeach
</table>
@else
<p>No results yet. <a href="/results/create">Add Result</a></p>
@endif
</div>
</div>
</div>
</div>
@endif
@endsection