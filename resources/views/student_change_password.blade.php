<!DOCTYPE html><html><head><title>Change Password</title>
<style>body{margin:0;font-family:Arial;background:#f1f5f9}.container{max-width:400px;margin:80px auto;background:white;padding:30px;border-radius:12px;box-shadow:0 4px 15px rgba(0,0,0,0.1)}input{width:100%;padding:12px;margin:8px 0;border-radius:6px;border:1px solid #ccc}button{background:#1e40af;color:white;padding:12px;width:100%;border:none;border-radius:6px;font-weight:bold}</style>
</head><body>
<div class="container">
<h3 style="text-align:center">Change My Password</h3>
@if(session('error'))<div style="background:#fee2e2;color:red;padding:10px;border-radius:5px">{{ session('error') }}</div>@endif
@if(session('success'))<div style="background:#dcfce7;color:green;padding:10px;border-radius:5px">{{ session('success') }}</div>@endif
<form method="POST" action="/student/change-password">
@csrf
<input type="password" name="old_password" placeholder="Old Password (current)" required>
<input type="password" name="new_password" placeholder="New Password (your choice)" required>
<input type="password" name="new_password_confirmation" placeholder="Confirm New Password" required>
<button type="submit">Update Password</button>
</form>
<br><a href="/student/dashboard" style="text-align:center;display:block;color:#1e40af">Back to Dashboard</a>
</div></body></html>