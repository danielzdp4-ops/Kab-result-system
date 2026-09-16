<h2>Courses</h2><a href='/courses/create'>Add Course</a><ul>@foreach($courses as $c)<li>{{$c->code}} - {{$c->name}}</li>@endforeach</ul>
