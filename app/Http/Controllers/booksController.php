<?php

namespace App\Http\Controllers;

use App\Models\Books;
use Illuminate\Http\Request;

class booksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = Books::query();
        $books = $query->orderBy('id', 'desc')->paginate(10);
        return view('admin.books.list', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.books.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $id = null)
    {
        $request->validate([
            'bookName' => 'required',
            'authorName' => 'required',
            'bookQuantity' => 'required||numeric',
        ]);
        if ($id) {
            Books::find($id)->update([
                'bookName' => $request->bookName,
                'authorName' => $request->authorName,
                'bookQuantity' => $request->bookQuantity,
                'bookDescription' => $request->bookDescription,
            ]);
            return redirect()->route('admin.list.books')->with('success', 'Book updated successfully');
        } else {
            // $request->validate([
            //     'bookName' => 'required',
            //     'authorName' => 'required',
            //     'bookQuantity' => 'required||numeric',
            // ]);
            Books::create([
                'bookName' => $request->bookName,
                'authorName' => $request->authorName,
                'bookQuantity' => $request->bookQuantity,
                'bookDescription' => $request->bookDescription,
            ]);

            return redirect()->route('admin.list.books')->with('success', 'Book added successfully');
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
        $book = Books::find($id);
        return view('admin.books.manage', compact('book'));
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
        Books::find($id)->delete();
        return redirect()->back()->with('success', 'Book deleted successfully');
    }
}
