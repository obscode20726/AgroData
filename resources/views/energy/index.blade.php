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
                            <h4 class="card-title">Energy Usage Report</h4>

                        </div>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#addEnergyModal">
                            Declare Energy Usage
                        </button>

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

                            <!-- Modal for adding energy -->
                            <div class="modal fade" id="addEnergyModal" tabindex="-1"
                                aria-labelledby="addEnergyModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="addEnergyModalLabel">Declare energy usage</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form method="POST" action="{{ route('energy.store') }}">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="season_id" class="form-label">Season</label>
                                                    <select class="form-select" id="season_id" name="season_id">
                                                        @foreach ($seasons as $season)
                                                            <option value="{{ $season->id }}">{{ $season->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="crop_id" class="form-label">Crop</label>
                                                    <select class="form-select" id="crop_id" name="crop_id">
                                                        @foreach ($crops as $crop)
                                                            <option value="{{ $crop->id }}">{{ $crop->crop_type }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="energy_type" class="form-label">Energy Type</label>
                                                    <input type="text" class="form-control" id="energy_type"
                                                        name="energy_type">
                                                </div>

                                                <div class="mb-3 d-none">
                                                    <label for="farmer_id" class="form-label">Farmer ID</label>
                                                    <input type="text" class="form-control" id="farmer_id"
                                                        name="farmer_id"
                                                        value="{{ auth()->guard('farmer')->user()->id }}">
                                                </div>

                                                <div class="mb-3">
                                                    <label for="cost" class="form-label">Energy Amout In
                                                        watts</label>
                                                    <input type="number" class="form-control" id="amount"
                                                        name="amount">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="cost" class="form-label">Total Cost</label>
                                                    <input type="number" class="form-control" id="cost"
                                                        name="cost">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger"
                                                    data-bs-dismiss="modal">Cancel</button>
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
    @include('components.dashfooter')
</main>
@include('components.dashjs')
