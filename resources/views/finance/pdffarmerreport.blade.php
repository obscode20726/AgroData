<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Energy Report</title>
    <link href="{{ public_path('css/pdf_style.css') }}" rel="stylesheet">
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom CSS for the PDF report */
        body {
            padding: 20px;
            font-size: 10px; /* Reduce the font size */
        }

        .header-img {
            width: 200px;
        }

        .table-bordered {
            border: 1px solid #dee2e6;
            table-layout: fixed;
        }

        .table-bordered th,
        .table-bordered td {
            border: 1px solid #dee2e6;
            padding: 5px; /* Reduce the padding */
            white-space: normal; /* Allow table cells to wrap content */
        }

        /* Add lines between table columns */
        .table-bordered td:not(:last-child),
        .table-bordered th:not(:last-child) {
            border-right: 1px solid #dee2e6;
        }

        .bg-success {
            background-color: #28a745 !important;
            color: #fff;
            padding: 5px 10px;
            border-radius: 3px;
        }

        .mt-5 {
            margin-top: 40px;
        }

        /* Center content */
        .center {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 150vh;
        }

        
    </style>
</head>
<body>
    <div class="center">
        <!-- Header section -->
        <div class="container text-center">
            <img src="{{ public_path('\homepage\images\Logo Agrodata.png') }}" alt="Company Logo" class="header-img img-fluid">
            <h1 class="mt-3">{{ Auth::user()->name }} FARM</h1>
            <p>{{ Auth::user()->address }}</p>
        </div>

        <!-- Report title -->
        <div class="container mt-5">
            <h2 class="text-center">Energy Usage Report</h2>
        </div>

        <!-- Energy data -->
        <div class="table-responsive border rounded">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th style="width: 50px;">ID</th>
                    <th style="width: 100px;">Season</th>
                    <th>Production Cost</th>
                    <th>Income</th>
                    <th>Gross Margin</th>
                    <th>Labor Cost</th>
                    <th>Fertilizer Cost</th>
                    <th>Pesticide Cost</th>
                    <th>Irrigation Cost</th>
                    <th>Net Profit</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($finances as $finance)
                <tr>
                    <td scope="row">{{ $finance->id }}</td>
                    <td style="background-color: #28a745; color: #fff; padding: 5px;">{{ $finance->season->name }}</td>
                    <td>{{ $finance->production_cost }}</td>
                    <td>{{ $finance->income }}</td>
                    <td>{{ $finance->gross_margin }}</td>
                    <td>{{ $finance->labor_cost }}</td>
                    <td>{{ $finance->fertilizer_cost }}</td>
                    <td>{{ $finance->pesticide_cost }}</td>
                    <td>{{ $finance->irrigation_cost }}</td>
                    <td>{{ $finance->net_profit }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

        <!-- Printed by and Printed date -->
        <div class="container mt-5">
            <div class="text-center">
                Printed by {{ Auth::user()->name }} on {{ date('Y-m-d') }}
            </div>
        </div>
    </div>
</body>
</html>
