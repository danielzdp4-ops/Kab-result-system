@extends('layout')
@section('content')
<div class="card shadow">
<div class="card-header bg-success text-white"><h4>Welcome {{ $student->name }} - {{ $student->reg_no }}</h4></div>
<div class="card-body">
@if(($stu->plain_password ?? '') == ($stu->password ?? '') || strlen($stu->plain_password ?? '') < 8 || Str::contains($stu->plain_password ?? '', '@KAB'))
<div class="alert alert-warning d-flex justify-content-between">Your password is still default! For your privacy, please change it now. <a href="/student/forgot" class="btn btn-sm btn-dark">Change Password</a></div>
@endif
<h5>Your Results and Grading</h5>
<table class="table table-bordered mt-3">
<thead class="table-dark"><tr><th>Course</th><th>Score</th><th>Grade</th><th>Remark</th></tr></thead>
<tbody>
@php $total=0; $count=0; @endphp
@forelse($results as $result)
@php
$score = isset($result->score) ? $result->score : $result->marks;
$total += $score; $count++;
if($score>=80){ $grade='A'; $remark='Excellent'; }
elseif($score>=70){ $grade='B'; $remark='Very Good'; }
elseif($score>=60){ $grade='C'; $remark='Good'; }
elseif($score>=50){ $grade='D'; $remark='Pass'; }
else{ $grade='F'; $remark='Fail'; }
@endphp
<tr>
<td>{{ $result->course_code }} - {{ $result->course_name }}</td>
<td>{{ $score }}</td>
<td><span class="badge bg-{{ $grade=='F'?'danger':'success' }}">{{ $grade }}</span></td>
<td>{{ $remark }}</td>
</tr>
@empty
<tr><td colspan="4" class="text-center">No results yet.</td></tr>
@endforelse
</tbody>
</table>

@if($count>0)
<div class="alert alert-info">Average: <b>{{ round($total/$count,2) }}%</b> | Total Courses: {{ $count }}</div>
@endif

<a href="/student/transcript" target="_blank" class="btn btn-dark">Print Transcript</a>
<a href="/student/logout" class="btn btn-danger">Logout</a>
<a href="/students" class="btn btn-secondary">Back</a>

</div></div>
@endsection