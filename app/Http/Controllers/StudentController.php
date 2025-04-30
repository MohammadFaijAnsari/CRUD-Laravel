<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\student;
class StudentController extends Controller
{
    public function save_student(Request $request){
        $stu=student::insert([
          'name'=>$request->name,
          'city'=>$request->city,
          'address'=>$request->address,
        
        ]);
      if($stu){
        // echo "<script>alert('Record is saved')</script>";
        return redirect()->route('student.show')->with('success','Student Record is Save');
      }else{
        echo "<script>alert('Record is not saved')</script>"; 
      }
    }

    public function showStudentRecord(){
        // $stu=DB::table('students')->orderBy('name')->simplePaginate(2);
        // $stu=DB::table('students')->paginate(2);
        // $stu=DB::table('students')->where('city','Mumbai')->orderBy('name')->simplePaginate(2);
        $stu=student::simplePaginate(5);
        return view('StudentRecord',['stu'=>$stu]);
    }

    public function deleteStudent($id){
      $stu=DB::table('students')->where('id','=',$id)->delete();
      if($stu){
        return redirect()->route('student.show')->with('success','Record is Deleted');
      }else{
        echo "Record is not Deletd";
      }
    }

    public function editStudent($id){
      $stu=DB::table('students')->where('id','=',$id)->first();
      // echo "<pre>";
      // print_r($stu);
      // die;
      return view('StudentUpdate',['stu'=>$stu]);
    }
    public function updateStudent(Request $request,$id){
      $stu=DB::table('students')->where('id','=',$id)->update([
        'name'=>$request->name,
        'city'=>$request->city,
        'address'=>$request->address,
        
      ]);
      if($stu){
        return redirect()->route('student.show')->with('success','Record is Updated');
      }else{
        echo "Record is not Deletd";
      }
    }
}
