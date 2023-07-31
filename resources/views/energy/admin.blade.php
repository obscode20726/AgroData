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
                            <h4 class="card-title">Energy Usage Analysis</h4>

                        </div>
                    </div>
                    <div class="card-body">
                        <canvas id="energy-area-chart"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Energy Usage Analysis</h4>

                        </div>
                    </div>
                    <div class="card-body">
                        <canvas id="energy-pie-chart" width="400" height="400"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Energy Usage Report</h4>

                        </div>
                        <div>
                         <a href="{{ url('/generate-energy-report-pdf') }}" class="btn btn-primary">Download PDF</a>
                        </div>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive border rounded">
                            <table id="datatable" class="table " data-toggle="data-table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Crop Type</th>
                                        <th>Farmer Name</th>
                                        <th>Season Name</th>
                                        <th>Energy Type</th>
                                        <th>Cost</th>
                                        <th>Declared At</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($energies as $energy)
                                        <tr>
                                            <th scope="row">{{ $energy->id }}</th>
                                            <td>{{ $energy->crop->crop_type }}</td>
                                            <td>{{ $energy->farmer->name }}</td>
                                            <td><span class="badge bg-success">{{ $energy->season->name }} </span></td>
                                            <td>{{ $energy->energy_type }}</td>
                                            <td>{{ $energy->cost }}</td>
                                            <td>{{ $energy->created_at }}</td>
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

<!-- Script for Energy Charts -->
<script>
    // Retrieve energy data from backend
    let energyData = @json($energies);

    // Group the data by 'season.name' and 'crop.crop_type' and calculate the sum of 'cost'
    let energyChartData = {};
    energyData.forEach(data => {
        let key = data.crop.crop_type;
        if (!energyChartData[key]) {
            energyChartData[key] = {
                total_cost: 0,
                total_amount: 0,
            };
        }
        energyChartData[key].total_cost += parseFloat(data.cost);
        energyChartData[key].total_amount += parseFloat(data.amount);
    });

    // Extract labels and datasets for the area chart
    let areaLabels = Object.keys(energyChartData);
    let areaDatasets = [{
        label: 'Total Cost',
        data: Object.values(energyChartData).map(data => data.total_cost),
        backgroundColor: 'rgba(54, 162, 235, 0.2)',
        borderColor: 'rgba(54, 162, 235, 1)',
        borderWidth: 1,
        fill: true, // Set to true to create an area chart
    },
    {
        label: 'Total Amount',
        data: Object.values(energyChartData).map(data => data.total_amount),
        backgroundColor: 'rgba(255, 99, 132, 0.2)',
        borderColor: 'rgba(255, 99, 132, 1)',
        borderWidth: 1,
        fill: true, // Set to true to create an area chart
    }];

    // Create Energy Area Chart
    var energyAreaChart = new Chart(document.getElementById('energy-area-chart').getContext('2d'), {
        type: 'line', // Use 'line' type for area chart
        data: {
            labels: areaLabels,
            datasets: areaDatasets
        },
        options: {
            responsive: true,
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });

    // Extract data for the pie chart
let pieData = {};
energyData.forEach(data => {
    let key = data.crop.crop_type;
    if (!pieData[key]) {
        pieData[key] = 0;
    }
    pieData[key] += parseFloat(data.cost);
});

// Extract pie chart labels and values from the pieData
let pieLabels = Object.keys(pieData);
let pieValues = Object.values(pieData);
let pieColors = pieLabels.map(() => '#' + Math.floor(Math.random() * 16777215).toString(16));

// Create Energy Pie Chart
var energyPieChart = new Chart(document.getElementById("energy-pie-chart").getContext('2d'), {
    type: 'pie', // Use 'pie' type for 3D pie chart
    data: {
        labels: pieLabels,
        datasets: [{
            data: pieValues,
            backgroundColor: pieColors
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        title: {
            display: true,
            text: 'Energy Usage by Season and Crop Type'
        }
    }
});

</script>
