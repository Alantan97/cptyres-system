<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search;

        $sort = $request->sort;

        $direction = $request->direction ?? 'asc';

        $customers = Customer::when($search, function ($query) use ($search) {

            $query->where('full_name', 'like', "%{$search}%")
                ->orWhere('phone', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%");
        });

        // Sorting
        if ($sort == 'name') {

            $customers->orderBy('full_name', $direction);
        } elseif ($sort == 'phone') {

            $customers->orderBy('phone', $direction);
        } elseif ($sort == 'email') {

            $customers->orderBy('email', $direction);
        } elseif ($sort == 'date') {

            $customers->orderBy('created_at', $direction);
        } else {

            $customers->latest();
        }

        $customers = $customers->paginate(10)
            ->withQueryString();

        return view('customers.index', compact(
            'customers',
            'search',
            'sort',
            'direction'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required',
            'phone' => 'required',
            'email' => 'nullable|email',
            'address' => 'nullable',
        ]);

        Customer::create([
            'full_name' => $request->full_name,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
        ]);

        return redirect()
            ->route('customers.index')
            ->with('success', 'Customer created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        return view('customers.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        return view('customers.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'full_name' => 'required',
            'phone' => 'required',
            'email' => 'nullable|email',
            'address' => 'nullable',
        ]);

        $customer->update([
            'full_name' => $request->full_name,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
        ]);

        return redirect()
            ->route('customers.index')
            ->with('success', 'Customer updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();

        return redirect()
            ->route('customers.index')
            ->with('success', 'Customer deleted successfully');
    }
}
