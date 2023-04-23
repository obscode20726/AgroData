@include('components.dashcss')
@include('admin.components.aside')
<main class="main-content">
    <div class="position-relative ">
        <!--Nav Start-->
        @include('components.dasheader')
        <!--Nav End-->
    </div>
    <div class="content-inner container-fluid pb-0" id="page_layout">
        <div class="row">

            <div class="col-sm-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Crop Yield Harvest Analysis</h4>

                        </div>
                    </div>
                    <div class="card-body">
                        <canvas id="crop-season-yield-chart"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Seasonan Analysis</h4>

                        </div>
                    </div>
                    <div class="card-body">
                        <canvas id="pieChart"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Crops Report List</h4>

                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive border rounded">
                            <table id="datatable" class="table " data-toggle="data-table">
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
                                            <td> <span class="badge bg-success">{{ $crop->season->name }}</span> </td>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('components.dashfooter')
</main>
@include('components.dashjs')
<script>
    var ctx = document.getElementById('crop-season-yield-chart').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($labels) !!},
            datasets: [{
                label: 'Crop Yield',
                data: {!! json_encode($chartData) !!},
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });


    // PIE DATA

    // Get data from controller
    var cropPieData = {!! json_encode($cropPieData) !!};

    // Extract season names and corresponding crop yields
    var seasonNames = Object.keys(cropPieData);
    var cropYields = Object.values(cropPieData);

    // Generate random colors for pie chart slices
    var colors = seasonNames.map(function(seasonName) {
        return '#' + Math.floor(Math.random() * 16777215).toString(16);
    });

    // Create pie chart
    var pieChart = new Chart(document.getElementById("pieChart"), {
        type: 'pie',
        data: {
            labels: seasonNames,
            datasets: [{
                backgroundColor: colors,
                data: cropYields
            }]
        },
        options: {
            title: {
                display: true,
                text: 'Crop yields by season'
            }
        }
    });
</script>
