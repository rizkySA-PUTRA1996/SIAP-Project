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
        Schema::create('obats', function (Blueprint $table) {
            $table->char('id', 5)->primary();
            $table->string('nama_obat');
            $table->foreignId('id_kategori')->constrained('kategori_obats')->cascadeOnDelete();
            $table->string('bentuk_satuan');
            $table->decimal('harga', 10, 2);
            $table->integer('stok');
            $table->date('kadaluarsa');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('obats');
    }
};
