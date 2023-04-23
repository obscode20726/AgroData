<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class chartController extends Controller
{
    public function financeChartData()
    {
        $financeData = DB::table('finance')
            ->join('seasons', 'finance.season_id', '=', 'seasons.id')
            ->select('seasons.name', 'finance.production_cost', 'finance.income', 'finance.gross_margin', 'finance.labor_cost', 'finance.fertilizer_cost', 'finance.pesticide_cost', 'finance.irrigation_cost', 'finance.net_profit')
            ->get();

        $financeJson =response()->json($financeData);

        return view('finance.admin', compact('financeJson'));
    }
}
