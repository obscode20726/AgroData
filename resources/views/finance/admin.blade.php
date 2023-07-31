@include('components.dashcss')
@include('admin.components.aside')

<main class="main-content">
    <div class="position-relative">
        <!--Nav Start-->
        @include('components.dasheader')
        <!--Nav End-->
    </div>
    <div class="content-inner container-fluid pb-0" id="page_layout">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Financial Analysis</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <canvas id="finance-chart-bar"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-sm-8">
                <div class="card">
                    <div class="card-body">
                        <canvas id="finance-chart"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">
                        <canvas id="finance-chart-pie" height="400"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Finance Data</h4>
                        </div>
                        <div>
                            <a href="{{ url('/generate-finance-report-pdf') }}" class="btn btn-primary">Download
                                PDF</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive border rounded">
                            <table id="datatable" class="table " data-toggle="data-table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Season</th>
                                        <th>Farmer Name</th>
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
                                        <td>{{ $finance->id }}</td>
                                        <td><span class="badge bg-success">{{ $finance->season->name }}</span></td>
                                        <td>{{ $finance->farmer->name }}</td>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('components.dashfooter')
</main>
@include('components.dashjs')

<script>
    // Retrieve finance data from backend
    let financeData = @json($financeJson);

    // Extract labels and datasets for the chart
    let labels = financeData.original.map(data => data.name);
    let datasets = [{
        label: 'Production Cost',
        data: financeData.original.map(data => data.production_cost),
        borderColor: 'rgb(255, 99, 132)',
        fill: true,
        backgroundColor: 'rgba(255, 99, 132, 0.2)'
    },
    {
        label: 'Income',
        data: financeData.original.map(data => data.income),
        borderColor: 'rgb(54, 162, 235)',
        fill: true,
        backgroundColor: 'rgba(54, 162, 235, 0.2)'
    },
    {
        label: 'Gross Margin',
        data: financeData.original.map(data => data.gross_margin),
        borderColor: 'rgb(255, 205, 86)',
        fill: true,
        backgroundColor: 'rgba(255, 205, 86, 0.2)'
    },
    {
        label: 'Labor Cost',
        data: financeData.original.map(data => data.labor_cost),
        borderColor: 'rgb(75, 192, 192)',
        fill: true,
        backgroundColor: 'rgba(75, 192, 192, 0.2)'
    },
    {
        label: 'Fertilizer Cost',
        data: financeData.original.map(data => data.fertilizer_cost),
        borderColor: 'rgb(153, 102, 255)',
        fill: true,
        backgroundColor: 'rgba(153, 102, 255, 0.2)'
    },
    {
        label: 'Pesticide Cost',
        data: financeData.original.map(data => data.pesticide_cost),
        borderColor: 'rgb(255, 159, 64)',
        fill: true,
        backgroundColor: 'rgba(255, 159, 64, 0.2)'
    },
    {
        label: 'Irrigation Cost',
        data: financeData.original.map(data => data.irrigation_cost),
        borderColor: 'rgb(0, 204, 204)',
        fill: true,
        backgroundColor: 'rgba(0, 204, 204, 0.2)'
    },
    {
        label: 'Net Profit',
        data: financeData.original.map(data => data.net_profit),
        borderColor: 'rgb(220, 53, 69)',
        fill: true,
        backgroundColor: 'rgba(220, 53, 69, 0.2)'
    }];

    // Create an area chart for finance data
    let ctx = document.getElementById('finance-chart').getContext('2d');
    let chart = new Chart(ctx, {
        type: 'line', // Use 'line' type for area chart
        data: {
            labels: labels,
            datasets: datasets
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
    let labelsPie = financeData.original.map(data => data.name);
    let datasetsPie = [{
        data: financeData.original.map(data => data.production_cost),
        backgroundColor: 'rgb(255, 99, 132)'
    },
    {
        data: financeData.original.map(data => data.income),
        backgroundColor: 'rgb(54, 162, 235)'
    },
    {
        data: financeData.original.map(data => data.gross_margin),
        backgroundColor: 'rgb(255, 205, 86)'
    },
    {
        data: financeData.original.map(data => data.labor_cost),
        backgroundColor: 'rgb(75, 192, 192)'
    },
    {
        data: financeData.original.map(data => data.fertilizer_cost),
        backgroundColor: 'rgb(153, 102, 255)'
    },
    {
        data: financeData.original.map(data => data.pesticide_cost),
        backgroundColor: 'rgb(255, 159, 64)'
    },
    {
        data: financeData.original.map(data => data.irrigation_cost),
        backgroundColor: 'rgb(0, 204, 204)'
    },
    {
        data: financeData.original.map(data => data.net_profit),
        backgroundColor: 'rgb(220, 53, 69)'
    }];

    // Create a pie chart for finance data
    let ctxPie = document.getElementById('finance-chart-pie').getContext('2d');
    let chartPie = new Chart(ctxPie, {
        type: 'pie',
        data: {
            labels: labelsPie,
            datasets: [{
                data: datasetsPie[0].data,
                backgroundColor: datasetsPie.map(d => d.backgroundColor),
            }]
        },
        options: {
            responsive: true
        }
    });

    // Extract data for the bar chart
    let labelsBar = financeData.original.map(data => data.name);
    let datasetsBar = [{
        label: 'Production Cost',
        data: financeData.original.map(data => data.production_cost),
        backgroundColor: 'rgb(255, 99, 132)',
        borderColor: 'rgb(255, 99, 132)',
        borderWidth: 1
    },
    {
        label: 'Income',
        data: financeData.original.map(data => data.income),
        backgroundColor: 'rgb(54, 162, 235)',
        borderColor: 'rgb(54, 162, 235)',
        borderWidth: 1
    },
    {
        label: 'Gross Margin',
        data: financeData.original.map(data => data.gross_margin),
        backgroundColor: 'rgb(255, 205, 86)',
        borderColor: 'rgb(255, 205, 86)',
        borderWidth: 1
    },
    {
        label: 'Labor Cost',
        data: financeData.original.map(data => data.labor_cost),
        backgroundColor: 'rgb(75, 192, 192)',
        borderColor: 'rgb(75, 192, 192)',
        borderWidth: 1
    },
    {
        label: 'Fertilizer Cost',
        data: financeData.original.map(data => data.fertilizer_cost),
        backgroundColor: 'rgb(153, 102, 255)',
        borderColor: 'rgb(153, 102, 255)',
        borderWidth: 1
    },
    {
        label: 'Pesticide Cost',
        data: financeData.original.map(data => data.pesticide_cost),
        backgroundColor: 'rgb(255, 159, 64)',
        borderColor: 'rgb(255, 159, 64)',
        borderWidth: 1
    },
    {
        label: 'Irrigation Cost',
        data: financeData.original.map(data => data.irrigation_cost),
        backgroundColor: 'rgb(0, 204, 204)',
        borderColor: 'rgb(0, 204, 204)',
        borderWidth: 1
    },
    {
        label: 'Net Profit',
        data: financeData.original.map(data => data.net_profit),
        backgroundColor: 'rgb(220, 53, 69)',
        borderColor: 'rgb(220, 53, 69)',
        borderWidth: 1
    }];

    // Create a bar chart for finance data
    let ctxBar = document.getElementById('finance-chart-bar').getContext('2d');
    let chartBar = new Chart(ctxBar, {
        type: 'bar',
        data: {
            labels: labelsBar,
            datasets: datasetsBar
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
</script>
