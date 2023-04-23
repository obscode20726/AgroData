<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crop extends Model
{
    use HasFactory;
    protected $fillable = [
        'crop_type',
        'farmer_id',
        'season_id',
        'area',
        'planting_date',
        'seed_type',
        'fertilizer_amount',
        'pesticide_type',
        'yield'
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
