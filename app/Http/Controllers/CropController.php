<?php

namespace App\Http\Controllers;

use App\Models\Crop;
use App\Models\Season;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        $data = DB::table('crops')
            ->join('seasons', 'crops.season_id', '=', 'seasons.id')
            ->select('seasons.name', 'crops.seed_type', DB::raw('SUM(crops.yield) as total_yield'))
            ->groupBy('seasons.name', 'crops.seed_type')
            ->get();

        $chartData = [];
        $labels = [];

        foreach ($data as $row) {
            $labels[] = $row->name . ' - ' . $row->seed_type;
            $chartData[] = $row->total_yield;
        }

        $cropPieData = DB::table('crops')
        ->join('seasons', 'crops.season_id', '=', 'seasons.id')
        ->select('seasons.name as season', 'crops.yield')
        ->get()
        ->groupBy('season')
        ->map(function ($groupedData) {
            return $groupedData->sum('yield');
        });

        return view('crops.admin', compact('crops', 'seasons', 'chartData', 'labels','cropPieData'));
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
}
