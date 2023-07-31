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
            padding: 2px;
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
                                        <th>#</th>
                                        <th>Crop Type</th>
                                        {{-- <th>Farmer</th> --}}
                                        <th>Season</th>
                                        <th>Area</th>
                                        <th>Planting Date</th>
                                        <th>Seed Type</th>
                                        <th>Fertilizer Amount</th>
                                        <th>Pesticide Type</th>
                                        <th>Yield</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($crops as $crop)
                                        <tr>
                                            <th scope="row">{{ $crop->id }}</th>
                                            <td>{{ $crop->crop_type }}</td>
                                            {{-- <td>{{ $crop->farmer->name }}</td> --}}
                                            <td style="background-color: #28a745; color: #fff; padding: 5px;">{{ $crop->season->name }}</td>
                                            <td>{{ $crop->area }}</td>
                                            <td>{{ $crop->planting_date }}</td>
                                            <td>{{ $crop->seed_type }}</td>
                                            <td>{{ $crop->fertilizer_amount }}</td>
                                            <td>{{ $crop->pesticide_type }}</td>
                                            <td>{{ $crop->yield }}</td>
                                           
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <!-- Modal -->
                            <div class="modal fade" id="addCropModal" tabindex="-1" aria-labelledby="addCropModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="addCropModalLabel">Declare Crop Usage</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST" class="row" action="{{ route('crops.store') }}">
                                                @csrf
                                                <div class="mb-3 col-6">
                                                    <label for="crop_type" class="form-label">Crop Type</label>
                                                    <input type="text" class="form-control" id="crop_type"
                                                        name="crop_type" required>
                                                </div>
                                                <div class="mb-3 col-6 d-none">
                                                    <label for="farmer_id" class="form-label">Farmer ID</label>
                                                    <input type="text" class="form-control" id="farmer_id"
                                                        name="farmer_id" value="{{ auth()->guard('farmer')->user()->id }}" >
                                                </div>
                                                <div class="mb-3 col-6">
                                                    <label for="season_id" class="form-label">Season ID</label>
                                                    <select class="form-control form-select" id="season_id" name="season_id">
                                                        @foreach($seasons as $season)
                                                            <option value="{{ $season->id }}">{{ $season->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="mb-3 col-6">
                                                    <label for="area" class="form-label">Area ( In hectares )</label>
                                                    <input type="number" class="form-control" id="area"
                                                        name="area" required>
                                                </div>
                                                <div class="mb-3 col-6">
                                                    <label for="planting_date" class="form-label">Planting Date</label>
                                                    <input type="date" class="form-control" id="planting_date"
                                                        name="planting_date" required>
                                                </div>
                                                <div class="mb-3 col-6">
                                                    <label for="seed_type" class="form-label">Seed Type</label>
                                                    <input type="text" class="form-control" id="seed_type"
                                                        name="seed_type" required>
                                                </div>
                                                <div class="mb-3 col-6">
                                                    <label for="fertilizer_amount" class="form-label">Fertilizer
                                                        Amount</label>
                                                    <input type="number" class="form-control" id="fertilizer_amount"
                                                        name="fertilizer_amount" required>
                                                </div>
                                                <div class="mb-3 col-6">
                                                    <label for="pesticide_type" class="form-label">Pesticide
                                                        Type</label>
                                                    <input type="text" class="form-control" id="pesticide_type"
                                                        name="pesticide_type" required>
                                                </div>
                                                <div class="mb-3 col-6">
                                                    <label for="yield" class="form-label">Yield Obtained</label>
                                                    <input type="number" class="form-control" id="yield"
                                                        name="yield" required>
                                                </div>
                                                <div class="mb-3 col-4">
                                                    <button type="submit" class="btn btn-primary">Save Data</button>
                                                </div>
                                                
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
