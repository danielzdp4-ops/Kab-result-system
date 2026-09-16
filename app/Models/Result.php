<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $fillable = ['student_id','course_id','semester','subject','marks','course_code','course_name','score'];

    public function student(){
        return $this->belongsTo(Student::class);
    }
}