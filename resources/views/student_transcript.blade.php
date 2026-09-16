<!DOCTYPE html>
<html>
<head>
<title>Transcript - {{ $student->name }}</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
@media print { .no-print { display:none; } body { background:white; } }
.transcript { border:2px solid #000; padding:30px; max-width:800px; margin:auto; background:white; }
</style>
</head>
<body class="bg-light">
<div class="container mt-4">
<div class="text-end no-print mb-3">
<button onclick="window.print()" class="btn btn-primary btn-lg">🖨️ Print / Save as PDF</button>
<a href="/student/dashboard" class="btn btn-secondary btn-lg">Back</a>
</div>

<div class="transcript shadow">
<center>
<h3>UNIVERSITY ACADEMIC TRANSCRIPT</h3>
<p><b>Official Result Statement</b></p>
<hr>
</center>

<table class="table table-borderless">
<tr><td><b>Student Name:</b> {{ $student->name }}</td><td><b>Reg No:</b> {{ $student->reg_no }}</td></tr>
<tr><td><b>Program:</b> BIT - Bachelor of IT</td><td><b>Date:</b> {{ date('d/m/Y') }}</td></tr>
</table>

<table class="table table-bordered mt-3">
<thead class="table-dark"><tr><th>Course Code</th><th>Course Name</th><th>Score</th><th>Grade</th><th>Remark</th><th>Grade Point</th></tr></thead>
<tbody>
@php $total=0; $gpTotal=0; $count=0; @endphp
@foreach($results as $r)
@php
$score = isset($r->score) ? $r->score : $r->marks;
$total += $score;
$count++;
if($score>=80){ $g='A'; $gp=5; } else if($score>=70){ $g='B'; $gp=4; } else if($score>=60){ $g='C'; $gp=3; } else if($score>=50){ $g='D'; $gp=2; } else { $g='F'; $gp=0; }
$gpTotal += $gp;
@endphp
<tr><td>{{ $r->course_code }}</td><td>{{ $r->course_name }}</td><td>{{ $score }}</td><td>{{ $g }}</td><td>{{ $g=='F'?'Fail':'Pass' }}</td><td>{{ $gp }}</td></tr>
@endforeach
</tbody>
</table>

@if($count>0)
<div class="row mt-3">
<div class="col-6"><div class="alert alert-dark"><b>Average:</b> {{ round($total/$count,2) }}%<br><b>GPA:</b> {{ round($gpTotal/$count,2) }} / 5.0<br><b>Total Courses:</b> {{ $count }}</div></div>
<div class="col-6 text-end"><br><br>________________________<br>Academic Registrar<br><small>Signature & Stamp</small></div>
</div>
@endif

<center class="mt-4"><small>This is a computer generated transcript and is valid without signature if printed from official system.</small></center>
</div>
</div>
</body>
</html>