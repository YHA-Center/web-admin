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
        Schema::create('payment', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('voucher_no');
            $table->decimal('total_amu', 10, 2);
            $table->decimal('discount', 10, 2);
            $table->decimal('balance', 10, 2);
            $table->decimal('paid', 10, 2);
            $table->timestamp('vou_date')->useCurrent();
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
