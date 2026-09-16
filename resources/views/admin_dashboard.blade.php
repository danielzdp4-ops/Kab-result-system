@extends('layout')
@section('content')
@php
$stu = $student?? $s?? null;
@endphp

<div class="card shadow">
<div class="card-header bg-success text-white"><h4>Welcome {{$stu->name?? ''}} - {{$stu->reg_no?? ''}}</h4></div>
<div class="card-body">
<h5>Your Results and Grading</h5>
<table class="table table-bordered mt-3">
<thead class="table-dark"><tr><th>Course</th><th>Score</th><th>Grade</th><th>Remark</th></tr></thead>
<tbody>
@forelse($results?? [] as $r)
@php $sc=$r->score?? $r->marks?? 0; @endphp
<tr>
<td>{{$r->course_name?? $r->subject?? 'Course'}}</td>
<td>{{$sc}}</td>
<td>
@if($sc>=80) A @elseif($sc>=70) B @elseif($sc>=60) C @elseif($sc>=50) D @else F @endif
</td>
<td>@if($sc>=50) Pass @else Fail @endif</td>
</tr>
@empty
<tr><td colspan="4">No results yet.</td></tr>
@endforelse
</tbody>
</table>
<a href="/student/transcript" class="btn btn-primary btn-sm">View Transcript</a>
<a href="/student/logout" class="btn btn-danger btn-sm">Logout</a>
</div>
</div>
@endsection