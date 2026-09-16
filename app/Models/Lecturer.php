<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Lecturer extends Authenticatable {
    protected $fillable = ['name','email','password','department'];
    protected $hidden = ['password'];
    public function courses(){ return $this->hasMany(Course::class); }
    public function results(){ return $this->hasMany(Result::class); }
}