<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('batches', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('course_id');

            $table->string('batch_name');
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();

            $table->integer('capacity')->nullable();

            $table->string('class_time')->nullable();

            $table->timestamps();

            // Foreign Key
            $table->foreign('course_id')
                  ->references('id')
                  ->on('courses')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('batches');
    }
};