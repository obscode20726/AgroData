<?php

namespace App\Http\Controllers;

use App\Models\Crop;
use App\Models\Energy;
use App\Models\Season;
use Illuminate\Http\Request;

class EnergyController extends Controller
{
    public function index()
    {
        $energies = Energy::with(['crop', 'season'])->where('farmer_id', auth()->user()->id)->get();
        $crops = Crop::where('farmer_id', auth()->user()->id)->get();
        $seasons = Season::all();

        return view('energy.index', compact('energies', 'crops', 'seasons'));
    }

    public function energyAdmin()
    {
        $energies = Energy::with(['crop', 'season'])->get();
        $energyChart =response()->json([
            'data' => $energies,
        ]);
        return view('energy.admin', compact('energies','energyChart'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'crop_id' => 'required',
            'season_id' => 'required',
            'energy_type' => 'required',
            'cost' => 'required|numeric',
            'amount' => 'required|numeric',
        ]);

        $energy = new Energy();
        $energy->crop_id = $request->crop_id;
        $energy->season_id = $request->season_id;
        $energy->energy_type = $request->energy_type;
        $energy->cost = $request->cost;
        $energy->farmer_id = $request->farmer_id;
        $energy->amount = $request->amount;
        $energy->save();

        return redirect()->back();
    }
}
