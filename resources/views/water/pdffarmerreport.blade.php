<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Energy Report</title>
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
            height: 100vh;
        }
        .season-column {
            font-size: 4px;
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

        <!-- Water data -->
        
    <div class="table-responsive border rounded">
        <table class="table table-bordered table-striped">
        <thead>
                                    <tr>
                                        <th class="smaller-column">Id</th>
                                        <th>Season</th>
                                        <th>Crop</th>
                                        <th>Amount</th>
                                        <th>Irrigation Type</th>
                                        <th>Irrigation Frequency</th>
                                        <th>Cost</th>
                                        <th>Registered date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($waters as $water)
                                        <tr>
                                            <td scope="row">{{ $water->id }}</td>
                                            <td style="background-color: #28a745; color: #fff; padding: 5px;">{{ $water->season->name }}</td>
                                            <td>{{ $water->crop->crop_type }}</td>
                                            <td>{{ $water->amount }}</td>
                                            <td>{{ $water->irrigation_type }}</td>
                                            <td>{{ $water->irrigation_frequency }}</td>
                                            <td>{{ $water->cost }}</td>
                                            <td>{{ $water->created_at }}</td>
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
