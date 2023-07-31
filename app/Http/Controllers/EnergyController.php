<?php

namespace App\Http\Controllers;

use App\Models\Crop;
use App\Models\Energy;
use App\Models\Season;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;

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

    // Group the energy data by seasons.name and crops.crop_type
    $groupedEnergies = $energies->groupBy(function ($energy) {
        return $energy->season->name . ' - ' . $energy->crop->crop_type;
    });

    // Calculate total cost and total amount for each group
    $energyChartData = $groupedEnergies->map(function ($group) {
        $totalCost = $group->sum('cost');
        $totalAmount = $group->sum('amount');
        return [
            'total_cost' => $totalCost,
            'total_amount' => $totalAmount,
        ];
    });

    return view('energy.admin', compact('energies', 'energyChartData'));
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
    public function generateEnergyPDF()
    {
        $energies = Energy::with(['crop', 'season'])->get();

        // Load the view and pass the energy data to it
        $pdf = PDF::loadView('energy.pdfreport', compact('energies'));

        // Return the PDF for download or display in the browser
        return $pdf->stream('energy_report.pdf');
    }
    public function generateFarmerEnergyPDF()
    {
        $farmerId = Auth::user()->id;
        $energies = Energy::where('farmer_id', $farmerId)->get();

        // Load the view and pass the finance data to it
        $pdf = PDF::loadView('Energy.pdffarmerreport', compact('energies'));

        // Return the PDF for download or display in the browser
        return $pdf->stream('Energy_report.pdf');
    }
}
