<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Product extends Model {
    protected $fillable = ['name','sku','quantity','buying_price','selling_price','category','description'];
}