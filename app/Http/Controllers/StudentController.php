<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Teacher;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student = Student::select('students.*','teachers.*','students.id as student_id')
        ->leftJoin('teachers', 'teachers.id', '=', 'students.reporting_teacher')
        ->where('student.status',1)
        ->get();
        return view('students/index', compact('student'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teacher = Teacher::where('status',1)->get();
        return view('students/create', compact('teacher'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $storeData = $request->validate([
            'student_name' => 'required|max:255',
            'student_age' => 'required|numeric',
            'student_gender' => 'required',
            'reporting_teacher' => 'required',
        ]);
        $student = Student::create($storeData);
        return redirect('/students')->with('status', 'Student has been saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::findOrFail($id);
        $teacher = Teacher::where('status',1)->get();
        return view('students/edit', compact('student','teacher'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $updateData = $request->validate([
            'student_name' => 'required|max:255',
            'student_age' => 'required|numeric',
            'student_gender' => 'required',
            'reporting_teacher' => 'required',
        ]);
        Student::whereId($id)->update($updateData);
        return redirect('/students')->with('status', 'Student has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();
        return redirect('/students')->with('status', 'Student has been deleted');
    }
}
