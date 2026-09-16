<!DOCTYPE html>
<html>
<head><title>Enter Result</title>
<style>body{margin:0;font-family:Arial;background:#f1f5f9}.nav{background:#1e293b;color:white;padding:14px;text-align:center}.nav a{color:white;margin:0 10px;text-decoration:none}.container{max-width:600px;margin:30px auto;background:white;padding:30px;border-radius:12px}label{font-weight:bold}input,select{width:100%;padding:12px;margin:8px 0 14px;border:1px solid #ccc;border-radius:6px}button{background:#1e40af;color:white;padding:12px;width:100%;border:none;border-radius:6px;font-weight:bold}</style>
</head>
<body>
<div class="nav"><a href="/students">Students</a> | <a href="/results">Results</a></div>
<div class="container">
<h2 style="text-align:center">Enter Result - 6 Courses</h2>
@if(session('success'))<div style="background:#dcfce7;padding:10px;border-radius:5px;color:#166534;text-align:center">{{ session('success') }}</div>@endif
<form method="POST" action="/results">@csrf
<label>Student</label>
<select name="student_id" required><option value="">-- Select --</option>@foreach(\App\Models\Student::all() as $s)<option value="{{ $s->id }}">{{ $s->name }} - {{ $s->reg_no }}</option>@endforeach</select>
<label>Course Code</label>
<input name="course_code" list="codes" required placeholder="BIT2101"><datalist id="codes"><option value="BIT2101"><option value="BIT2102"><option value="BIT2103"><option value="BIT2104"><option value="BIT2105"><option value="BIT2106"></datalist>
<label>Course Name</label>
<input name="course_name" list="names" required placeholder="System Integration"><datalist id="names"><option value="System Integration and Architecture"><option value="E-commerce"><option value="Scripting Languages"><option value="Object Oriented Programming"><option value="System Analysis and Design"><option value="Network Security"></datalist>
<label>Marks</label>
<input type="number" name="score" min="0" max="100" required>
<button>Save Result</button>
</form>
</div>
</body>
</html>