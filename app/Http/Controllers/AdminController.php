<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class AdminController extends Controller
{
    public function dashboard()
    {
        // Fetch counts for current books and borrowed books
        $totalBooks = Book::count();
        $borrowedBooks = Book::where('is_borrowed', true)->count();

        return view('admin.dashboard', compact('totalBooks', 'borrowedBooks'));
    }

    public function library()
    {
        // Fetch all books in the library
        $books = Book::all();

        return view('admin.library', compact('books'));
    }

    public function viewBorrowed()
    {
        // Fetch borrowed books
        $borrowedBooks = Book::where('is_borrowed', true)->get();

        return view('admin.viewBorrowed', compact('borrowedBooks'));
    }
}
