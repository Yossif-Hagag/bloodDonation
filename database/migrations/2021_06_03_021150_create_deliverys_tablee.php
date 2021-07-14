<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliverysTablee extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deliverys_tablee', function (Blueprint $table) {
            $table->id();
            $table->string('day');
            $table->string('from');
            $table->string('to');
            $table->unsignedBigInteger('hospital_id')->nullable();
            $table->foreign('hospital_id')->references('id')->on('hospitals_create')->onDelete('set null');
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
        Schema::dropIfExists('deliverys_tablee');
    }
}
