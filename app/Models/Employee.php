<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
      protected $fillable = [
        'employeeID', 'first_name','last_name','start_date','skills'
    ];
    public $timestamps = true;
   public function user()  
{  
   return $this->hasOne('App\Models\User','id','created_by');  
} 
  
}
