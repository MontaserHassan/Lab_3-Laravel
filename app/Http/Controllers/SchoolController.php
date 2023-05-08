<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\FlareClient\View;
use App\Models\Student;

class SchoolController extends Controller
{
    public function createStudent(){
        return View('school.create');
    }

    public function storeStudent(Request $request){

        $request->validate([
            'IDno' => 'required|unique:students',
            'name' => 'required|max:20',
            'age' => 'required|gt:0',
        ],[
            'required' => ':attribute must have a value',
            'max' => ':attribute must be less than :max characters',
            'gt' => ':attribute must be greater than :gt',
        ]);

        $student = new Student();
        $student->IDno = $request->IDno;
        $student->name = $request->name;
        $student->age = $request->age;
        $student->user_id = $request->user()->id;
        if($student->save()){
            $request->session()->flash('success','Added successfully');
            return redirect()->route('students.all');
        }
    }

    public function allStudents(){
        // $students = Student::where('user_id', Auth::id())->onlyTrashed()->get();
        // $students = Student::where('user_id', Auth::id())->withTrashed()->get();
        // $students = Student::where('user_id', Auth::id())->get();
        $students = Auth::user()->students;
        return view('school.students', ['students' => $students]);
    }

    public function editStudent(Student $student){
        return View('school.edit', ["student" => $student]);
    }

    public function updateStudent(Request $request, Student $student){

        $request->validate([
            'IDno' => 'required|unique:students,IDno,'.$student->id,
            'name' => 'required|max:30',
            'age' => 'required|numeric|gt:0',
        ],[
            'required' => ':attribute number is required',
            'max' => ':attribute must be less than :max characters',
            'gt' => ':attribute must be greater than 0',
        ]);

        $student->IDno = $request->IDno;
        $student->name = $request->name;
        $student->age = $request->age;
        if($student->save()){
            $request->session()->flash('success','Updated successfully');
            return redirect()->route('students.all');
        }
    }

    public function deleteStudent($id){
         Student::destroy($id);
        return redirect()->route('students.all')->with('success','deleted successfully');
    }

};
