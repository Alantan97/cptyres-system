<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Vehicle;
use App\Models\ServiceRecord;
use App\Models\ServiceRecordItem;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Notification;

class ServiceRecordController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $sort = $request->sort;

        $direction = $request->direction ?? 'asc';

        $serviceRecords = ServiceRecord::with([
            'vehicle.customer',
            'items.service'
        ])

            ->when($search, function ($query) use ($search) {

                $query->whereHas('vehicle', function ($q) use ($search) {

                    $q->where('plate_number', 'like', "%{$search}%")
                        ->orWhere('brand', 'like', "%{$search}%")
                        ->orWhere('model', 'like', "%{$search}%");
                })

                    ->orWhereHas('vehicle.customer', function ($q) use ($search) {

                        $q->where('full_name', 'like', "%{$search}%");
                    })

                    ->orWhere('status', 'like', "%{$search}%");
            });

        // Sorting
        if ($sort == 'vehicle') {

            $serviceRecords->join('vehicles', 'service_records.vehicle_id', '=', 'vehicles.id')
                ->orderBy('vehicles.plate_number', $direction)
                ->select('service_records.*');
        } elseif ($sort == 'customer') {

            $serviceRecords->join('vehicles', 'service_records.vehicle_id', '=', 'vehicles.id')
                ->join('customers', 'vehicles.customer_id', '=', 'customers.id')
                ->orderBy('customers.full_name', $direction)
                ->select('service_records.*');
        } elseif ($sort == 'total') {

            $serviceRecords->orderBy('total_price', $direction);
        } elseif ($sort == 'status') {

            $serviceRecords->orderBy('status', $direction);
        } elseif ($sort == 'date') {

            $serviceRecords->orderBy('service_date', $direction);
        } else {

            $serviceRecords->latest();
        }

        $serviceRecords = $serviceRecords->paginate(10)
            ->withQueryString();

        return view('service-records.index', compact(
            'serviceRecords',
            'search',
            'sort',
            'direction'
        ));
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
            'service_date' => 'required',
            'mileage' => 'required',
            'status' => 'required',
        ]);

        $serviceRecord = ServiceRecord::create([
            'vehicle_id' => $request->vehicle_id,
            'service_date' => $request->service_date,
            'mileage' => $request->mileage,
            'notes' => $request->notes,
            'status' => $request->status,
            'total_price' => 0,
        ]);

        $grandTotal = 0;

        foreach ($request->services as $item) {

            $service = Service::find($item['service_id']);

            $quantity = $item['quantity'];

            $price = $service->price;

            $subtotal = $price * $quantity;

            ServiceRecordItem::create([
                'service_record_id' => $serviceRecord->id,
                'service_id' => $service->id,
                'quantity' => $quantity,
                'price' => $price,
                'subtotal' => $subtotal,
            ]);

            $grandTotal += $subtotal;
        }

        $serviceRecord->update([
            'total_price' => $grandTotal,
        ]);

        Notification::create([
            'title' => 'New Job Order',
            'message' => 'Job Order #' . $serviceRecord->id . ' was created.',
            'service_record_id' => $serviceRecord->id,
        ]);

        return redirect()
            ->route('service-records.index')
            ->with('success', 'Service record created successfully');
    }

    public function show(ServiceRecord $serviceRecord)
    {
        $serviceRecord->load([
            'vehicle.customer',
            'items.service',
        ]);

        return view('service-records.show', compact(
            'serviceRecord'
        ));
    }

    public function edit(ServiceRecord $serviceRecord)
    {
        $serviceRecord->load([
            'items.service',
            'vehicle.customer',
        ]);

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
            'service_date' => 'required',
            'mileage' => 'required',
            'status' => 'required',
        ]);

        $serviceRecord->update([
            'vehicle_id' => $request->vehicle_id,
            'service_date' => $request->service_date,
            'mileage' => $request->mileage,
            'notes' => $request->notes,
            'status' => $request->status,
        ]);

        // Delete old items
        $serviceRecord->items()->delete();

        $grandTotal = 0;

        foreach ($request->services as $item) {

            $service = Service::find($item['service_id']);

            $quantity = $item['quantity'];

            $price = $service->price;

            $subtotal = $price * $quantity;

            ServiceRecordItem::create([
                'service_record_id' => $serviceRecord->id,
                'service_id' => $service->id,
                'quantity' => $quantity,
                'price' => $price,
                'subtotal' => $subtotal,
            ]);

            $grandTotal += $subtotal;
        }

        $serviceRecord->update([
            'total_price' => $grandTotal,
        ]);

        Notification::create([
            'title' => 'Job Order Updated',
            'message' => 'Job Order #' . $serviceRecord->id . ' was updated.',
        ]);

        return redirect()
            ->route('service-records.index')
            ->with('success', 'Service record updated successfully');
    }

    public function destroy(ServiceRecord $serviceRecord)
    {
        Notification::create([
            'title' => 'Job Order Deleted',
            'message' => 'Job Order #' . $serviceRecord->id . ' was deleted.',
            'service_record_id' => $serviceRecord->id,
        ]);

        $serviceRecord->delete();

        return redirect()
            ->route('service-records.index')
            ->with('success', 'Service record deleted successfully');
    }

    public function invoice(ServiceRecord $serviceRecord)
    {
        $serviceRecord->load([
            'vehicle.customer',
            'items.service',
        ]);

        $pdf = Pdf::loadView(
            'service-records.invoice',
            compact('serviceRecord')
        );

        return $pdf->stream(
            'invoice-' . $serviceRecord->id . '.pdf'
        );
    }
}
