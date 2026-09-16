@extends('layout')
@section('content')
<style>
@media print { .no-print{display:none;} .card{border:none; box-shadow:none;} }
.transcript-header{border-bottom:4px double #000; padding-bottom:10px; margin-bottom:15px;}
.university-title{font-size:28px; font-weight:900; text-transform:uppercase; color:#0b3d0b;}
.grade-A{color:green; font-weight:bold} .grade-F{color:red; font-weight:bold}
</style>
@php
$stu = $student ?? $s ?? null;
$totalMarks=0; $totalPoints=0; $count=0; $gpa=0;
foreach($results as $r){ $sc=$r->score??$r->marks??0; $totalMarks+=$sc; $count++;
  if($sc>=80) $pt=5; elseif($sc>=70) $pt=4; elseif($sc>=60) $pt=3; elseif($sc>=50) $pt=2; else $pt=0;
  $totalPoints+=$pt;
}
if($count>0){ $gpa=round($totalPoints/$count,2); $avg=round($totalMarks/$count,1); } else {$avg=0;}
if($gpa>=4.4) $class='First Class'; elseif($gpa>=3.6) $class='Second Upper'; elseif($gpa>=2.8) $class='Second Lower'; elseif($gpa>=2.0) $class='Pass'; else $class='Retake';
@endphp

<div class="container">
<div class="card shadow p-4" id="transcript">
<div class="text-center transcript-header">
<img src="https://upload.wikimedia.org/wikipedia/en/thumb/6/6f/Kabale_University_logo.png/220px-Kabale_University_logo.png" style="height:80px;" onerror="this.style.display='none'">
<div class="university-title">Kabale University</div>
<div style="font-size:14px;">KAB - P.O Box 317, Kabale - Uganda | www.kab.ac.ug<br><b>OFFICE OF THE ACADEMIC REGISTRAR</b></div>
<h4 class="mt-3" style="letter-spacing:2px; text-decoration:underline;">ACADEMIC TRANSCRIPT</h4>
</div>

<div class="row mb-3" style="font-size:14px;">
<div class="col-6"><b>Student Name:</b> {{$stu->name}}<br><b>Registration No:</b> {{$stu->reg_no}}<br><b>Course:</b> {{$stu->course ?? 'Bachelor of Information Technology'}}</div>
<div class="col-6 text-end"><b>Date Issued:</b> {{date('d/m/Y')}}<br><b>Academic Year:</b> 2024/2025<br><b>Student ID:</b> {{$stu->id}}</div>
</div>

<table class="table table-bordered table-sm">
<thead class="table-dark text-center"><tr><th>#</th><th>Course Code</th><th>Course Title / Subject</th><th>Score (%)</th><th>Grade</th><th>GP</th><th>Remark</th></tr></thead>
<tbody>
@forelse($results as $i=>$r)
@php
$sc=$r->score??$r->marks??0; $cname=$r->course_name??$r->subject??$r->course_title??'Course Unit'; $ccode=$r->course_code??'BIT'.(100+$i);
if($sc>=80){$grade='A'; $gp=5;} elseif($sc>=70){$grade='B'; $gp=4;} elseif($sc>=60){$grade='C'; $gp=3;} elseif($sc>=50){$grade='D'; $gp=2;} else{$grade='F'; $gp=0;}
@endphp
<tr class="text-center"><td>{{$i+1}}</td><td>{{$ccode}}</td><td class="text-start">{{$cname}}</td><td>{{$sc}}</td><td class="grade-{{$grade}}">{{$grade}}</td><td>{{$gp}}</td><td>@if($sc>=50) Pass @else Fail @endif</td></tr>
@empty
<tr><td colspan="7" class="text-center">No Results Recorded Yet</td></tr>
@endforelse
</tbody>
<tfoot class="table-light fw-bold"><tr><td colspan="3" class="text-end">TOTAL / AVERAGE</td><td class="text-center">{{$avg}}%</td><td colspan="2" class="text-center">GPA: {{$gpa}}</td><td class="text-center">{{$class}}</td></tr></tfoot>
</table>

<div class="row mt-4">
<div class="col-6"><b>Grading System:</b><br><small>A=80-100(5), B=70-79(4), C=60-69(3), D=50-59(2), F=0-49(0)</small></div>
<div class="col-6 text-end"><b>Classification:</b><br><small>{{$class}} - GPA {{$gpa}}</small></div>
</div>

<div class="row mt-5">
<div class="col-6 text-center"><br><br>_________________________<br><b>Academic Registrar</b><br>Kabale University</div>
<div class="col-6 text-center"><br><br>_________________________<br><b>Dean, Faculty of Computing</b><br>Date: {{date('d M Y')}}</div>
</div>

<div class="text-center mt-4 no-print">
<button onclick="window.print()" class="btn btn-success">🖨️ Print Official Transcript</button>
<a href="/student/dashboard" class="btn btn-secondary">Back to Dashboard</a>
</div>
<p class="text-center mt-3" style="font-size:10px; color:gray;">This is a system generated transcript. Validity can be verified at registrar@kab.ac.ug | Document No: KAB/TR/{{$stu->id}}/{{date('Y')}}</p>
</div>
</div>
@endsection