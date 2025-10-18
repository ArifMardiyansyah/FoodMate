<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile');
    }

    public function edit()
    {
        return view('edit-profile');
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Store profile data in session (in a real app, this would be saved to database)
        session([
            'profile_name' => $request->name,
            'profile_email' => $request->email,
            'profile_phone' => $request->phone,
        ]);

        // Handle profile photo upload
        if ($request->hasFile('profile_photo')) {
            // Delete old photo if exists
            if (session('profile_photo')) {
                $oldPath = public_path('storage/' . session('profile_photo'));
                if (file_exists($oldPath)) {
                    unlink($oldPath);
                }
            }

            // Store new photo in public/storage/profile-photos
            $file = $request->file('profile_photo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('storage/profile-photos'), $filename);
            $photoPath = 'profile-photos/' . $filename;
            session(['profile_photo' => $photoPath]);
        }

        return redirect('/profile')->with('success', 'Profil berhasil diperbarui!');
    }
}