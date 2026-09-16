@extends('layout')
@section('content')
@php $stu = $student ?? $s ?? null; @endphp
<div class="card p-4">
<h4>Edit Student - {{$stu->name}}</h4>
<form method="POST" action="/students/{{$stu->id}}">
@csrf @method('PUT')
<div class="mb-2"><label>Name</label><input name="name" value="{{$stu->name}}" class="form-control" required></div>
<div class="mb-2"><label>Reg No</label><input name="reg_no" value="{{$stu->reg_no}}" class="form-control" required></div>
<div class="mb-2"><label>Course</label><input name="course" value="{{$stu->course}}" class="form-control"></div>
<button class="btn btn-primary">Update</button> <a href="/students" class="btn btn-secondary">Cancel</a>
</form>
</div>
@endsection