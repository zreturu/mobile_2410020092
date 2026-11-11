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
            $table->id('id_produk');
            $table->string('nama_produk');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->text('deskripsi')->nullable();
            $table->integer('harga');
            $table->unsignedBigInteger('kategori_id');
            $table->tinyInteger('status_produk')->default(1);
            $table->timestamps();

            $table->foreign('kategori_id')
                ->references('kategori_id')->on('kategori')
                ->onDelete('cascade');
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
