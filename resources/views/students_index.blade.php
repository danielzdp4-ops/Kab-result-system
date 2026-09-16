@extends('layout')
@section('content')
<div class="card shadow">
<div class="card-header bg-dark text-white d-flex justify-content-between"><h5 class="m-0">All Students - Admin Can Set & Recover Password</h5><a href="/students/create" class="btn btn-warning btn-sm">+ Add Student</a></div>
<div class="card-body">
@if(session('success'))<div class="alert alert-success">{{session('success')}}</div>@endif
<table class="table table-bordered table-striped">
<thead class="table-dark"><tr><th>Name</th><th>Reg No</th><th>Password (Recoverable)</th><th>Email</th><th>Action</th></tr></thead>
<tbody>
@foreach($students as $s)
<tr>
<td><b>{{$s->name}}</b><br><small>{{$s->results_count}} courses</small></td>
<td><span class="badge bg-primary">{{$s->reg_no}}</span></td>
<td>
<span class="badge bg-success" style="font-size:14px">{{$s->plain_password??'123456'}}</span><br>
<small>Student login password</small>
</td>
<td>{{$s->email}}</td>
<td>
<a href="/students/{{$s->id}}" class="btn btn-sm btn-info">View Particulars</a>
<a href="/students/{{$s->id}}/edit" class="btn btn-sm btn-primary">Edit/Change Pwd</a>
<a href="/students/{{$s->id}}/reset" class="btn btn-sm btn-warning" onclick="return confirm('Reset to 123456?')">Reset</a>
<form action="/students/{{$s->id}}" method="POST" style="display:inline">@csrf @method('DELETE')<button class="btn btn-sm btn-danger" onclick="return confirm('Remove?')">Remove</button></form>
</td>
</tr>
@endforeach
</tbody>
</table>
</div></div>
@endsection