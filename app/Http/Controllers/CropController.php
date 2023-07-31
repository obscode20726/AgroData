<?php

namespace App\Http\Controllers;

use App\Models\Crop;
use App\Models\Season;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use PDF;

class CropController extends Controller
{
    public function index()
    {
        $crops = Crop::with('farmer', 'season')->where('farmer_id', auth()->user()->id)->get();
        $seasons = Season::all();
        return view('crops.index', compact('crops', 'seasons'));
    }

    public function cropAdmin()
    {
        $crops = Crop::with('farmer', 'season')->get();
    $seasons = Season::all();

    // Group the crop data by seasons.name and crops.crop_type
    $groupedCrops = $crops->groupBy(function ($crop) {
        return $crop->season->name . ' - ' . $crop->crop_type;
    });

    // Calculate total yield for each group
    $cropChartData = $groupedCrops->map(function ($group) {
        $totalYield = $group->sum('yield');
        return [
            'total_yield' => $totalYield,
        ];
    });

    // Process data for the chart
    $chartData = $cropChartData->map(function ($data) {
        return $data['total_yield'];
    })->all();

    $labels = $cropChartData->keys()->all();

    // Continue with other parts of the function as before
    $cropJson = response()->json([
        'data' => $crops,
    ]);

    $cropPieData = DB::table('crops')
        ->join('seasons', 'crops.season_id', '=', 'seasons.id')
        ->select('seasons.name as season', 'crops.yield')
        ->get()
        ->groupBy('season')
        ->map(function ($groupedData) {
            return $groupedData->sum('yield');
        });

    return view('crops.admin', compact('crops', 'seasons', 'chartData', 'labels', 'cropPieData', 'cropChartData'));
    }

    public function store(Request $request)
    {
        // convert date to valid format
        $crop = new Crop();
        $crop->crop_type = $request->crop_type;
        $crop->farmer_id = auth()->id();
        $crop->season_id = $request->season_id;
        $crop->area = $request->area;
        $crop->planting_date = Carbon::parse($request->planting_date);
        $crop->seed_type = $request->seed_type;
        $crop->fertilizer_amount = $request->fertilizer_amount;
        $crop->pesticide_type = $request->pesticide_type;
        $crop->yield = $request->yield;
        $crop->save();
        return redirect()->back()->with('success', 'Crop added successfully!');
    }
    public function generateCropsPDF()
    {
        $crops = Crop::all();

        $pdf = PDF::loadView('crops.pdfcropreport', compact('crops'));
        return $pdf->download('crops_report.pdf');
    }
    public function generateFarmerCropPDF()
{
    $farmerId = Auth::user()->id;
    $crops = Crop::where('farmer_id', $farmerId)->get();
    $seasons = Season::all(); // Add this line to fetch seasons data

    // Load the view and pass the crop data and seasons to it
    $pdf = PDF::loadView('crops.pdffarmerreport', compact('crops', 'seasons'));

    // Return the PDF for download or display in the browser
    return $pdf->stream('crops_farmer_report.pdf');
}
}
