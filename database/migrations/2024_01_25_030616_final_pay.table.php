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
        Schema::create('final_pay', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('vou_no');
            $table->decimal('f_paid', 9, 2);
            $table->timestamp('vou_date');
            $table->timestamps();
        });
    }
    
    public function down(): void
    {
        //
    }
};
