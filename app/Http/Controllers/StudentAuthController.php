<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Result;

class StudentController extends Controller
{
    // SHOW FORMS
    public function showLogin(){ return view('student.login'); }

    public function index(){
        $students = Student::all();
        return view('students.index', compact('students'));
    }

    public function create(){
        return view('students.create');
    }

    // REGISTER STUDENT - Admin only
    public function store(Request $request){
        $request->validate([
            'name'=>'required',
            'reg_no'=>'required|unique:students,reg_no',
        ]);
        Student::create([
            'name'=>$request->name,
            'reg_no'=>$request->reg_no,
            'password'=>bcrypt($request->password?? '123456'),
        ]);
        return redirect('/students')->with('success','Student Registered!');
    }

    // DELETE STUDENT - Admin can remove
    public function destroy($id){
        $s = Student::findOrFail($id);
        Result::where('student_id',$s->id)->delete();
        $s->delete();
        return redirect('/students')->with('success','Student Removed!');
    }

    // STUDENT LOGIN - Only view own result
    public function login(Request $request){
        $student = Student::where('reg_no',$request->reg_no)->first();
        if($student){
            session(['student_id'=>$student->id]);
            return redirect('/student/dashboard');
        }
        return back()->with('error','Wrong Reg No');
    }

    public function dashboard(){
        if(!session('student_id')) return redirect('/student/login');
        $student = Student::find(session('student_id'));
        $results = Result::where('student_id',$student->id)->get();
        return view('student.dashboard', compact('student','results'));
    }

    // LECTURER LOGIN - Admin
    public function lecturerLogin(Request $request){
        // Simple hardcoded lecturer for demo
        if($request->email=='lecturer@bit.ac.ug' && $request->password=='123456'){
            session(['lecturer_logged'=>true]);
            return redirect('/results');
        }
        return back()->with('error','Wrong lecturer credentials');
    }
}