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
        Schema::create('skripsis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mhs_id');
            $table->foreign('mhs_id')->references('id')->on('users');

            $table->string('judul');

            $table->unsignedBigInteger('pembimbing1_id');
            $table->foreign('pembimbing1_id')->references('id')->on('users');
            $table->unsignedBigInteger('pembimbing2_id');
            $table->foreign('pembimbing2_id')->references('id')->on('users');

            $table->string('status');
            $table->date('tgl_ujian')->nullable();
            $table->string('file_proposal')->nullable();
            $table->string('file_hasil')->nullable();
            $table->string('file_skripsi')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('skripsis');
    }
};
