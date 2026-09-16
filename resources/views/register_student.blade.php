<!DOCTYPE html><html><head><title>Register Student</title>
<style>body{margin:0;font-family:Arial;background:#f1f5f9}.nav{background:#1e293b;color:white;padding:14px;text-align:center}.nav a{color:white;margin:0 10px;text-decoration:none}.container{max-width:500px;margin:30px auto;background:white;padding:30px;border-radius:12px}input{width:100%;padding:12px;margin:8px 0;border:1px solid #ccc;border-radius:6px}button{background:#16a34a;color:white;padding:12px;width:100%;border:none;border-radius:6px;font-weight:bold}</style>
</head><body>
<div class="nav"><a href="/students">All Students</a><a href="/results">Results</a></div>
<div class="container">
<h2 style="text-align:center">Register New Student - With Custom Password</h2>
<form method="POST" action="/students">
@csrf
<input name="name" placeholder="Full Name e.g Claire" required>
<input name="reg_no" placeholder="Reg No e.g 2025/A/BIT/8265/F" required>
<input type="password" name="password" placeholder="Set Student Password (e.g Claire2025) - Leave blank = 123456" >
<small style="color:gray">Tip: Tell student this password. He can change it later in his dashboard.</small>
<button type="submit" style="margin-top:15px">Register Student</button>
</form>
</div></body></html>