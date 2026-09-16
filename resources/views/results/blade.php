<h2>Enter Student Result (Marks max 100)</h2>
@if($errors->any()) <div style="color:red">@foreach($errors->all() as $e){{$e}}<br>@endforeach</div> @endif
@if(session('success')) <p style="color:green">{{session('success')}}</p> @endif
<form method="POST" action="/results">@csrf
Student: <select name="student_id">@foreach($students as $s)<option value="{{$s->id}}">{{$s->name}} - {{$s->reg_no}}</option>@endforeach</select><br><br>
Course: <select name="course_id">@foreach($courses as $c)<option value="{{$c->id}}">{{$c->code}} - {{$c->name}}</option>@endforeach</select><br><br>
Semester: <input name="semester" value="Semester 1" required><br><br>
Marks (0-100): <input type="number" name="marks" min="0" max="100" required><br><br>
<button>Save Result</button>
</form>
<br><a href="/results">View All Results</a> | <a href="/courses/create">Add Course</a>