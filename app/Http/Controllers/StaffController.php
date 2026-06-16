<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class StaffController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $sort = $request->get('sort', 'name');

        $direction = $request->get('direction', 'asc');

        $staff = User::query()

            ->when($search, function ($query) use ($search) {

                $query->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('role', 'like', "%{$search}%");
            })

            ->orderBy($sort, $direction)

            ->paginate(10)

            ->withQueryString();

        return view('staff.index', compact(
            'staff',
            'search',
            'sort',
            'direction'
        ));
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
