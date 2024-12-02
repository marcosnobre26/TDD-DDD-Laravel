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
        Schema::table('scheduling', function (Blueprint $table) {
            $table->bigInteger('doctor_id')->unsigned()->index();
            $table->string('reason_for_consultation');

            $table->foreign('doctor_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('scheduling', function (Blueprint $table) {
            $table->dropColumn('doctor_id');
        });
    }
};
