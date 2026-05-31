<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::latest()->get();
        return view('services.index', compact('services'));
    }

    public function create()
    {
        return view('services.create');
    }

    public function store(Request $request)
    {
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
        return view('services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
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
        $service->delete();

        return redirect()
            ->route('services.index')
            ->with('success', 'Service deleted successfully');
    }
}
