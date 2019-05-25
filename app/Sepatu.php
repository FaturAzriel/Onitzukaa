<?php
 
namespace App;
 
use Illuminate\Database\Eloquent\Model;
 
class Sepatu extends Model
{
    protected $table = "form";
 
    protected $fillable = ['name','phone','email','address','brand','type','size'];
}