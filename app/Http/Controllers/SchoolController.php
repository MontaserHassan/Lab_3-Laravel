<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\FlareClient\View;
use App\Models\Student;

class SchoolController extends Controller
{
    public function createStudent(){
        return View('school.create');
    }

    public function storeStudent(Request $request){
        $student = new Student();
        $student->IDno = $request->IDno;
        $student->name = $request->name;
        $student->age = $request->age;
        // $student->id = $request->user()->id;
        $student->save();
        return redirect()->route('students.all');
    }

    public function allStudents(){
        $students = Student::all();
        return view('school.students', ['students' => $students]);
    }

    public function editStudent($id){
        return View('school.edit', ["student" => Student::find($id)]);
    }

    public function updateStudent(Request $request, $id){
        $student = Student::find($id);
        $student->IDno = $request->IDno;
        $student->name = $request->name;
        $student->age = $request->age;
        if($student->save())
            return redirect()->route('students.all')->with('success','Updated successfully');
    }

    public function deleteStudent($id){
        Student::find($id)->delete();
        // return redirect()->action([self::class, 'students.all']);
        return redirect()->route('students.all')->with('success','deleted successfully');
    }

};
