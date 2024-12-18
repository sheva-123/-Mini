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
        Schema::create('penanamen', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pertanian_id')->constrained()->onDelete('cascade');
            $table->foreignId('tanaman_id')->constrained()->onDelete('cascade');
            $table->date('tanggal_tanam');
            $table->integer('jumlah_tanaman');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penanamen');
    }
};
