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
        Schema::create('laporans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pertanian_id')->nullable()->constrained('pertanians')->onDelete('cascade');
            $table->foreignId('penanaman_id')->nullable()->constrained('penanamans')->onDelete('cascade');
            $table->foreignId('pemeliharaan_id')->nullable()->constrained('pemeliharaans')->onDelete('cascade');
            $table->foreignId('pemanenan_id')->nullable()->constrained('pemanenans')->onDelete('cascade');
            $table->foreignId('pengeluaran_id')->nullable()->constrained('pengeluarans')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporans');
    }
};
