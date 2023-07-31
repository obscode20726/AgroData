@include('components.dashcss')
@include('farmer.components.aside')
<main class="main-content">
    <div class="position-relative ">
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
                            <h4 class="card-title">Finance Data</h4>
                        </div>
                        <div>
                            <a href="{{ url('/generate-farmer-finance-report-pdf') }}" class="btn btn-primary">Download PDF</a>
                        </div>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#addFinanceModal">
                            Declare Finance
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive border rounded">
                            <table id="datatable" class="table " data-toggle="data-table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Season</th>
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

                            <!-- Add Finance Modal -->
                            <div class="modal fade" id="addFinanceModal" tabindex="-1"
                                aria-labelledby="addFinanceModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="addFinanceModalLabel">Declare Finance Record</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST" class="row" action="{{ route('finance.store') }}">
                                                @csrf
                                                <div class="mb-3 col-6">
                                                    <label for="season_id" class="form-label">Season</label>
                                                    <select class="form-select" name="season_id">
                                                        @foreach ($seasons as $season)
                                                            <option value="{{ $season->id }}">{{ $season->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="mb-3 col-6">
                                                    <label for="production_cost" class="form-label">Production Cost</label>
                                                    <input type="number" class="form-control" name="production_cost" id="production_cost" required>
                                                </div>
                                                <div class="mb-3 col-6">
                                                    <label for="income" class="form-label">Income</label>
                                                    <input type="number" class="form-control" name="income" id="income" required>
                                                </div>
                                                <div class="mb-3 col-6 d-none">
                                                    <label for="farmer_id" class="form-label">Farmer ID</label>
                                                    <input type="text" class="form-control" id="farmer_id" name="farmer_id" value="{{ auth()->guard('farmer')->user()->id }}">
                                                </div>
                                                <div class="mb-3 col-6">
                                                    <label for="gross_margin" class="form-label">Gross Margin</label>
                                                    <input type="number" class="form-control" name="gross_margin" id="gross_margin" readonly>
                                                </div>
                                                <div class="mb-3 col-6">
                                                    <label for="labor_cost" class="form-label">Labor Cost</label>
                                                    <input type="number" class="form-control" name="labor_cost" id="labor_cost" required>
                                                </div>
                                                <div class="mb-3 col-6">
                                                    <label for="fertilizer_cost" class="form-label">Fertilizer Cost</label>
                                                    <input type="number" class="form-control" name="fertilizer_cost" id="fertilizer_cost" required>
                                                </div>
                                                <div class="mb-3 col-6">
                                                    <label for="pesticide_cost" class="form-label">Pesticide Cost</label>
                                                    <input type="number" class="form-control" name="pesticide_cost" id="pesticide_cost" required>
                                                </div>
                                                <div class="mb-3 col-6">
                                                    <label for="irrigation_cost" class="form-label">Irrigation Cost</label>
                                                    <input type="number" class="form-control" name="irrigation_cost" id="irrigation_cost" required>
                                                </div>
                                                
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save Data</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('components.dashfooter')
</main>
@include('components.dashjs')
<!-- Add the JavaScript code for automatic calculation -->
<script>
    // Function to calculate Gross Margin and Net Profit
    function calculateFinance() {
        const production_cost = parseFloat(document.getElementById('production_cost').value);
        const income = parseFloat(document.getElementById('income').value);
        const labor_cost = parseFloat(document.getElementById('labor_cost').value);
        const fertilizer_cost = parseFloat(document.getElementById('fertilizer_cost').value);
        const pesticide_cost = parseFloat(document.getElementById('pesticide_cost').value);
        const irrigation_cost = parseFloat(document.getElementById('irrigation_cost').value);

        // Calculate Gross Margin and Net Profit
        const gross_margin = income - production_cost;
        const net_profit = income - production_cost - labor_cost - fertilizer_cost - pesticide_cost - irrigation_cost;

        // Update the fields with calculated values
        document.getElementById('gross_margin').value = gross_margin;
        document.getElementById('net_profit').value = net_profit;
    }

    // Attach the calculateFinance function to input change events
    document.getElementById('production_cost').addEventListener('input', calculateFinance);
    document.getElementById('income').addEventListener('input', calculateFinance);
    document.getElementById('labor_cost').addEventListener('input', calculateFinance);
    document.getElementById('fertilizer_cost').addEventListener('input', calculateFinance);
    document.getElementById('pesticide_cost').addEventListener('input', calculateFinance);
    document.getElementById('irrigation_cost').addEventListener('input', calculateFinance);

    // Calculate the values on page load
    calculateFinance();
</script>
