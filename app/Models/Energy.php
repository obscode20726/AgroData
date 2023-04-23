<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Energy extends Model
{
    use HasFactory;
    protected $table = 'energy';

    protected $fillable = [
        'farmer_id',
        'season_id',
        'crop_id',
        'energy_type',
        'cost',
        'amount'
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
