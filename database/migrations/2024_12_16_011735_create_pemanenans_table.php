<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('pemanenans', function (Blueprint $table) {
        $table->id();
        $table->foreignId('pertanian_id')->constrained('pertanians')->onDelete('cascade');
        $table->foreignId('tanaman_id')->constrained('tanamans')->onDelete('cascade');
        $table->date('tanggal_pemanenan');
        $table->string('jumlah_hasil');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemanenans');
    }
};
