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
                            <h4 class="card-title">Irrigation Report</h4>

                        </div>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addWaterModal">
                            Register water usage
                          </button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive border rounded">
                            <table id="datatable" class="table " data-toggle="data-table">
                                <thead>
                                    <tr>
                                        <th>Id</th>
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
                                            <td>{{ $water->season->name }}</td>
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

                            <!-- Modal -->
                            <!-- Modal -->
                            <div class="modal fade" id="addWaterModal" tabindex="-1"
                                aria-labelledby="addWaterModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="addWaterModalLabel">Register Water Usage</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('water.store') }}" method="POST">
                                                @csrf
                                                <div class="mb-3">
                                                    <label for="season" class="form-label">Season</label>
                                                    <select name="season_id" id="season" class="form-select"
                                                        required>
                                                        <option value="">Select Season</option>
                                                        @foreach ($seasons as $season)
                                                            <option value="{{ $season->id }}">{{ $season->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="mb-3 d-none">
                                                    <label for="farmer_id" class="form-label">Farmer ID</label>
                                                    <input type="text" class="form-control" id="farmer_id"
                                                        name="farmer_id" value="{{ auth()->guard('farmer')->user()->id }}" >
                                                </div>
                                                <div class="mb-3">
                                                    <label for="crop" class="form-label">Crop</label>
                                                    <select name="crop_id" id="crop" class="form-select" required>
                                                        <option value="">Select Crop</option>
                                                        @foreach ($crops as $crop)
                                                            <option value="{{ $crop->id }}">{{ $crop->crop_type }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="amount" class="form-label">Amount</label>
                                                    <input type="number" name="amount" id="amount"
                                                        class="form-control" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="irrigation_type" class="form-label">Irrigation
                                                        Type</label>
                                                    <input type="text" name="irrigation_type" id="irrigation_type"
                                                        class="form-control" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="irrigation_frequency" class="form-label">Irrigation
                                                        Frequency</label>
                                                    <input type="text" name="irrigation_frequency"
                                                        id="irrigation_frequency" class="form-control" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="cost" class="form-label">Cost</label>
                                                    <input type="number" name="cost" id="cost"
                                                        class="form-control" required>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Save Data</button>
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
