<?php

namespace App\Http\Controllers;

use App\Models\Crop;
use App\Models\Season;
use App\Models\Water;
use Illuminate\Http\Request;

class WaterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $waters = Water::where('farmer_id', auth()->user()->id)->get();
        $seasons = Season::all();
        $crops = Crop::where('farmer_id', auth()->user()->id)->get();
        return view('water.index', compact('waters', 'seasons', 'crops'));
    }
    public function waterAdmin()
    {
        $waters = Water::all();
        $crops = Crop::all();
        $waterData = Water::with(['crop', 'season'])->get();
        $waterJson =response()->json([
            'data' => $waterData,
        ]);
        return view('water.admin', compact('waters', 'crops','waterJson'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'amount' => 'required|numeric',
            'irrigation_type' => 'required|string',
            'irrigation_frequency' => 'required|integer',
            'cost' => 'required|numeric',
            'season_id' => 'required|exists:seasons,id',
            'crop_id' => 'required|exists:crops,id',
        ]);
        $water = new Water();
        $water->amount = $validated['amount'];
        $water->irrigation_type = $validated['irrigation_type'];
        $water->irrigation_frequency = $validated['irrigation_frequency'];
        $water->cost = $validated['cost'];
        $water->farmer_id = $request->farmer_id;
        $water->season_id = $validated['season_id'];
        $water->crop_id = $validated['crop_id'];
        $water->save();
        return redirect()->back()->with('success', 'Water added successfully');
    }
}
