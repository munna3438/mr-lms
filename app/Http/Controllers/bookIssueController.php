<?php

namespace App\Http\Controllers;

use App\Models\BookIssue;
use App\Models\Books;
use App\Models\Student;
use Illuminate\Http\Request;

class bookIssueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = BookIssue::query();
        $bookIssues = $query->orderBy('id', 'desc')->paginate(10);
        $books = Books::select('id', 'bookName')->get();
        $students = Student::select('id', 'studentName')->get();
        return view('admin.issueBook.list', compact('bookIssues', 'books', 'students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $bookQuery = Books::query();
        $studentQuery = Student::query();
        $books = $bookQuery->orderBy('id', 'desc')->get();
        $students = $studentQuery->orderBy('id', 'desc')->get();
        return view('admin.issueBook.add', compact('books', 'students'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $id = null)
    {
        $request->validate([
            'bookID' => 'required||numeric',
            'studentID' => 'required||numeric',
            'returnDate' => 'required||date',
        ]);
        if ($id) {
            BookIssue::find($id)->update([
                'bookID' => $request->bookID,
                'studentID' => $request->studentID,
                'issueDate' => $request->issueDate,
                'returnDate' => $request->returnDate,
            ]);
            return redirect()->route('admin.list.book-issue')->with('success', 'Book Issue updated successfully');
        } else {
            $currentDate = date('Y-m-d');
            BookIssue::create([
                'bookID' => $request->bookID,
                'studentID' => $request->studentID,
                'issueDate' => $currentDate,
                'returnDate' => $request->returnDate,
            ]);

            return redirect()->route('admin.list.book-issue')->with('success', 'Book Issue successfully');
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
        $bookQuery = Books::query();
        $studentQuery = Student::query();
        $books = $bookQuery->orderBy('id', 'desc')->get();
        $students = $studentQuery->orderBy('id', 'desc')->get();
        $bookIssue = BookIssue::find($id);
        return view('admin.issueBook.manage', compact('bookIssue', 'books', 'students'));
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
        BookIssue::find($id)->delete();
        return redirect()->route('admin.list.book-issue')->with('success', 'Book Issue deleted successfully');
    }
}
