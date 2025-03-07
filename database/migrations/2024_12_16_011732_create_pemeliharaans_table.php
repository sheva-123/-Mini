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
        Schema::create('pemeliharaans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pertanian_id')->constrained()->onDelete('cascade');
            $table->foreignId('penanaman_id')->constrained('penanamans')->onDelete('cascade');
            $table->date('tanggal_pemeliharaan');
            $table->string('jenis_pemeliharaan');
            $table->integer('biaya');
            $table->enum('kondisi_tanaman', ['Baik', 'Cukup', 'Buruk']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemeliharaans');
    }
};
