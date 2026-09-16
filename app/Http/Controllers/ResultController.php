<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Result;
use App\Models\Student;

class ResultController extends Controller
{
    public function index(){
        $results = Result::with('student')->latest()->get();
        return view('results_index', compact('results'));
    }
    public function create(){
        $students = Student::all();
        return view('results_create', compact('students'));
    }
    public function store(Request $r){
        $r->validate(['student_id'=>'required','course_code'=>'required','course_name'=>'required','score'=>'required|numeric']);
        Result::create($r->all());
        return redirect('/results')->with('success','Result Added');
    }
    public function edit($id){
        $result = Result::findOrFail($id);
        $students = Student::all();
        return view('results_edit', compact('result','students'));
    }
    public function update(Request $r, $id){
        $res = Result::findOrFail($id);
        $res->update($r->all());
        return redirect('/results')->with('success','Result Updated');
    }
    public function destroy($id){
        Result::findOrFail($id)->delete();
        return back()->with('success','Deleted');
    }
}