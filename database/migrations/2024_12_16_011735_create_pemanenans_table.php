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
        $table->foreignId('id_penanaman')->constrained('penanamans')->onDelete('restrict');
        $table->date('tanggal_pemanenan');
        $table->integer('jumlah_hasil');
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
