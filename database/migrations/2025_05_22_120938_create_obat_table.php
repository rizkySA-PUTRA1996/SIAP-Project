<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        if (!Schema::hasTable('obat')) {
            Schema::create('obat', function (Blueprint $table) {
                $table->id();
                $table->string('kode_obat');
                $table->string('nama_obat');
                $table->string('bentuk_satuan');
                $table->integer('stok');
                $table->decimal('harga', 10, 2);
                $table->date('kadaluarsa');
                $table->unsignedBigInteger('id_kategori')->nullable();
                $table->timestamps();
            });
        }
    }


    public function down(): void
    {
        Schema::dropIfExists('obat');
    }
};
