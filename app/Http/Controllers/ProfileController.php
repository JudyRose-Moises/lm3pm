<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;


class ProfileController extends Controller
{
    // Show the profile edit form
    public function editProfile()
    {
        $user = Auth::user(); // Get the authenticated user

        if (is_null($user)) {
            // Log the issue
            Log::error('User is null in editProfile method');
            return redirect()->route('login')->withErrors('You must be logged in to edit your profile.');
        }

        // Log user details
        Log::info('User details:', ['user' => $user]);

        // Pass the user object to the view named 'profile'
        return view('profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user(); // Get the authenticated user

        if (is_null($user)) {
            // Log the issue
            Log::error('User is null in updateProfile method');
            return redirect()->route('login')->withErrors('You must be logged in to update your profile.');
        }

        // Validate the request data
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
        ]);

        // Update the user's profile with the validated data
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');
        

        // Log the updated user details
        Log::info('Updated user details:', ['user' => $user]);

        // Redirect back with a success message
        return redirect()->route('profile.edit')->with('success', 'Profile updated successfully.');
    }
}