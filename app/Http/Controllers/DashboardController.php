<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Service;
use App\Models\Vehicle;
use App\Models\ServiceRecord;

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

        return view('dashboard', compact(
            'totalCustomers',
            'totalVehicles',
            'totalServices',
            'totalServiceRecords',
            'pendingServices',
            'completedServices',
            'totalIncome',
            'recentRecords'
        ));
    }
}
