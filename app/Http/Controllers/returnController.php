<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReturnController extends Controller
{
    public function index()
    {
        // Get currently authenticated user
        $user = Auth::user();

        // Fetch borrowed books for the current user
        $borrowedBooks = $user->borrowedBooks()->where('is_borrowed', true)->get();

        return view('return', compact('borrowedBooks'));
    }
}
