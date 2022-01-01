<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignSubjectTeacher extends Model
{
    public function user(){
    	return $this->belongsTo(User::class,'employee_id','id');
    }
    public function student_class(){
        return $this->belongsTo(StudentClass::class, 'class_id','id');
    }
    public function school_subject(){
        return $this->belongsTo(SchoolSubject::class,'subject_id','id');
    }
    public function designation(){
        return $this->belongsTo(Designation::class, 'designation_id','id');
    }
}
