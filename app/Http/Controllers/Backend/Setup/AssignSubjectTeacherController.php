<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\StudentClass;
use App\Models\SchoolSubject;
use App\Models\Designation;
use App\Models\AssignSubjectTeacher;

class AssignSubjectTeacherController extends Controller
{
    public function ViewSubjectTeacher(){
        $data['allData'] = AssignSubjectTeacher::select('employee_id','class_id','subject_id','designation_id')->get();
        return view('backend.setup.subject_teacher.view_subject_teacher',$data);
    }
    public function AddSubjectTeacher(){
        $data['employees'] = User::where('usertype','employee')->get();
        $data['classes'] = StudentClass::all();
        $data['subjects'] = SchoolSubject::all();
        $data['designations'] = Designation::all();
        return view('backend.setup.subject_teacher.add_subject_teacher',$data);
    }
    public function StoreSubjectTeacher(Request $request){
            $assign_subject_teacher = new AssignSubjectTeacher();
            $assign_subject_teacher->employee_id = $request->employee_id;
            $assign_subject_teacher->class_id = $request->class_id;
            $assign_subject_teacher->subject_id = $request->subject_id;
            $assign_subject_teacher->designation_id = $request->designation_id;                
            $assign_subject_teacher->save();
            
        $notification = array(
            'message' => 'Subject Teacher Assigned Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('subject.teacher.view')->with($notification);
    
    }// End Method
    public function EditSubjectTeacher($employee_id){
        $data['editData'] = AssignSubjectTeacher::where('employee_id',$employee_id)->first();
        // dd($data['editdata']->toArray());
        $data['employees'] = User::where('usertype','employee')->get(); 
        $data['classes'] = StudentClass::all(); 
        $data['subjects'] = SchoolSubject::all(); 
        $data['designations'] = Designation::all();
        return view('backend.setup.subject_teacher.edit_subject_teacher',$data);
    }

    public function UpdateSubjectTeacher(Request $request,$employee_id){
        AssignSubjectTeacher::where('employee_id',$employee_id)->delete();
        $assign_subject_teacher = new AssignSubjectTeacher();
        $assign_subject_teacher->employee_id = $request->employee_id;
        $assign_subject_teacher->class_id = $request->class_id;
        $assign_subject_teacher->subject_id = $request->subject_id;
        $assign_subject_teacher->designation_id = $request->designation_id;
        $assign_subject_teacher->save();

        
        $notification = array(
            'message' => 'Data Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('subject.teacher.view')->with($notification);
    } // end Method
    public function DeleteSubjectTeacher($employee_id){
        AssignSubjectTeacher::where('employee_id',$employee_id)->delete();

        $notification = array(
            'message' => 'Subject Teacher Deleted Successfully',
            'alert-type' => 'info'
        );
        
        return redirect()->route('subject.teacher.view')->with($notification);    
    }
}
