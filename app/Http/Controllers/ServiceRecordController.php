<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Vehicle;
use App\Models\ServiceRecord;
use Illuminate\Http\Request;

class ServiceRecordController extends Controller
{
    public function index()
    {
        $serviceRecords = ServiceRecord::latest()->get();
        return view('service-records.index', compact('serviceRecords'));
    }

    public function create()
    {
        $vehicles = Vehicle::with('customer')
            ->orderBy('plate_number')
            ->get();

        $services = Service::orderBy('service_name')
            ->get();

        return view('service-records.create', compact(
            'vehicles',
            'services'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'vehicle_id' => 'required',
            'service_id' => 'required',
            'service_date' => 'required|date',
            'mileage' => 'required|numeric',
            'notes' => 'nullable',
            'total_price' => 'required|numeric',
            'status' => 'required',
        ]);

        ServiceRecord::create([
            'vehicle_id' => $request->vehicle_id,
            'service_id' => $request->service_id,
            'service_date' => $request->service_date,
            'mileage' => $request->mileage,
            'notes' => $request->notes,
            'total_price' => $request->total_price,
            'status' => $request->status,
        ]);

        return redirect()
            ->route('service-records.index')
            ->with('success', 'Service record created successfully');
    }

    public function show(ServiceRecord $serviceRecord)
    {
        return view('service-records.show', compact('serviceRecord'));
    }

    public function edit(ServiceRecord $serviceRecord)
    {
        $vehicles = Vehicle::with('customer')
            ->orderBy('plate_number')
            ->get();

        $services = Service::orderBy('service_name')
            ->get();

        return view('service-records.edit', compact(
            'serviceRecord',
            'vehicles',
            'services'
        ));
    }

    public function update(Request $request, ServiceRecord $serviceRecord)
    {
        $request->validate([
            'vehicle_id' => 'required',
            'service_id' => 'required',
            'service_date' => 'required|date',
            'mileage' => 'required|numeric',
            'notes' => 'nullable',
            'total_price' => 'required|numeric',
            'status' => 'required',
        ]);

        $serviceRecord->update([
            'vehicle_id' => $request->vehicle_id,
            'service_id' => $request->service_id,
            'service_date' => $request->service_date,
            'mileage' => $request->mileage,
            'notes' => $request->notes,
            'total_price' => $request->total_price,
            'status' => $request->status,
        ]);

        return redirect()
            ->route('service-records.index')
            ->with('success', 'Service record updated successfully');
    }

    public function destroy(ServiceRecord $serviceRecord)
    {
        $serviceRecord->delete();

        return redirect()
            ->route('service-records.index')
            ->with('success', 'Service record deleted successfully');
    }
}
