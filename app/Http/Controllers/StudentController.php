<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Result;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    private function findView($names, $data){
        foreach($names as $v){
            if(view()->exists($v)){
                return view($v, $data);
            }
        }
        return view($names[0], $data);
    }

    public function adminDashboard(){
        $totalStudents = Student::count();
        $totalResults = Result::count();
        $results = Result::all();
        $a=0;$b=0;$c=0;$d=0;$f=0;$pass=0;$fail=0;$totalScore=0;
        foreach($results as $r){
            $score = $r->score?? $r->marks?? 0;
            $totalScore += $score;
            if($score>=80){$a++;} elseif($score>=70){$b++;} elseif($score>=60){$c++;} elseif($score>=50){$d++;} else{$f++;}
            if($score>=50){$pass++;} else{$fail++;}
        }
        $avg = $totalResults>0? round($totalScore/$totalResults,1) : 0;
        $passRate = $totalResults>0? round(($pass/$totalResults)*100,1) : 0;
        return view('admin_dashboard', compact('totalStudents','totalResults','a','b','c','d','f','pass','fail','avg','passRate'));
    }

    public function index(){
        return $this->findView(['students.index','students_index'], ['students'=>Student::all()]);
    }

    public function create(){
        return $this->findView(['students.create','students_create'], []);
    }

        public function store(Request $r){
        $r->validate(['name'=>'required','reg_no'=>'required|unique:students,reg_no']);
        
        // POLISHED: Unique password for each student, not same 123456
        // Example: Reg 2025/A/BIT/8266/F -> password = 8266@KAB  OR random 8 chars
        $lastPart = substr(preg_replace('/[^0-9]/','',$r->reg_no), -4); // gets 8266
        $autoPassword = $lastPart ? $lastPart.'@KAB' : 'KAB'.rand(1000,9999);
        $finalPassword = $r->password ?? $autoPassword; // if admin types password, use it, else auto

        Student::create([
            'name'=>$r->name,
            'reg_no'=>$r->reg_no,
            'course'=>$r->course,
            'password'=>Hash::make($finalPassword),
            'plain_password'=>$finalPassword // so admin can tell student first time
        ]);
        return redirect('/students')->with('success','Student added! Unique password is: '.$finalPassword.' - Tell student to change after login');
    }

    public function show($id){
        $s = Student::findOrFail($id);
        $results = Result::where('student_id',$id)->get();
        $student = $s;
        return $this->findView(['students.show','students_show','student.show'], compact('s','student','results'));
    }

    public function edit($id){
        $s = Student::findOrFail($id);
        $student = $s;
        return $this->findView(['students.edit','students_edit','student.edit'], compact('s','student'));
    }

    public function update(Request $r,$id){
        $s = Student::findOrFail($id);
        $s->update($r->only('name','reg_no','course'));
        return redirect('/students')->with('success','Updated');
    }

    public function destroy($id){
        Student::findOrFail($id)->delete();
        return back()->with('success','Deleted');
    }

    public function resetPassword($id){
        $s = Student::findOrFail($id);
        $s->update(['password'=>Hash::make('123456'),'plain_password'=>'123456']);
        return back()->with('success','Reset to 123456');
    }

    public function showLogin(){
        return view('student_login');
    }
        public function showForgot(){
        return view('student_forgot');
    }

    public function handleForgot(Request $r){
        $r->validate(['reg_no'=>'required','name'=>'required','password'=>'required|confirmed|min:4']);
        $s = Student::where('reg_no',$r->reg_no)->first();
        if(!$s){ return back()->with('error','Reg No not found! Contact admin.'); }
        // verify name matches (case insensitive)
        if(strtolower(trim($s->name)) != strtolower(trim($r->name))){
            return back()->with('error','Name does not match our records for '.$r->reg_no);
        }
        $s->update(['password'=>Hash::make($r->password),'plain_password'=>$r->password]);
        return redirect('/student/login')->with('success','Password reset successful! Login with new password.');
    }

    public function login(Request $r){
        $s = Student::where('reg_no',$r->reg_no)->first();
        if($s && Hash::check($r->password, $s->password)){
            session(['student_id'=>$s->id]);
            return redirect('/student/dashboard');
        }
        return back()->with('error','Wrong Reg No or Password');
    }

    public function dashboard(){
        if(!session('student_id')){
            return redirect('/student/login');
        }
        $s = Student::find(session('student_id'));
        $results = Result::where('student_id',$s->id)->get();
        $student = $s;
        return view('student_dashboard', compact('s','student','results'));
    }

    public function transcript(){
        if(!session('student_id')){
            return redirect('/student/login');
        }
        $s = Student::find(session('student_id'));
        $results = Result::where('student_id',$s->id)->get();
        $student = $s;
        return view('transcript', compact('s','student','results'));
    }

    public function logout(){
        session()->forget('student_id');
        return redirect('/');
    }
}