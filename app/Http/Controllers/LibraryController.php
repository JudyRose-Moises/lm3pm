<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book; // Adjust this to your actual Book model

class LibraryController extends Controller
{
    // Method to display all books
    public function index()
    {
        $books = Book::all();
        return view('admin.library', compact('books'));
    }

    // Method to show edit form for a book
    public function edit($id)
    {
        $book = Book::find($id);
        if (!$book) {
            abort(404); // Handle case where book is not found
        }
        return view('admin.editbook', compact('book'));
    }

    // Method to update book details
    public function update(Request $request, $id)
    {
        $book = Book::find($id);
        if (!$book) {
            abort(404); // Handle case where book is not found
        }

        $book->update([
            'book_name' => $request->input('book_name'),
            'author' => $request->input('author'),
            'publish_date' => $request->input('publish_date'),
            'cost' => $request->input('cost'),
        ]);

        return redirect()->route('admin.library')->with('success', 'Book updated successfully.');
    }

    // Method to delete a book
    public function destroy($id)
    {
        $book = Book::find($id);
        if ($book) {
            $book->delete();
            return redirect()->route('admin.library')->with('success', 'Book deleted successfully.');
        }
        return redirect()->route('admin.library')->with('error', 'Book not found.');
    }
}
