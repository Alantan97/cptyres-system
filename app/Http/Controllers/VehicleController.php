<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::with('customer')
            ->latest()
            ->get();

        return view('vehicles.index', compact('vehicles'));
    }

    public function create()
    {
        $customers = Customer::orderBy('full_name')->get();
        return view('vehicles.create', compact('customers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required',
            'plate_number' => 'required|unique:vehicles',
            'brand' => 'required',
            'model' => 'required',
            'year' => 'required',
            'color' => 'nullable',
        ]);

        Vehicle::create([
            'customer_id' => $request->customer_id,
            'plate_number' => $request->plate_number,
            'brand' => $request->brand,
            'model' => $request->model,
            'year' => $request->year,
            'color' => $request->color,
        ]);

        return redirect()
            ->route('vehicles.index')
            ->with('success', 'Vehicle created successfully');
    }

    public function show(Vehicle $vehicle)
    {
        return view('vehicles.show', compact('vehicle'));
    }

    public function edit(Vehicle $vehicle)
    {
        $customers = Customer::orderBy('full_name')->get();

        return view('vehicles.edit', compact('vehicle', 'customers'));
    }

    public function update(Request $request, Vehicle $vehicle)
    {
        $request->validate([
            'customer_id' => 'required',
            'plate_number' => 'required|unique:vehicles,plate_number,' . $vehicle->id,
            'brand' => 'required',
            'model' => 'required',
            'year' => 'required',
            'color' => 'nullable',
        ]);

        $vehicle->update([
            'customer_id' => $request->customer_id,
            'plate_number' => $request->plate_number,
            'brand' => $request->brand,
            'model' => $request->model,
            'year' => $request->year,
            'color' => $request->color,
        ]);

        return redirect()
            ->route('vehicles.index')
            ->with('success', 'Vehicle updated successfully');
    }

    public function destroy(Vehicle $vehicle)
    {
        $vehicle->delete();

        return redirect()
            ->route('vehicles.index')
            ->with('success', 'Vehicle deleted successfully');
    }
}
