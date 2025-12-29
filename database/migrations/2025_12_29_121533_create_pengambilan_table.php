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
        Schema::create('pengambilan', function (Blueprint $table) {
            $table->increments('id_pengambilan');

        $table->integer('id_pesanan')->unsigned();
        $table->date('tanggal_pengambilan')->nullable();
        $table->string('pj_pengambilan', 100);
        $table->string('bukti_pengambilan', 255)->nullable();

        // FOREIGN KEY
        $table->foreign('id_pesanan')->references('id_pesanan')->on('pesanan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengambilan');
    }
};
