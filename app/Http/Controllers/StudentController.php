<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $student=Student::all();
        return view('student_table',['students'=>$student]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('student');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required|max:30|string',
            'age' => 'required',
            'IDno' => [
                'required',
                'numeric',
                Rule::unique('students')
                    ->WhereNull('deleted_at')
            ]
        ]);
        
        $student = new Student();
        $student->name = $request->name;
        $student->age = $request->age;
        $student->IDno = $request->IDno;
        $student->users_id = Auth::id();
        $student->save();
        return back()->with('success','student created successfully');
    }


   
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        
        return view('student_updateForm',['student'=>$student]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'name' => 'required|max:30|string',
            'age' => 'required',
            'IDno' => 'required|unique:students,IDno,'.$student->IDno.',IDno|numeric'
        ]);
        $student->name = $request->name;
        $student->age = $request->age;
        $student->IDno = $request->IDno;
        // $student->users_id = Auth::id();
        
        if($student->save())
        $request->session()->flash('success','Student updated successfully');
        return redirect('students/list');
        // else
        // return view('student_updateForm',['student'=>$student]);


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
         $student->delete();
         return redirect('students/list');

    }
}
