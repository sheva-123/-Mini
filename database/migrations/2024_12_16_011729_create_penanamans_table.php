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
        Schema::create('penanamans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pertanian_id')->constrained('pertanians')->onDelete('cascade');
            $table->foreignId('tanaman_id')->constrained('tanamans')->onDelete('cascade');
            $table->string('nama');
            $table->date('tanggal_tanam');
            $table->date('expired')->nullable();
            $table->integer('jumlah_tanaman');
            $table->enum('status', ['Proses', 'Selesai']);
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
