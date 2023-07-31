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
                        <div>
                         <a href="{{ url('/generate-crops-report-pdf') }}" class="btn btn-primary">Download PDF</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive border rounded">
                            <table id="datatable" class="table " data-toggle="data-table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Crop Type</th>
                                        <th>Farmer</th>
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
                                            <td>{{ $crop->farmer->name }}</td>
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
  // Retrieve crop data from backend
let cropData = @json($crops);

// Group the data by 'crop_type' and calculate the sum of 'yield'
let cropChartData = {};
cropData.forEach(data => {
    let key = data.crop_type; // Use only 'crop_type' to group the data
    if (!cropChartData[key]) {
        cropChartData[key] = {
            total_yield: 0,
        };
    }
    cropChartData[key].total_yield += parseFloat(data.yield);
});

// Extract labels and datasets for the area chart
let areaLabels = Object.keys(cropChartData);
let areaDatasets = [{
    label: 'Total Yield',
    data: Object.values(cropChartData).map(data => data.total_yield),
    backgroundColor: 'rgba(54, 162, 235, 0.2)',
    borderColor: 'rgba(54, 162, 235, 1)',
    borderWidth: 1,
    fill: true, // Set to true to create an area chart
}];

// Create Crop Area Chart
var cropAreaChart = new Chart(document.getElementById('crop-season-yield-chart').getContext('2d'), {
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
cropData.forEach(data => {
    let key = data.crop_type; // Use only 'crop_type' to group the data
    if (!pieData[key]) {
        pieData[key] = 0;
    }
    pieData[key] += parseFloat(data.yield);
});

// Extract pie chart labels and values from the pieData
let pieLabels = Object.keys(pieData);
let pieValues = Object.values(pieData);
let pieColors = pieLabels.map(() => '#' + Math.floor(Math.random() * 16777215).toString(16));

// Create Crop Pie Chart
var cropPieChart = new Chart(document.getElementById("pieChart").getContext('2d'), {
    type: 'polarArea', // Use 'pie' type for 3D pie chart
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
            text: 'Crop Yields by Crop Type'
        }
    }
});


</script>
