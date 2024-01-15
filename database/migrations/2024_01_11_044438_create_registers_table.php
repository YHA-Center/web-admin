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
        Schema::create('registers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('course_id');
            $table->unsignedBigInteger('section_id');
            $table->string('name');
            $table->date('register_date');
            $table->date('enroll_date');
            $table->string('father_name');
            $table->string('mother_name');
            $table->string('phone', 15);
            $table->string('viber_phone', 15);
            $table->string('email');
            $table->string('city');
            $table->string('township');
            $table->date('date_of_birth');
            $table->string('nrc');
            $table->integer('gender');
            $table->string('image');
            $table->string('education');
            $table->integer('status');
            $table->timestamps();

            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
            $table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registers');
    }
};
