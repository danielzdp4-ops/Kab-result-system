<?php
namespace App\Http\Controllers;
use App\Models\Lecturer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LecturerAuthController extends Controller
{
    public function showLogin(){
        return view('lecturer_login'); // FIXED: underscore matches your file
    }

    public function login(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);

        $lecturer = Lecturer::where('email',$request->email)->first();

        if($lecturer && Hash::check($request->password, $lecturer->password)){
            session(['lecturer_id'=>$lecturer->id, 'lecturer_name'=>$lecturer->name]);
            return redirect('/students')->with('success','Welcome '.$lecturer->name);
        }

        return back()->with('error','Invalid email or password!');
    }

    public function logout(){
        session()->forget(['lecturer_id','lecturer_name']);
        return redirect('/admin/login');
    }
}