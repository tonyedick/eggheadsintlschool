<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ExamTerm;

class ExamTermController extends Controller
{
    public function ViewExamTerm(){
        $data['allData'] = ExamTerm::all();
        return view('backend.setup.exam_term.view_exam_term',$data);
    }
    public function ExamTermAdd(){
        return view('backend.setup.exam_term.add_exam_term');
    }
    public function StoreExamTerm(Request $request){
        
        $validatedData = $request->validate([
            'name' => 'required|unique:exam_terms,name',
        ]);

        $data = new ExamTerm();
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Exam Term Inserted Successfully',
            'alert-type' => 'success'
        );
        
        return redirect()->route('exam.term.view')->with($notification);
    }
    public function EditExamTerm($id){
        $editData = ExamTerm::find($id);
        return view('backend.setup.exam_term.edit_exam_term',compact('editData'));
    }
    public function UpdateExamTerm(Request $request,$id){
        
        $data = ExamTerm::find($id);

        $validatedData = $request->validate([
            'name' => 'required|unique:exam_terms,name,'.$data->id
        ]);

        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Exam Term Updated Successfully',
            'alert-type' => 'success'
        );
        
        return redirect()->route('exam.term.view')->with($notification);
    }
}
