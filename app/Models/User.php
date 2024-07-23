<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function departments(){
       return $this->belongsTo(Department::class,'department');
    }
    public function designations(){
       return  $this->belongsTo(Designation::class,'designation');
    }
}
