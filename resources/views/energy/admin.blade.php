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
                        <canvas id="energy-bar-chart"></canvas>
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
                        <canvas id="energy-pie-chart"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Energy Usage Report</h4>

                        </div>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive border rounded">
                            <table id="datatable" class="table " data-toggle="data-table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Crop Type</th>
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
                                            <td>{{ $energy->season->name }}</td>
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

<script>
    // Retrieve energy data from backend
    let energyData = @json($energyChart);
    // Extract labels and datasets for the bar chart
    let barLabels = energyData.original.data.map(data => data.season.name);
    let barDatasets = [{
        label: 'Electricity',
        data: energyData.original.data.map(data => data.amount),
        backgroundColor: 'rgba(54, 162, 235, 0.5)',
        borderColor: 'rgb(54, 162, 235)',
        borderWidth: 1
    },
    {
        label: 'Cost',
        data: energyData.original.data.map(data => data.cost),
        backgroundColor: 'rgb(255, 99, 132)',
        borderColor: 'rgb(255, 99, 132)',
        borderWidth: 1
    }];

    // BAR CHART
    let barCtx = document.getElementById('energy-bar-chart').getContext('2d');
    let barChart = new Chart(barCtx, {
        type: 'bar',
        data: {
            labels: barLabels,
            datasets: barDatasets
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
    energyData.original.data.forEach(data => {
        if (!pieData[data.crop.crop_type]) {
            pieData[data.crop.crop_type] = 0;
        }
        pieData[data.crop.crop_type] += parseFloat(data.cost);
    });

    // PIE CHART
    let pieLabels = Object.keys(pieData);
    let pieValues = Object.values(pieData);
    let pieColors = pieLabels.map(() => '#' + Math.floor(Math.random() * 16777215).toString(16));

    let pieCtx = document.getElementById('energy-pie-chart').getContext('2d');
    let pieChart = new Chart(pieCtx, {
        type: 'pie',
        data: {
            labels: pieLabels,
            datasets: [{
                data: pieValues,
                backgroundColor: pieColors
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false
        }
    });
</script>
