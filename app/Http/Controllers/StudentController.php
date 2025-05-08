<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\student;
class StudentController extends Controller
{
    public function save_student(Request $request){
        $imagepath=$request->file('images')->store('images','public');
        $stu=student::insert([
          'name'=>$request->name,
          'city'=>$request->city,
          'address'=>$request->address,
          'images'=>$imagepath
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
      $stu = DB::table('students')->where('id', $id)->first();
      
      if ($stu && $stu->images) {
        Storage::disk('public')->delete($stu->images);
      }
    
      $deleted = DB::table('students')->where('id', $id)->delete();
    
      if ($deleted) {
        return redirect()->route('student.show')->with('success', 'Record is Deleted');
      } else {
        return redirect()->route('student.show')->with('error', 'Record is not Deleted');
      }
    }

    public function editStudent($id){
      $stu=DB::table('students')->where('id','=',$id)->first();
      return view('StudentUpdate',['stu'=>$stu]);
    }

    
    public function updateStudent(Request $request, $id){
      $stu = DB::table('students')->where('id', $id)->first();
    
      $data = [
        'name' => $request->name,
        'city' => $request->city,
        'address' => $request->address,
      ];
    
      if ($request->hasFile('images')) {
        // Delete old image
        if ($stu->images) {
          Storage::disk('public')->delete($stu->images);
        }
        // Store new image
        $data['images'] = $request->file('images')->store('images', 'public');
      }
    
      $updated = DB::table('students')->where('id', $id)->update($data);
    
      if ($updated) {
        return redirect()->route('student.show')->with('success', 'Record is Updated');
      } else {
        return redirect()->route('student.show')->with('error', 'Record is not Updated');
      }
    }
    
}
