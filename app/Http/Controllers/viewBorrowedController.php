<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ViewBorrowedController extends Controller
{
    public function viewBorrowedeBooks(Request $request)
    {
        $books = DB::table('books')
            ->where('is_borrowed', 1)
            ->get();

        return view('admin.viewBorrowed', compact('books'));
    }
}
