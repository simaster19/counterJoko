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
        Schema::create('aksesoris', function (Blueprint $table) {
            $table->id();
            $table->unsignedbigInteger('id_user');
            $table->string('namaAksesoris', 50);
            $table->string('jenisAksesoris', 50);
            $table->integer('harga');
            $table->integer('quantity');
            $table->integer('terjual');
            $table->text('catatan');
            $table->timestamps();

            //Relasi
            $table->foreign('id_user')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aksesoris');
    }
};
