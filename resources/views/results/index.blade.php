<!DOCTYPE html>
<html><head><title>All BIT Results</title>
<style>
body{margin:0;font-family:Arial;background:#f1f5f9}
.nav{background:#1e293b;color:white;padding:14px;text-align:center;box-shadow:0 2px 5px rgba(0,0,0,0.2)}
.nav a{color:white;margin:0 15px;text-decoration:none;font-weight:bold;font-size:14px}
.nav a:hover{text-decoration:underline}
.container{max-width:900px;margin:30px auto;background:white;padding:30px;border-radius:12px;box-shadow:0 4px 15px rgba(0,0,0,0.1)}
h2{text-align:center;color:#1e293b;margin-bottom:20px}
table{width:100%;border-collapse:collapse;margin-top:15px}
th{background:#1e40af;color:white;padding:12px;text-align:left;font-size:14px}
td{padding:12px;border-bottom:1px solid #e2e8f0;font-size:14px}
tr:hover{background:#f8fafc}
.btn{padding:6px 12px;border-radius:5px;text-decoration:none;color:white;font-size:12px;font-weight:bold;margin-right:4px;display:inline-block}
.edit{background:#f59e0b} .delete{background:#ef4444}
.add-btn{padding:10px 18px;border-radius:6px;text-decoration:none;color:white;font-weight:bold;display:inline-block;margin:10px 5px}
.blue{background:#1e40af} .green{background:#16a34a}
</style>
</head><body>

<div class="nav">
<a href="/lecturer/login">1. Lecturer Login</a>
<a href="/student/login">2. Student Login</a>
<a href="/students/create">3. Register Student</a>
<a href="/results/create">4. Enter Result</a>
<a href="/results">5. View Results</a>
<a href="/logout" style="background:#ef4444;padding:6px 12px;border-radius:5px">Logout</a>
</div>

<div class="container">
<h2>All BIT Results</h2>
<hr style="border:1px solid #e2e8f0">
<table>
<tr>
<th>Student</th>
<th>Course</th>
<th>Marks</th>
<th>Grade</th>
<th>Action</th>
</tr>
@foreach($results as $r)
<tr>
<td>{{ $r->student->name ?? $r->student_name ?? 'Daniel Praiz' }}</td>
<td>{{ $r->course_code ?? 'BIT 2101' }}</td>
<td><b>{{ $r->marks }}</b></td>
<td><span style="background:#e0f2fe;color:#1e40af;padding:3px 10px;border-radius:20px;font-weight:bold">{{ $r->grade }}</span></td>
<td>
<a href="/results/{{ $r->id }}/edit" class="btn edit">Edit</a>
<a href="/results/{{ $r->id }}/delete" class="btn delete" onclick="return confirm('Delete?')">Delete</a>
</td>
</tr>
@endforeach
</table>

<div style="text-align:center;margin-top:25px">
<a href="/results/create" class="add-btn blue">+ Enter Result</a>
<a href="/students/create" class="add-btn green">+ Register Student</a>
</div>

</div>
</body></html>