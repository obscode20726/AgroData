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
                          <div>
                         <a href="{{ url('/generate-farmer-crop-report-pdf') }}" class="btn btn-primary">Download PDF</a>
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
    <style>
    #recommendations-container ul {
        font-size: 20px;
    }

    /* Define animation keyframes */
    @keyframes fadeIn {
        0% {
            opacity: 0;
            transform: translateY(20px);
        }
        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Apply animation to list items */
    #recommendations-container ul li {
        animation: fadeIn 0.5s ease-in-out both;
    }
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Crop Recommendations</h4>
                </div>
                <div class="card-body">
                    <form id="recommendation-form" action="{{ route('recommendation') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="region" class="form-label">Enter your region:</label>
                            <input type="text" class="form-control" id="region" name="region" required>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Get Recommendation</button>
                        </div>
                    </form>
                    <div id="recommendations-container">
                        <h1>Crop Recommendations</h1>
                        @if ($recommendations ?? null)
                            @if ($recommendations->isEmpty())
                                <p>No recommendations found for the specified region.</p>
                            @else
                                <ul>
                                    @foreach ($recommendations as $recommendation)
                                        <li>{{ $recommendation->crop }}</li>
                                    @endforeach
                                </ul>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<script>
    // Listen for form submission
    document.querySelector('#recommendation-form').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent the form from submitting normally

        // Get the form data
        const formData = new FormData(this);

        // Send a POST request to the recommendation route
        fetch('{!! route('recommendation') !!}', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json()) // Parse the response as JSON
        .then(data => {
            // Check if recommendations exist
            if (data.recommendations.length > 0) {
                // Get the recommendations container element
                const recommendationsContainer = document.querySelector('#recommendations-container');

                // Clear any existing content in the container
                recommendationsContainer.innerHTML = '';

                // Create the heading element
                const heading = document.createElement('h1');
                heading.textContent = 'Crop Recommendations';

                // Create the unordered list element
                const ul = document.createElement('ul');

                // Loop through the recommendations and create list items
                data.recommendations.forEach(recommendation => {
                    const li = document.createElement('li');
                    li.textContent = recommendation.crop;
                    ul.appendChild(li);
                });

                // Append the heading and list to the container
                recommendationsContainer.appendChild(heading);
                recommendationsContainer.appendChild(ul);
            } else {
                // Display a message when no recommendations are found
                document.querySelector('#recommendations-container').innerHTML = '<p>No recommendations found for the specified region.</p>';
            }
        })
        .catch(error => {
            console.error('An error occurred:', error);
        });
    });
</script>



</div>
    @include('components.dashfooter')
</main>
@include('components.dashjs')

