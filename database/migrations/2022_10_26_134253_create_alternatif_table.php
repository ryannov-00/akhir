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
        Schema::create('alternatif', function (Blueprint $table) {
            $table->id();

            $table->string('kode');
            $table->string('nama');
            $table->string('deskripsi');
            $table->integer('ranking')->nullable();
            $table->double('ri')->nullable();
            $table->double('si')->nullable();
            $table->double('qi')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.n
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alternatif');
    }
};
