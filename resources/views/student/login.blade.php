<h2>Student Login</h2>
<form method='POST' action='/student/login'>
@csrf
Email: <input type='email' name='email' required><br><br>
Password: <input type='password' name='password' required><br><br>
<button>Login</button>
</form>
