<h2>Lecturer Register</h2>
<form method="POST" action="/lecturer/register">@csrf
Name: <input name="name" required><br><br>
Email: <input type="email" name="email" required><br><br>
Department: <input name="department" required><br><br>
Password: <input type="password" name="password" required><br><br>
<button>Register</button>
</form>