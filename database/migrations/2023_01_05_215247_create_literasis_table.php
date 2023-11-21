<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('literasis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kategori_literasi_id')->constrained('kategori_literasis');
            $table->string('judul');
            $table->text('abstrak');
            $table->string('keyword')->nullable();
            $table->date('published')->nullable();
            $table->string('nama_file');
            $table->boolean('status')->default(false);
            $table->string('slug');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('literasis');
    }
};
