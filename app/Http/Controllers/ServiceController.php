<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $sort = $request->sort;

        $direction = $request->direction ?? 'asc';

        $services = Service::when($search, function ($query) use ($search) {

            $query->where('service_name', 'like', "%{$search}%")
                ->orWhere('description', 'like', "%{$search}%")
                ->orWhere('price', 'like', "%{$search}%");
        });

        // Sorting
        if ($sort == 'name') {

            $services->orderBy('service_name', $direction);
        } elseif ($sort == 'price') {

            $services->orderBy('price', $direction);
        } elseif ($sort == 'date') {

            $services->orderBy('created_at', $direction);
        } else {

            $services->latest();
        }

        $services = $services->paginate(10)
            ->withQueryString();

        return view('services.index', compact(
            'services',
            'search',
            'sort',
            'direction'
        ));
    }

    public function create()
    {
        if (Auth::user()->role !== 'admin') {
            abort(403);
        }

        return view('services.create');
    }

    public function store(Request $request)
    {
        if (Auth::user()->role !== 'admin') {
            abort(403);
        }

        $request->validate([
            'service_name' => 'required',
            'description' => 'nullable',
            'price' => 'required|numeric',
        ]);

        Service::create([
            'service_name' => $request->service_name,
            'description' => $request->description,
            'price' => $request->price,
        ]);

        return redirect()
            ->route('services.index')
            ->with('success', 'Service created successfully');
    }

    public function show(Service $service)
    {
        return view('services.show', compact('service'));
    }

    public function edit(Service $service)
    {
        if (Auth::user()->role !== 'admin') {
            abort(403);
        }

        return view('services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        if (Auth::user()->role !== 'admin') {
            abort(403);
        }

        $request->validate([
            'service_name' => 'required',
            'description' => 'nullable',
            'price' => 'required|numeric',
        ]);

        $service->update([
            'service_name' => $request->service_name,
            'description' => $request->description,
            'price' => $request->price,
        ]);

        return redirect()
            ->route('services.index')
            ->with('success', 'Service updated successfully');
    }

    public function destroy(Service $service)
    {
        if (Auth::user()->role !== 'admin') {
            abort(403);
        }

        $service->delete();

        return redirect()
            ->route('services.index')
            ->with('success', 'Service deleted successfully');
    }
}
