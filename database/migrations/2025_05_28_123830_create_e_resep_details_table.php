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
        Schema::create('e_resep_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_resep')->constrained('e_reseps')->cascadeOnDelete();
            $table->char('id_obat', 5);
            $table->foreign('id_obat')->references('id')->on('obats')->cascadeOnDelete();
            $table->integer('jumlah');
            $table->string('aturan_pakai');
            $table->decimal('total_harga', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('e_resep_details');
    }
};
