<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BorrowController extends Controller
{
    public function borrow($id)
    {
        $book = Book::find($id);

        if (!$book) {
            return redirect()->back()->with('error', 'The book does not exist.');
        }

        if ($book->is_borrowed) {
            return redirect()->back()->with('error', 'This book is already borrowed.');
        }

        // Associate the authenticated user with the borrowed book
        $book->user_id = Auth::id();
        $book->is_borrowed = true;
        $book->save();

        return redirect()->back()->with('success', 'You have borrowed the book successfully.');
    }
}
