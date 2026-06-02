<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Service;
use App\Models\Vehicle;
use App\Models\ServiceRecord;
use Carbon\Carbon;
use App\Models\Notification;

class DashboardController extends Controller
{
    public function index()
    {
        $totalCustomers = Customer::count();

        $totalVehicles = Vehicle::count();

        $totalServices = Service::count();

        $totalServiceRecords = ServiceRecord::count();

        $pendingServices = ServiceRecord::where('status', 'pending')
            ->count();

        $completedServices = ServiceRecord::where('status', 'completed')
            ->count();

        $totalIncome = ServiceRecord::where('status', 'completed')
            ->sum('total_price');

        $recentRecords = ServiceRecord::with([
            'vehicle.customer',
            'items.service'
        ])
            ->latest()
            ->take(5)
            ->get();

        $latestServiceRecords = \App\Models\ServiceRecord::select('vehicle_id')
            ->selectRaw('MAX(service_date) as latest_service_date')
            ->groupBy('vehicle_id');

        $dueVehicles = \App\Models\ServiceRecord::joinSub(
            $latestServiceRecords,
            'latest_records',
            function ($join) {

                $join->on(
                    'service_records.vehicle_id',
                    '=',
                    'latest_records.vehicle_id'
                )

                    ->on(
                        'service_records.service_date',
                        '=',
                        'latest_records.latest_service_date'
                    );
            }
        )

            ->with([
                'vehicle.customer'
            ])

            ->whereDate(
                'service_records.service_date',
                '<=',
                Carbon::now()->subMonths(6)
            )
            ->latest('service_records.service_date')
            ->take(5)
            ->get();

        foreach ($dueVehicles as $record) {

            $exists = Notification::where(
                'type',
                'service_reminder'
            )

                ->where(
                    'service_record_id',
                    $record->id
                )

                ->exists();

            if (!$exists) {

                Notification::create([

                    'title' => 'Service Reminder',

                    'message' =>
                    'Vehicle ' .
                        $record->vehicle->plate_number .
                        ' may require servicing.',

                    'type' => 'service_reminder',

                    'service_record_id' => $record->id,
                ]);
            }
        }

        return view('dashboard', compact(
            'totalCustomers',
            'totalVehicles',
            'totalServices',
            'totalServiceRecords',
            'pendingServices',
            'completedServices',
            'totalIncome',
            'recentRecords',
            'dueVehicles'
        ));
    }
}
