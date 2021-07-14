<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('admin_id')->nullable();
            $table->foreign('admin_id')->references('id')->on('admins')->onDelete('set null');
            $table->unsignedBigInteger('hospital_id')->nullable();
            $table->unsignedBigInteger('blood_id')->nullable();
            
            $table->foreign('hospital_id')->references('id')->on('hospitals_create')->onDelete('set null');
            $table->foreign('blood_id')->references('id')->on('blood_types')->onDelete('set null'); 
            $table->string('body');
            $table->string('title');
            $table->boolean('disable');
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
        Schema::dropIfExists('posts');
    }
}
