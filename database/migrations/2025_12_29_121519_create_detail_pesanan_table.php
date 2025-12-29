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
        Schema::create('detail_pesanan', function (Blueprint $table) {
            $table->increments('id_detail');

        $table->integer('id_pesanan')->unsigned();
        $table->integer('id_produk')->unsigned();

        $table->integer('jumlah');
        $table->decimal('harga_satuan', 10, 2);
        $table->decimal('subtotal', 10, 2);

        // FOREIGN KEY
        $table->foreign('id_pesanan')->references('id_pesanan')->on('pesanan')->onDelete('cascade');
        $table->foreign('id_produk')->references('id_produk')->on('produk')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_pesanan');
    }
};
