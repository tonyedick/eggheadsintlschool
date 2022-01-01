<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\StudentClass;
use App\Models\Designation;
use App\Models\AssignFormTeacher;

class AssignFormTeacherController extends Controller
{
    public function ViewFormTeacher(){
        $data['allData'] = AssignFormTeacher::select('employee_id','class_id','designation_id')->get();
        return view('backend.setup.form_teacher.view_form_teacher',$data);
    }
    public function AddFormTeacher(){
        $data['employees'] = User::where('usertype','employee')->get();
        $data['classes'] = StudentClass::all();
        $data['designations'] = Designation::all();
        return view('backend.setup.form_teacher.add_form_teacher',$data);
    }
    public function StoreFormTeacher(Request $request){
        $assign_form_teacher = new AssignFormTeacher();
        $assign_form_teacher->employee_id = $request->employee_id;
        $assign_form_teacher->class_id = $request->class_id;
        $assign_form_teacher->designation_id = $request->designation_id;                
        $assign_form_teacher->save();
        
        $notification = array(
            'message' => 'Form Teacher Assigned Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('form.teacher.view')->with($notification);
    
    }// End Method
    public function EditFormTeacher($employee_id){
        $data['editData'] = AssignFormTeacher::where('employee_id',$employee_id)->first();
        // dd($data['editdata']->toArray());
        $data['employees'] = User::where('usertype','employee')->get(); 
        $data['classes'] = StudentClass::all(); 
        $data['designations'] = Designation::all();
        return view('backend.setup.form_teacher.edit_form_teacher',$data);
    }

    public function UpdateFormTeacher(Request $request,$employee_id){
        AssignFormTeacher::where('employee_id',$employee_id)->delete();
        $assign_form_teacher = new AssignFormTeacher();
        $assign_form_teacher->employee_id = $request->employee_id;
        $assign_form_teacher->class_id = $request->class_id;
        $assign_form_teacher->designation_id = $request->designation_id;
        $assign_form_teacher->save();

        
        $notification = array(
            'message' => 'Data Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('form.teacher.view')->with($notification);
    } // end Method
    public function DeleteFormTeacher($employee_id){
        AssignFormTeacher::where('employee_id',$employee_id)->delete();

        $notification = array(
            'message' => 'Form Teacher Deleted Successfully',
            'alert-type' => 'info'
        );
        
        return redirect()->route('form.teacher.view')->with($notification);    
    }
}
