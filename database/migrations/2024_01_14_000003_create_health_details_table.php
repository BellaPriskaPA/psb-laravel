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
        Schema::create('health_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('santri_id')->constrained('santri_details')->onDelete('cascade');
            $table->text('prestasi')->nullable();
            $table->string('alergi')->nullable();
            $table->string('penyakit_dalam')->nullable();
            $table->string('hobi')->nullable();
            $table->string('cita_cita')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('health_details');
    }
};
