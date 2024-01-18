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
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('profile_photo_path');
            $table->dropColumn('current_team_id');
            $table->dropColumn('gender');
            $table->dropColumn('township');
            $table->dropColumn('city');
            $table->dropColumn('email_verified_at');
            $table->dropColumn('email');

            $table->string('confirm_password')->default('')->nullable();
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
