<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Finance extends Model
{
    use HasFactory;

    protected $table = 'finance';

    protected $fillable = [
        'farmer_id',
        'season_id',
        'production_cost',
        'income',
        'gross_margin',
        'labor_cost',
        'fertilizer_cost',
        'pesticide_cost',
        'irrigation_cost',
        'net_profit'
    ];

    public function farmer()
    {
        return $this->belongsTo(Farmer::class);
    }

    public function season()
    {
        return $this->belongsTo(Season::class);
    }
}
