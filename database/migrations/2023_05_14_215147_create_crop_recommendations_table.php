<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCropRecommendationsTable extends Migration
{
    public function up()
    {
        Schema::create('crop_recommendations', function (Blueprint $table) {
            $table->id();
            $table->string('region');
            $table->string('crop');
            // Add other relevant fields
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('crop_recommendations');
    }
}
