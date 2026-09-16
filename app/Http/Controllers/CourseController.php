<?php
namespace App\Http\Controllers;
use App\Models\Course;
use App\Models\Lecturer;
use Illuminate\Http\Request;
class CourseController extends Controller {
    public function index(){
        $courses = Course::with('lecturer')->get();
        return view('courses.index', compact('courses'));
    }
    public function create(){
        $lecturers = Lecturer::all();
        return view('courses.create', compact('lecturers'));
    }
    public function store(Request $request){
        $request->validate([
            'code'=>'required|unique:courses,code',
            'name'=>'required|string',
            'lecturer_id'=>'required|exists:lecturers,id',
            'credits'=>'required|integer|min:1|max:6'
        ]);
        Course::create($request->all());
        return redirect('/courses')->with('success','Course created!');
    }
}