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
            $table->string('title');
            $table->string('nim');
            $table->string('nip1');
            $table->string('nip2');
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
