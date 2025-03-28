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
        Schema::create('pertanians', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pertanian');
            $table->string('lokasi_pertanian');
            $table->string('luas_lahan');
            $table->enum('kondisi', ['Kering', 'Basah', 'Lembab']);
            $table->foreignId('tanaman_id')->constrained('tanamans');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pertanians');
    }
};
