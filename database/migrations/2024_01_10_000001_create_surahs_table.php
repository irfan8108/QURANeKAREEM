<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('surahs', function (Blueprint $table) {
            $table->id();
            $table->integer('number')->unique();
            $table->string('name');
            $table->string('english_name');
            $table->string('english_name_translation');
            $table->string('revelation_type');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('surahs');
    }
};
