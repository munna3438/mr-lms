<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class studentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = Student::query();
        $students = $query->orderBy('id', 'desc')->paginate(10);
        return view('admin.students.list', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.students.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $id = null)
    {
        $request->validate([
            'studentName' => 'required',
            'studentEmail' => 'required',
            'studentPhone' => 'required||string || min:11',
            'studentGender' => 'nullable',
            'studentNID' => 'required||numeric',
            'studentAddress' => 'required',
        ]);
        if ($id) {
            Student::find($id)->update([
                'studentName' => $request->studentName,
                'studentEmail' => $request->studentEmail,
                'studentPhone' => $request->studentPhone,
                'studentGender' => $request->studentGender,
                'studentNID' => $request->studentNID,
                'studentAddress' => $request->studentAddress,
            ]);
            return redirect()->route('admin.list.student')->with('success', 'Student updated successfully');
        } else {

            Student::create([
                'studentName' => $request->studentName,
                'studentEmail' => $request->studentEmail,
                'studentPhone' => $request->studentPhone,
                'studentGender' => $request->studentGender,
                'studentNID' => $request->studentNID,
                'studentAddress' => $request->studentAddress,
            ]);

            return redirect()->route('admin.list.student')->with('success', 'Student added successfully');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $student = Student::find($id);
        return view('admin.students.manage', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Student::find($id)->delete();
        return redirect()->back()->with('success', 'Student deleted successfully');
    }
}
