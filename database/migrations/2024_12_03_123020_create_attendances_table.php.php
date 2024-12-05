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
        Schema::create('attendances', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->unsignedBigInteger('classid'); // Foreign key to 'classes' table
            $table->unsignedBigInteger('studentid'); // Foreign key to 'users' table
            $table->boolean('isPresent'); // Attendance status
            $table->string('comments', 200)->nullable(); // Optional comments
           // Optional, but good practice to track created_at and updated_at
            
            // Foreign key constraints
            $table->foreign('classid')->references('id')->on('classes')->onDelete('cascade');
            $table->foreign('studentid')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attendances'); // Drops the 'attendances' table
    }
};
