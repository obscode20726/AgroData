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
                            <h4 class="card-title">Crops List</h4>

                        </div>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCropModal">
                           Declare Crop Usage
                          </button>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('components.dashfooter')
</main>
@include('components.dashjs')
