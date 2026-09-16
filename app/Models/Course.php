<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Course extends Model {
    protected $fillable = ['code','name','lecturer_id','credits','semester'];
    public function lecturer(){ return $this->belongsTo(Lecturer::class); }
    public function results(){ return $this->hasMany(Result::class); }
}