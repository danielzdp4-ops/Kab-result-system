@extends('layout')
@section('content')
<div class="row">
<div class="col-md-4">
<div class="card shadow"><div class="card-header bg-primary text-white"><h5>Student Particulars</h5></div>
<div class="card-body">
<p><b>Name:</b> {{$student->name}}</p>
<p><b>Reg No:</b> <span class="badge bg-dark">{{$student->reg_no}}</span></p>
<p><b>Email:</b> {{$student->email}}</p>
<p><b>Total Courses:</b> {{$student->results->count()}}</p>
<p><b>Login Password:</b> <i>Encrypted (Default 123456)</i></p>
<hr>
<a href="/students/{{$student->id}}/reset" class="btn btn-warning w-100 mb-2">Reset Password to 123456</a>
<a href="/students/{{$student->id}}/edit" class="btn btn-primary w-100 mb-2">Edit Particulars</a>
<a href="/students" class="btn btn-secondary w-100">Back to All Students</a>
</div></div>
</div>
<div class="col-md-8">
<div class="card shadow"><div class="card-header bg-success text-white"><h5>Results & Grading for {{$student->name}}</h5></div>
<div class="card-body">
<table class="table table-bordered"><thead class="table-dark"><tr><th>Course</th><th>Score</th><th>Grade</th><th>Remark</th></tr></thead><tbody>
@php $total=0; @endphp
@forelse($student->results as $r) @php $s=$r->score??$r->marks; $total+=$s; $g=$s>=80?'A':($s>=70?'B':($s>=60?'C':($s>=50?'D':'F')); @endphp
<tr><td>{{$r->course_code}} - {{$r->course_name}}</td><td>{{$s}}</td><td><span class="badge bg-{{$g=='F'?'danger':'success'}}">{{$g}}</span></td><td>{{$g=='F'?'Fail':'Pass'}}</td></tr>
@empty <tr><td colspan="4">No results yet</td></tr> @endforelse
</tbody></table>
@if($student->results->count()>0)<div class="alert alert-info">Average: <b>{{round($total/$student->results->count(),2)}}%</b></div>@endif
</div></div>
</div>
</div>
@endsection