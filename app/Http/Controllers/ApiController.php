<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    function getAllStudents(){
        $students = Student::all();

       // return response($students,200);
       return $students;
    }

    function createStudent(Request $request){
        $student = new Student();
        //get posted data
        $student->name = $request->name;
        $student->course = $request->course;

        //save student
        $student->save();

        return response()->json([
            "message" => "student record created"
        ],201 );
    }

    function getStudent($id){
        if(Student::where('id',$id)->exists()){
            $student = Student::where('id',$id)->get();
            return $student;
        }
        else{
            return response()->json([
                "message" => "Student not found"
            ],404);
        }
    }

    function updateStudent(Request $request, $id){
        if(Student::where('id',$id)->exists()){
            $student = Student::find($id);
            //get updated data
            $student->name = is_null($request->name) ? $student->name : $request->name;
            $student->course = is_null($request->course) ? $student->course : $request->course;
            //save
            $student->save();

            return response()->json([
                "message" => "records updated successfully"
            ],200);

        }else{
            return response()->json([
                "message" => "Student not found"
            ],404);
        }

    }

    function deleteStudent($id){
        if(Student::where('id',$id)->exists()){
            $student = Student::find($id);

            //delete
            $student->delete();

            return response()->json([
                "message" => "records deleted successfully"
            ],202);

        }else{
            return response()->json([
                "message" => "Student not found"
            ],404);
        }

    }
}
