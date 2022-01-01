<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignFormTeacher extends Model
{
    public function user(){
    	return $this->belongsTo(User::class,'employee_id','id');
    }
    public function student_class(){
        return $this->belongsTo(StudentClass::class, 'class_id','id');
    }
    public function designation(){
        return $this->belongsTo(Designation::class, 'designation_id','id');
    }
}
