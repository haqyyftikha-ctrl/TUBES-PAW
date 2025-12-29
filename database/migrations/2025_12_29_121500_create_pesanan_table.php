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
        Schema::create('pesanan', function (Blueprint $table) {
            $table->increments('id_pesanan');
        
        $table->integer('id_pelanggan')->unsigned();
        $table->integer('id_metode')->unsigned()->nullable();

        $table->dateTime('tanggal_bayar')->nullable();
        $table->string('bukti_pembayaran', 255)->nullable();
        $table->enum('statuspembayaran', ['Menunggu', 'Valid', 'Tidak Valid'])->default('Menunggu');
        $table->dateTime('tanggal_pesanan')->nullable();
        $table->decimal('total_bayar', 10, 2)->nullable();
        $table->enum('status', ['Menunggu Pembayaran', 'Diproses', 'Dikirim', 'Selesai', 'Dibatalkan'])
              ->default('Menunggu Pembayaran');
        $table->text('alamat_pengiriman')->nullable();

        // FOREIGN KEY
        $table->foreign('id_pelanggan')->references('id_user')->on('user')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanan');
    }
};
