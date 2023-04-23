@include('components.dashcss')
@include('farmer.components.aside')
<main class="main-content">
    <div class="position-relative ">
        <!--Nav Start-->
        @include('components.dasheader')
        <!--Nav End-->
    </div>
    <div class="content-inner container-fluid pb-0" id="page_layout">
        <div class="d-flex justify-content-between align-items-center flex-wrap mb-5 mt-5 gap-3">
            <div class="d-flex flex-column">
                <h3>Hello , {{ Auth::user()->name }}</h3>
                <p class="mb-0">Analytics Dashboard</p>
            </div>

        </div>
        <div class="row">

            <div class="col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-itmes-center">

                            <div>
                                <h3>{{ $totalArea }}</h3>
                                <p class="mb-0">Crop Area</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-itmes-center">

                            <div>
                                <h3>{{ $totalFertilizer }}</h3>
                                <p class="mb-0">Fertilizer</p>
                            </div>
                            <div>
                                <div class="badge bg-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20px" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M5.293 9.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 7.414V15a1 1 0 11-2 0V7.414L6.707 9.707a1 1 0 01-1.414 0z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    <span>In Kgs</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-itmes-center">

                            <div>
                                <h3>{{ $totalYield }}</h3>
                                <p class="mb-0">Harvest</p>
                            </div>
                            <div>
                                <div class="badge bg-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20px" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M5.293 9.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 7.414V15a1 1 0 11-2 0V7.414L6.707 9.707a1 1 0 01-1.414 0z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    <span>In Kgs</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-itmes-center">

                            <div>
                                <h3>{{ $totalWaterAmount }}</h3>
                                <p class="mb-0">Used Water</p>
                            </div>
                            <div>
                                <div class="badge bg-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20px" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M5.293 9.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 7.414V15a1 1 0 11-2 0V7.414L6.707 9.707a1 1 0 01-1.414 0z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    <span>In Ltrs</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-itmes-center">

                            <div>
                                <h3>{{ $totalWaterCost }}</h3>
                                <p class="mb-0">Total Water Cost</p>
                            </div>
                            <div>
                                <div class="badge bg-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20px" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M5.293 9.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 7.414V15a1 1 0 11-2 0V7.414L6.707 9.707a1 1 0 01-1.414 0z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    <span>In Rwf</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-itmes-center">

                            <div>
                                <h3>{{ $totalEnergyAmount }}</h3>
                                <p class="mb-0">Total Eletricity</p>
                            </div>
                            <div>
                                <div class="badge bg-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20px" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M5.293 9.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 7.414V15a1 1 0 11-2 0V7.414L6.707 9.707a1 1 0 01-1.414 0z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    <span>In Kwh</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-itmes-center">

                            <div>
                                <h3>{{ $totalEnergyCost }}</h3>
                                <p class="mb-0">Total Eletricity Cost</p>
                            </div>
                            <div>
                                <div class="badge bg-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20px" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M5.293 9.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 7.414V15a1 1 0 11-2 0V7.414L6.707 9.707a1 1 0 01-1.414 0z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    <span>In Rwf</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-itmes-center">

                            <div>
                                <h3>{{ $totalProductionCost }}</h3>
                                <p class="mb-0">Production Cost</p>
                            </div>
                            <div>
                                <div class="badge bg-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20px" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M5.293 9.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 7.414V15a1 1 0 11-2 0V7.414L6.707 9.707a1 1 0 01-1.414 0z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    <span>In Rwf</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-itmes-center">

                            <div>
                                <h3>{{ $totalIncome }}</h3>
                                <p class="mb-0">Total Income</p>
                            </div>
                            <div>
                                <div class="badge bg-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20px" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M5.293 9.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 7.414V15a1 1 0 11-2 0V7.414L6.707 9.707a1 1 0 01-1.414 0z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    <span>In Rwf</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-itmes-center">

                            <div>
                                <h3>{{ $totalGrossMargin }}</h3>
                                <p class="mb-0">Gross Margin</p>
                            </div>
                            <div>
                                <div class="badge bg-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20px" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M5.293 9.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 7.414V15a1 1 0 11-2 0V7.414L6.707 9.707a1 1 0 01-1.414 0z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    <span>In Rwf</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-itmes-center">

                            <div>
                                <h3>{{ $totalLaborCost }}</h3>
                                <p class="mb-0">Labor Cost</p>
                            </div>
                            <div>
                                <div class="badge bg-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20px" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M5.293 9.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 7.414V15a1 1 0 11-2 0V7.414L6.707 9.707a1 1 0 01-1.414 0z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    <span>In Rwf</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-itmes-center">

                            <div>
                                <h3>{{ $totalFertilizerCost }}</h3>
                                <p class="mb-0">Fertilizer cost</p>
                            </div>
                            <div>
                                <div class="badge bg-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20px" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M5.293 9.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 7.414V15a1 1 0 11-2 0V7.414L6.707 9.707a1 1 0 01-1.414 0z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    <span>In Rwf</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-itmes-center">

                            <div>
                                <h3>{{ $totalPesticideCost }}</h3>
                                <p class="mb-0">Pesticide cost</p>
                            </div>
                            <div>
                                <div class="badge bg-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20px" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M5.293 9.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 7.414V15a1 1 0 11-2 0V7.414L6.707 9.707a1 1 0 01-1.414 0z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    <span>In Rwf</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-itmes-center">

                            <div>
                                <h3>{{ $totalIrrigationCost }}</h3>
                                <p class="mb-0">Irrigation cost</p>
                            </div>
                            <div>
                                <div class="badge bg-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20px" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M5.293 9.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 7.414V15a1 1 0 11-2 0V7.414L6.707 9.707a1 1 0 01-1.414 0z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    <span>In Rwf</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-itmes-center">

                            <div>
                                <h3>{{ $totalNetProfit }}</h3>
                                <p class="mb-0">Net Profit</p>
                            </div>
                            <div>
                                <div class="badge bg-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20px" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M5.293 9.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 7.414V15a1 1 0 11-2 0V7.414L6.707 9.707a1 1 0 01-1.414 0z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    <span>In Rwf</span>
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
