<?php

namespace App\Http\Controllers;

use App\Models\Finance;
use App\Models\Season;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FinanceController extends Controller
{
    public function index()
    {
        $finances = Finance::with('season')->where('farmer_id', auth()->user()->id)->get();
        $seasons = Season::all();
        return view('finance.index', compact('finances', 'seasons'));
    }

    public function financeAdmin()
    {
        $finances = Finance::with('season')->get();
        $seasons = Season::all();
        $financeData = DB::table('finance')
            ->join('seasons', 'finance.season_id', '=', 'seasons.id')
            ->select('seasons.name', 'finance.production_cost', 'finance.income', 'finance.gross_margin', 'finance.labor_cost', 'finance.fertilizer_cost', 'finance.pesticide_cost', 'finance.irrigation_cost', 'finance.net_profit')
            ->get();

        $financeJson = response()->json($financeData);
        return view('finance.admin', compact('finances', 'seasons','financeJson'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'season_id' => 'required|exists:seasons,id',
            'production_cost' => 'required|numeric|min:0',
            'income' => 'required|numeric|min:0',
            'labor_cost' => 'required|numeric|min:0',
            'fertilizer_cost' => 'required|numeric|min:0',
            'pesticide_cost' => 'required|numeric|min:0',
            'irrigation_cost' => 'required|numeric|min:0',
        ]);

        $finance = new Finance();
        $finance->farmer_id = $request->farmer_id;
        $finance->season_id = $request->season_id;
        $finance->production_cost = $request->production_cost;
        $finance->income = $request->income;
        $finance->gross_margin = $request->income - $request->production_cost;
        $finance->labor_cost = $request->labor_cost;
        $finance->fertilizer_cost = $request->fertilizer_cost;
        $finance->pesticide_cost = $request->pesticide_cost;
        $finance->irrigation_cost = $request->irrigation_cost;
        $finance->net_profit = $request->income - $request->production_cost - $request->labor_cost - $request->fertilizer_cost - $request->pesticide_cost - $request->irrigation_cost;
        $finance->save();

        return redirect()->back()->with('success', 'Finance record added successfully!');
    }
}
