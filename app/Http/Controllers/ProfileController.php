<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Get total orders count
        $totalOrders = $user?->orders()->count() ?? 0;

        // Get total spending (sum of all completed orders)
        $totalSpending = $user?->orders()
            ->whereIn('status', ['completed', 'delivered'])
            ->sum('total') ?? 0;

        return view('profile', [
            'user' => $user,
            'profilePhoto' => $user?->profile_photo_path,
            'profilePhone' => $user?->phone,
            'totalOrders' => $totalOrders,
            'totalSpending' => $totalSpending,
        ]);
    }

    public function edit()
    {
        $user = Auth::user();

        return view('edit-profile', [
            'user' => $user,
            'profilePhoto' => $user?->profile_photo_path,
            'profilePhone' => $user?->phone,
        ]);
    }

    public function update(Request $request)
    {
        $user = $request->user();

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')->ignore($user?->id)],
            'phone' => 'nullable|string|max:20',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048'
        ]);

        if (!$user) {
            return redirect('/profile')->with('error', 'User tidak ditemukan');
        }

        // Update basic fields
        $user->fill([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
        ]);

        // Handle photo upload
        if ($request->hasFile('profile_photo')) {
            // Delete old photo if exists
            if ($user->profile_photo_path && Storage::disk('public')->exists($user->profile_photo_path)) {
                Storage::disk('public')->delete($user->profile_photo_path);
            }

            $path = $request->file('profile_photo')->store('profile-photos', 'public');
            $user->profile_photo_path = $path;
        }

        $user->save();

        return redirect('/profile')->with('success', 'Profil berhasil diperbarui!');
    }
}