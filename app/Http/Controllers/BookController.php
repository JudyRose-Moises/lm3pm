<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');

        // Perform a search query
        $books = DB::table('books')
            ->where('book_name', 'LIKE', '%' . $query . '%')
            ->orWhere('author', 'LIKE', '%' . $query . '%')
            ->get();

        // Fetch suggested books 
        $suggestedBooks = DB::table('books')
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        return view('book.search', [
            'results' => $books,
            'query' => $query,
            'suggestedBooks' => $suggestedBooks
        ]);
    }

    public function borrow($id)
{
    // Update the book's borrow status
    $affected = DB::table('books')
                    ->where('id', $id)
                    ->where('is_borrowed', false) // Ensure book is not already borrowed
                    ->update(['is_borrowed' => true, 'updated_at' => now()]);

    if ($affected) {
        return redirect()->back()->with('success', 'Book borrowed successfully!');
    }

    return redirect()->back()->with('error', 'The book is already borrowed or does not exist.');
}


    public function viewBorrowed()
{
    // Fetch all books that are currently borrowed
    $borrowedBooks = DB::table('books')
                        ->where('is_borrowed', true)
                        ->get();

    return view('book.return', ['borrowedBooks' => $borrowedBooks]);
}


    public function returnBook($id)
{
    // Update the book's borrow status 
    $affected = DB::table('books')
                    ->where('id', $id)
                    ->where('is_borrowed', true) // Ensure book is currently borrowed
                    ->update(['is_borrowed' => false, 'updated_at' => now()]);

    if ($affected) {
        return redirect()->back()->with('success', 'Book returned successfully!');
    }

    return redirect()->back()->with('error', 'Unable to return the book.');
}

    
}
