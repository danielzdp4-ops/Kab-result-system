<!DOCTYPE html>
<html>
<head>
<title>BIT Results System</title>
<style>
body{font-family:Arial;background:#f0f4ff;margin:0}
nav{background:#2c2e6f;padding:15px;display:flex;gap:20px;justify-content:center}
nav a{color:white;text-decoration:none;font-weight:bold;padding:8px 15px;border-radius:5px}
nav a:hover{background:#4a4db5}
.container{max-width:700px;margin:40px auto;background:white;padding:30px;border-radius:15px;box-shadow:0 5px 20px rgba(0,0,0,0.1)}
h2{text-align:center;color:#2c2e6f;border-bottom:2px solid #2c2e6f;padding-bottom:10px}
label{display:block;margin-top:15px;font-weight:bold}
input,select{width:100%;padding:10px;margin-top:5px;border:1px solid #ccc;border-radius:8px;box-sizing:border-box}
button{width:100%;background:#0d6efd;color:white;padding:12px;border:none;border-radius:8px;margin-top:20px;font-size:16px;cursor:pointer}
button:hover{background:#084298}
</style>
</head>
<body>
<nav>
<a href="/lecturer/login">1. Lecturer Login</a>
<a href="/student/login">2. Student Login</a>
<a href="/student/register">3. Register Student</a>
<a href="/results/create">4. Enter Result</a>
<a href="/results">5. View Results</a>
@if(session('lecturer_logged_in'))
<a href="/lecturer/logout" style="background:red; color:white; padding:6px 12px; border-radius:5px; text-decoration:none; float:right; margin-left:20px">Logout</a>
@endif
</nav>
<div class="container">
@yield('content')
</div>
</body>
</html>