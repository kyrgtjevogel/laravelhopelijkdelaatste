<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('huis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('naam');
            $table->string('beschrijving');
            $table->decimal('oppervlakte_m2', 8, 2);
            $table->decimal('huur_per_week', 8, 2);
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('huis');
    }
};
