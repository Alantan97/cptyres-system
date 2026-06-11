<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class StaffController extends Controller
{
    public function index()
    {
        $staff = User::latest()->get();

        return view('staff.index', compact('staff'));
    }

    public function create()
    {
        return view('staff.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'role' => 'required',
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => $validated['role'],
        ]);

        return redirect()
            ->route('staff.index')
            ->with('success', 'Staff created successfully.');
    }

    public function edit(User $staff)
    {
        // Prevent staff editing admins
        if (
            Auth::user()->role !== 'admin'
            && $staff->role === 'admin'
        ) {

            abort(403);
        }

        return view('staff.edit', compact('staff'));
    }

    public function update(Request $request, User $staff)
    {
        if (
            Auth::user()->role !== 'admin'
            && $staff->role === 'admin'
        ) {

            abort(403);
        }

        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $staff->id,
            'password' => 'nullable|min:6',
            'role' => 'required',
        ]);

        $staff->name = $validated['name'];

        $staff->email = $validated['email'];

        $staff->role = $validated['role'];

        if ($request->filled('password')) {

            $staff->password = Hash::make($validated['password']);
        }

        $staff->save();

        return redirect()
            ->route('staff.index')
            ->with('success', 'Staff updated successfully.');
    }

    public function destroy(User $staff)
    {
        // Prevent deleting yourself
        if (Auth::id() === $staff->id) {

            return redirect()
                ->route('staff.index')
                ->with('error', 'You cannot delete your own account.');
        }

        // Prevent staff deleting admins
        if (
            Auth::user()->role !== 'admin'
            && $staff->role === 'admin'
        ) {

            abort(403);
        }

        $staff->delete();

        return redirect()
            ->route('staff.index')
            ->with('success', 'Staff deleted successfully.');
    }
}
