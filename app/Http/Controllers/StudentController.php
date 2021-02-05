<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
        return view('index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'npm' => 'required|size:9',
            'gender' => 'required',
            'address' => 'required',
            'email' => 'required',
            'major' => 'required'
        ]);
            $student = new Student;
            $student->name = $request->get('name');
            $student->npm = $request->get('npm');
            $student->gender = json_encode($request->get('gender'));
            $student->address = $request->get('address');
            $student->email = $request->get('email');
            $student->major = $request->get('major');
            $student->save();
            return redirect('/')->with('status', 'Saving data success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        return view('edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name' => 'required',
            'npm' => 'required|size:9',
            'gender' => 'required',
            'address' => 'required',
            'email' => 'required',
            'major' => 'required'
        ]);
        $student = Student::findOrFail($student->id);
        $student->name = $request->get('name');
        $student->npm = $request->get('npm');
        $student->gender = json_encode($request->get('gender'));
        $student->address = $request->get('address');
        $student->email = $request->get('email');
        $student->major = $request->get('major');
        $student->save();
        return redirect('/')->with('status', 'Update data success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        Student::destroy($student->id);
        return redirect('/')->with('status', 'Delete data success');
    }
}
