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
        Schema::create('gyms', function (Blueprint $table) {
            $table->id();
            $table->string('nama_gym', 50);
            $table->foreignId('pelatih_id')->constrained('pelatihs');
            $table->text('poster');
            $table->text('deskripsi');
            $table->string('paket', 50);
            $table->text('alamat');
            $table->string('telp', 15);
            $table->char('harga', 45);
            $table->string('jam_operational', 15);
            $table->integer('point');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gyms');
    }
};