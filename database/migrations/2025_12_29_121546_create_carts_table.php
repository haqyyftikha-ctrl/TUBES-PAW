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
        Schema::create('carts', function (Blueprint $table) {
            $table->id();

            // relasi user
            $table->unsignedBigInteger('user_id');

            // relasi produk (sesuai tabel produk kamu)
            $table->unsignedInteger('id_produk');

            // jumlah produk
            $table->integer('qty');

            // harga satuan saat dimasukkan ke cart
            $table->decimal('price', 10, 2);

            $table->timestamps();

            // foreign key
            $table->foreign('user_id')
                  ->references('id')->on('users')
                  ->onDelete('cascade');

            $table->foreign('id_produk')
                  ->references('id_produk')->on('produk')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
