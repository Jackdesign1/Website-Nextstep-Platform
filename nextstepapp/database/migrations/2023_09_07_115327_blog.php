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
        Schema::create('tb_blog', function (Blueprint $table) {
            $table->id_blog();
            $table->integer('id_user');
            $table->string('judul_berita')->nullable();
            $table->string('isi_berita')->nullable();
            $table->string('gambar_berita')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_blog');
    }
};
