<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProposalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proposals', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->text('abstrak')->nullable();
            $table->string('file');
            $table->integer('periode');
            $table->foreignId('category_id')->references('id')->on('categories');
            $table->foreignId('status_id')->references('id')->on('statuses');
            $table->string('detail_revisi')->nullable();
            $table->foreignId('user_id')->references('id')->on('users');
            $table->integer('reviewer_id')->nullable();
            $table->integer('pengaju_id')->nullable();
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
        Schema::dropIfExists('proposals');
    }
}
