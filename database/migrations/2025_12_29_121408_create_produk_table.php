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
        Schema::create('produk', function (Blueprint $table) {

        $table->increments('id_produk');
        $table->string('nama_produk', 150);
        $table->text('deskripsi')->nullable();
        $table->decimal('harga', 10, 2);
        $table->integer('stok');
        $table->string('kategori', 50)->nullable();
        $table->string('gambar', 255)->nullable();
        $table->dateTime('tanggal_ditambahkan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produk');
    }
};
