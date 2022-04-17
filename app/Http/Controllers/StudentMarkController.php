<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\StudentMarks;

class StudentMarkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student_mark = StudentMarks::select('student_marks.*','students.*','student_marks.id as student_mark_id','student_marks.created_at as student_mark_created_date')
        ->leftJoin('students', 'students.id', '=', 'student_marks.student_id')
        ->get();
        return view('marks/index', compact('student_mark'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $student = Student::where('status',1)->get();
        return view('marks/create', compact('student'));
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
            'student' => 'required|numeric',
            'student_term' => 'required',
            'maths_mark'=> 'required|numeric',
            'science_mark'=> 'required|numeric',
            'history_mark'=> 'required|numeric',
        ]);
        $data= [
            'student_id'=>$request->student,
            'student_term'=>$request->student_term,
            'maths_mark'=>$request->maths_mark,
            'science_mark'=>$request->science_mark,
            'history_mark'=>$request->history_mark,
            'created_at'=>date('Y-m-d H:i:s')
        ];
       
        $student = StudentMarks::create($data);
        return redirect('/marks')->with('status', 'Mark has been saved!');
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
        $student_mark = StudentMarks::findOrFail($id);
        $student = Student::where('status',1)->get();
        return view('marks/edit', compact('student_mark','student'));
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
        $storeData = $request->validate([
            'student' => 'required|numeric',
            'student_term' => 'required',
            'maths_mark'=> 'required|numeric',
            'science_mark'=> 'required|numeric',
            'history_mark'=> 'required|numeric',
        ]);
        $updateddata= [
            'student_id'=>$request->student,
            'student_term'=>$request->student_term,
            'maths_mark'=>$request->maths_mark,
            'science_mark'=>$request->science_mark,
            'history_mark'=>$request->history_mark,
            'created_at'=>date('Y-m-d H:i:s')
        ];
        StudentMarks::whereId($id)->update($updateddata);
        return redirect('/marks')->with('status', 'Mark has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $studentMark = StudentMarks::findOrFail($id);
        $studentMark->delete();
        return redirect('/marks')->with('status', 'Mark has been deleted');
    }
}
