<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKemajuansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kemajuans', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('file');
            $table->string('progres',20);
            $table->integer('periode');
            $table->foreignId('category_id')->references('id')->on('categories');
            $table->foreignId('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('kemajuans');
    }
}
