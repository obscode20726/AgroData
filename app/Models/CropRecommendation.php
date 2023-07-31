<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CropRecommendation extends Model
{
    use HasFactory;

    protected $fillable = ['region', 'crop'];

    // Add any other relevant fields and relationships
}
