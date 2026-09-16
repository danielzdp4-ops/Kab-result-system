@extends('layouts.app')
@section('content')
<h2>All BIT Results</h2>
<table>
<tr><th>Student</th><th>Course</th><th>Marks</th><th>Grade</th></tr>
@foreach(App\Models\Result::with('student','course')->get() as $r)
<tr>
<td>{{ $r->student->name ?? 'N/A' }}</td>
<td>{{ $r->course->code ?? 'N/A' }}</td>
<td>{{ $r->marks }}</td>
<td>
@if($r->marks>=70) A
@elseif($r->marks>=60) B
@elseif($r->marks>=50) C
@else F
@endif
</td>
</tr>
@endforeach
</table>
@endsection