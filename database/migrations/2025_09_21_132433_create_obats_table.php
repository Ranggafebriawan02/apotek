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
        $table->id();
        $table->string('nama');
        $table->string('kategori')->nullable();
        $table->integer('stok')->default(0);
        $table->decimal('harga', 15, 2)->default(0);
        $table->timestamps();
    });
}

};
