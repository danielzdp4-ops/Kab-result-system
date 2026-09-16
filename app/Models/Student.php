<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Student extends Model {
    protected $fillable = ['name','reg_no','email','password','plain_password'];
    public function results(){ return $this->hasMany(Result::class); }
}