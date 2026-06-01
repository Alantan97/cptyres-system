<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $sort = $request->sort;

        $direction = $request->direction ?? 'asc';

        $vehicles = Vehicle::with('customer')

            ->when($search, function ($query) use ($search) {

                $query->where('plate_number', 'like', "%{$search}%")
                    ->orWhere('brand', 'like', "%{$search}%")
                    ->orWhere('model', 'like', "%{$search}%")

                    ->orWhereHas('customer', function ($q) use ($search) {

                        $q->where('full_name', 'like', "%{$search}%");
                    });
            });

        // Sorting
        if ($sort == 'plate') {

            $vehicles->orderBy('plate_number', $direction);
        } elseif ($sort == 'customer') {

            $vehicles->join('customers', 'vehicles.customer_id', '=', 'customers.id')
                ->orderBy('customers.full_name', $direction)
                ->select('vehicles.*');
        } elseif ($sort == 'brand') {

            $vehicles->orderBy('brand', $direction);
        } elseif ($sort == 'model') {

            $vehicles->orderBy('model', $direction);
        } elseif ($sort == 'year') {

            $vehicles->orderBy('year', $direction);
        } elseif ($sort == 'color') {

            $vehicles->orderBy('color', $direction);
        } else {

            $vehicles->latest();
        }

        $vehicles = $vehicles->paginate(10)
            ->withQueryString();

        return view('vehicles.index', compact(
            'vehicles',
            'search',
            'sort',
            'direction'
        ));
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
