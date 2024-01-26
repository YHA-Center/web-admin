<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('voucher', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('voucher_no');
            $table->string('stu_name');
            $table->bigInteger('course_id')->unsigned();
            $table->date('enroll_date');
            $table->decimal('fees', 10, 2);
            $table->timestamp('vou_date');
            $table->timestamps();
    
            $table->index('course_id');
    
            // Remove the following line as 'id' is already a primary key
            // $table->primary('vou_date');
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
