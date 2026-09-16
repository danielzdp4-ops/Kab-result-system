@extends('layout')
@section('content')
<div class="card shadow"><div class="card-header d-flex justify-content-between bg-dark text-white"><h5 class="m-0">All Results - With Grading</h5><span class="badge bg-warning text-dark">{{count($results)}} Records</span></div>
<div class="card-body">
@if(session('success'))<div class="alert alert-success">{{session('success')}}</div>@endif
<table class="table table-bordered table-striped">
<thead class="table-dark"><tr><th>Student</th><th>Course</th><th>Score</th><th>Grade</th><th>Remark</th><th>Edit/Delete</th></tr></thead>
<tbody>
@foreach($results as $r) @php $s=$r->score??$r->marks; $grade = $s>=80?'A':($s>=70?'B':($s>=60?'C':($s>=50?'D':'F'))); $remark = $s>=80?'Excellent':($s>=70?'Very Good':($s>=60?'Good':($s>=50?'Pass':'Fail'))); $color = $grade=='A'?'success':($grade=='F'?'danger':'primary'); @endphp
<tr><td><b>{{$r->student->name?? 'N/A'}}</b><br><small>{{$r->student->reg_no??''}}</small></td>
<td>{{$r->course_code}}<br><small>{{$r->course_name}}</small></td>
<td><b>{{$s}}</b></td><td><span class="badge bg-{{$color}}">{{$grade}}</span></td><td>{{$remark}}</td>
<td><a href="/results/{{$r->id}}/edit" class="btn btn-sm btn-primary">Edit</a>
<form action="/results/{{$r->id}}" method="POST" style="display:inline" onsubmit="return confirm('Delete?')">@csrf @method('DELETE')<button class="btn btn-sm btn-danger">Del</button></form></td></tr>
@endforeach
</tbody></table>
</div></div>
@endsection