<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Water extends Model
{
    use HasFactory;

    protected $table = 'water';

    protected $fillable = [
        'farmer_id',
        'season_id',
        'crop_id',
        'amount',
        'irrigation_type',
        'irrigation_frequency',
        'cost',
    ];

    public function farmer()
    {
        return $this->belongsTo(Farmer::class);
    }

    public function season()
    {
        return $this->belongsTo(Season::class);
    }

    public function crop()
    {
        return $this->belongsTo(Crop::class);
    }
}
