<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">

    <title>
        Invoice
    </title>

    <style>

        body {
            font-family: sans-serif;
            color: #111827;
            font-size: 14px;
            margin: 40px;
        }

        .header {
            margin-bottom: 40px;
        }

        .logo {
            font-size: 32px;
            font-weight: bold;
            color: #00a19b;
        }

        .subtitle {
            color: #6b7280;
            margin-top: 5px;
        }

        .invoice-info {
            margin-top: 30px;
        }

        .section {
            margin-bottom: 30px;
        }

        .section-title {
            font-size: 12px;
            font-weight: bold;
            color: #6b7280;
            text-transform: uppercase;
            margin-bottom: 8px;
        }

        .card {
            background: #f9fafb;
            padding: 15px;
            border-radius: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table thead {
            background: #f3f4f6;
        }

        table th {
            text-align: left;
            padding: 12px;
            font-size: 12px;
            text-transform: uppercase;
            color: #6b7280;
        }

        table td {
            padding: 12px;
            border-bottom: 1px solid #e5e7eb;
        }

        .total {
            margin-top: 30px;
            text-align: right;
        }

        .total h1 {
            color: #00a19b;
            font-size: 32px;
            margin: 0;
        }

        .status {
            display: inline-block;
            padding: 6px 14px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: bold;
        }

        .completed {
            background: #dcfce7;
            color: #15803d;
        }

        .pending {
            background: #fef9c3;
            color: #a16207;
        }

        .footer {
            margin-top: 60px;
            text-align: center;
            color: #9ca3af;
            font-size: 12px;
        }

    </style>

</head>

<body>

    {{-- Header --}}
    <div class="header">

        <div class="logo">
            CPTyres
        </div>

        <div class="subtitle">
            Car Workshop Management System
        </div>

    </div>

    {{-- Invoice Info --}}
    <div class="section">

        <div class="section-title">
            Invoice Information
        </div>

        <div class="card">

            <table>

                <tr>

                    <td>
                        <strong>Invoice ID:</strong>
                    </td>

                    <td>
                        #{{ $serviceRecord->id }}
                    </td>

                    <td>
                        <strong>Date:</strong>
                    </td>

                    <td>
                        {{ $serviceRecord->service_date }}
                    </td>

                </tr>

                <tr>

                    <td>
                        <strong>Status:</strong>
                    </td>

                    <td>

                        <span class="status {{ $serviceRecord->status }}">

                            {{ ucfirst($serviceRecord->status) }}

                        </span>

                    </td>

                    <td>
                        <strong>Mileage:</strong>
                    </td>

                    <td>
                        {{ number_format($serviceRecord->mileage) }} KM
                    </td>

                </tr>

            </table>

        </div>

    </div>

    {{-- Customer --}}
    <div class="section">

        <div class="section-title">
            Customer & Vehicle
        </div>

        <div class="card">

            <table>

                <tr>

                    <td>
                        <strong>Customer</strong>
                    </td>

                    <td>
                        {{ $serviceRecord->vehicle->customer->full_name }}
                    </td>

                </tr>

                <tr>

                    <td>
                        <strong>Phone</strong>
                    </td>

                    <td>
                        {{ $serviceRecord->vehicle->customer->phone }}
                    </td>

                </tr>

                <tr>

                    <td>
                        <strong>Vehicle</strong>
                    </td>

                    <td>

                        {{ $serviceRecord->vehicle->brand }}
                        {{ $serviceRecord->vehicle->model }}

                    </td>

                </tr>

                <tr>

                    <td>
                        <strong>Plate Number</strong>
                    </td>

                    <td>
                        {{ $serviceRecord->vehicle->plate_number }}
                    </td>

                </tr>

            </table>

        </div>

    </div>

    {{-- Services --}}
    <div class="section">

        <div class="section-title">
            Services
        </div>

        <table>

            <thead>

                <tr>

                    <th>
                        Service
                    </th>

                    <th>
                        Quantity
                    </th>

                    <th>
                        Price
                    </th>

                    <th>
                        Subtotal
                    </th>

                </tr>

            </thead>

            <tbody>

                @foreach ($serviceRecord->items as $item)

                    <tr>

                        <td>
                            {{ $item->service->service_name }}
                        </td>

                        <td>
                            {{ $item->quantity }}
                        </td>

                        <td>

                            RM {{ number_format($item->price, 2) }}

                        </td>

                        <td>

                            RM {{ number_format($item->subtotal, 2) }}

                        </td>

                    </tr>

                @endforeach

            </tbody>

        </table>

    </div>

    {{-- Notes --}}
    <div class="section">

        <div class="section-title">
            Notes
        </div>

        <div class="card">

            {{ $serviceRecord->notes ?: 'No notes available.' }}

        </div>

    </div>

    {{-- Total --}}
    <div class="total">

        <p>
            Grand Total
        </p>

        <h1>

            RM {{ number_format($serviceRecord->total_price, 2) }}

        </h1>

    </div>

    {{-- Footer --}}
    <div class="footer">

        Thank you for choosing CPTyres.

    </div>

</body>

</html>