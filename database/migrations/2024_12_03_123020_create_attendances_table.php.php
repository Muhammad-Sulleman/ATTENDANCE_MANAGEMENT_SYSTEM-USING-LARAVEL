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
        Schema::create('attendance', function (Blueprint $table) {
            $table->unsignedBigInteger('classid');
            $table->unsignedBigInteger('studentid');
            $table->boolean('isPresent');
            $table->string('comments', 200);
            $table->foreign('classid')->references('id')->on('classes')->onDelete('cascade');
            $table->foreign('studentid')->references('id')->on('user')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attendance');
    }
};
