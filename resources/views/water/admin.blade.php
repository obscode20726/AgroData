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
                            <h4 class="card-title">Water Usage Analysis</h4>

                        </div>
                    </div>
                    <div class="card-body">
                        <canvas id="water-crop-bar-chart"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Water Usage Analysis</h4>

                        </div>
                    </div>
                    <div class="card-body">
                        <canvas id="water-crop-pie-chart"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Irrigation Report</h4>

                        </div>
                        <div>
        <a href="{{ url('/generate-report-pdf') }}" class="btn btn-primary">Download PDF</a>
    </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive border rounded">
                            <table id="datatable" class="table " data-toggle="data-table">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Farmer Name</th>
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
                                            <td>{{ $water->id }}</td>
                                            <td>{{ $water->farmer->name }}</td>
                                            <td><span class="badge bg-success">{{ $water->season->name }}</span></td>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('components.dashfooter')
</main>
@include('components.dashjs')
<script>
    // Retrieve water data from backend
let waterData = @json($waterJson);
console.log(waterData);

// Group the data by 'crop.crop_type' and calculate the sum of 'amount' for each crop type
let cropTypeData = {};
waterData.original.data.forEach(data => {
    let cropType = data.crop.crop_type;
    if (!cropTypeData[cropType]) {
        cropTypeData[cropType] = {
            totalAmount: 0,
            totalCost: 0
        };
    }
    cropTypeData[cropType].totalAmount += parseFloat(data.amount);
    cropTypeData[cropType].totalCost += parseFloat(data.cost);
});

// Extract labels and datasets for the bar chart
let barLabels = Object.keys(cropTypeData);
let barDatasets = [{
    label: 'Amount',
    data: Object.values(cropTypeData).map(data => data.totalAmount),
    backgroundColor: 'rgba(255, 99, 132, 0.2)',
    borderColor: 'rgba(255, 99, 132, 1)',
    borderWidth: 1
},  {
    label: 'Cost',
    data: Object.values(cropTypeData).map(data => data.totalCost),
    backgroundColor: 'rgba(255, 206, 86, 0.2)',
    borderColor: 'rgba(255, 206, 86, 1)',
    borderWidth: 1
}];

// Create a bar chart
let barCtx = document.getElementById('water-crop-bar-chart').getContext('2d');
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

// Extract labels and datasets for the pie chart
let pieLabels = Object.keys(cropTypeData);
let pieData = pieLabels.map(label => {
    return {
        label: label,
        data: cropTypeData[label].totalAmount,
        backgroundColor: getRandomColor()
    };
});


    // Create a pie chart
    let pieCtx = document.getElementById('water-crop-pie-chart').getContext('2d');
    let pieChart = new Chart(pieCtx, {
        type: 'doughnut',
        data: {
            labels: pieLabels,
            datasets: [{
                data: pieData.map(data => data.data),
                backgroundColor: pieData.map(data => data.backgroundColor),
                borderWidth: 1
            }]
        },
        options: {
            responsive: true
        }
    });

    // Helper function to generate random colors for the pie chart
    function getRandomColor() {
        let letters = '0123456789ABCDEF';
        let color = '#';
        for (let i = 0; i < 6; i++) {
            color += letters[Math.floor(Math.random() * 16)];
        }
        return color;
    }
</script>
