<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index() {
        $user = Auth::user();
        return view('Auth.profile.profile', compact('user'));
    }

    public function editProfile(User $user) {
        return view('auth.profile.update-profile', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        // Ensure the authenticated user is the one being updated
        if (Auth::id() !== $user->id) {
            return redirect()->route('profile.edit', $user)->withErrors(['You are not authorized to update this profile.']);
        }

        // Validate the input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'current_password' => 'required',
        ]);

        // Verify the current password
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'The password is incorrect.']);
        }

        // Update the user's details
        $user->name = $request->name;
        $user->email = $request->email;

        // Save the changes
        $user->save();

        return redirect()->route('profile.edit', $user)->with('success', 'User updated successfully!');
    }
}
