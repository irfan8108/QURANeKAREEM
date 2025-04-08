<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('ayahs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('surah_id')->constrained()->onDelete('cascade');
            $table->integer('number');
            $table->text('text');
            $table->integer('number_in_surah');
            $table->integer('juz');
            $table->integer('manzil');
            $table->integer('page');
            $table->integer('ruku');
            $table->integer('hizb_quarter');
            $table->boolean('sajda');
            $table->string('audio');
            $table->json('audio_secondary');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ayahs');
    }
};
