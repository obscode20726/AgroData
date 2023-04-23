<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('finance', function (Blueprint $table) {
            $table->id();
            $table->foreignId('farmer_id')->constrained('farmers')->onDelete('cascade');
            $table->foreignId('season_id')->constrained('seasons')->onDelete('cascade');
            $table->decimal('production_cost', 10, 2);
            $table->decimal('income', 10, 2);
            $table->decimal('gross_margin', 10, 2);
            $table->decimal('labor_cost', 10, 2);
            $table->decimal('fertilizer_cost', 10, 2);
            $table->decimal('pesticide_cost', 10, 2);
            $table->decimal('irrigation_cost', 10, 2);
            $table->decimal('net_profit', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('finance');
    }
}
