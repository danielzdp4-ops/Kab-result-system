<!DOCTYPE html>
<html><head><title>Register Student</title>
<style>body{margin:0;font-family:Arial;background:#f1f5f9} .nav{background:#1e293b;color:white;padding:12px;text-align:center} .nav a{color:white;margin:0 10px;text-decoration:none} .card{max-width:500px;margin:30px auto;background:white;padding:25px;border-radius:10px;box-shadow:0 2px 10px #ccc} input{width:100%;padding:12px;margin:5px 0 15px 0;border:1px solid #2c5282;border-radius:5px;box-sizing:border-box} button{width:100%;padding:12px;background:#1e40af;color:white;border:none;border-radius:5px;font-weight:bold}</style>
</head><body>
<div class="nav">
<a href="/lecturer/login">1. Lecturer Login</a>
<a href="/student/login">2. Student Login</a>
<a href="/students/create">3. Register Student</a>
<a href="/results/create">4. Enter Result</a>
<a href="/results">5. View Results</a>
</div>
<div class="card">
<h2 style="text-align:center;color:#1e40af">Register Student (Admin Only)</h2>
<hr>
<form method="POST" action="/students">
@csrf
<label>Student Full Name</label><input type="text" name="name" placeholder="e.g. Josh" required>
<label>Reg No - Unique</label><input type="text" name="reg_no" placeholder="e.g. 2025/A/BIT/805/F" required>
<label>Password (default 123456)</label><input type="text" name="password" value="123456" required>
<button type="submit">Register Student</button>
</form>
<br><center><a href="/students">View All Students - Remove Duplicate</a></center>
</div></body></html>