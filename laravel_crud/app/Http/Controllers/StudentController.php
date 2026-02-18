<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class StudentController extends Controller
{

    //display students
    public function index(){
        $students =Student::orderByDesc('created_at')->paginate(5);
        return view('students.index',compact('students'));
    }
    //display create student page
    public function create()
    {
        return view('students.create');
    }

    //create new student

    public function store(Request $request)
    {
        $request -> validate([
            'name'=> 'required |string|min:2|max:255',
            'email'=>'required|email|unique:students,email',
            'phone'=>'required|digits:10|unique:students,phone',
        ]);

        Student::create($request->all());
        return redirect()->route('students.create')->with('success','Student added successfully!');
    }

    //fetch student record
    public function show(Student $student)
    {
        return view('students.show',compact('student'));
    }

    public function edit(Student $student)
    {
        return view('students.edit',compact('student'));
    }

    public function update(Request $request,Student $student)
    {
        $request->validate([
            'name'=>'required|string|min:2|max:255',
            'email'=>[
                'required',
                'email',
                Rule::unique('students','email')->ignore($student->id)
            ],
            'phone'=>[
                'required',
                'digits:10',
                Rule::unique('students','phone')->ignore($student->id)
            ],
        ]);
        $student->update($request->all());
        return redirect()->route('students.index')->with('sucess','Student has updated Sucessfully! ');
    }
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('sucess','Student delete sucessfully!');
    }
}
