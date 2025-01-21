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
    Schema::create('pengeluarans', function (Blueprint $table) {
        $table->id();
        $table->foreignId('pertanian_id')->constrained('pertanians')->onDelete('cascade');
        $table->date('tanggal_pengeluaran');
        $table->string('jenis_pengeluaran');
        $table->string('biaya');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengeluarans');
    }
};
