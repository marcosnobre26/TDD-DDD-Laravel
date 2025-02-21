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
        Schema::table('clinic', function (Blueprint $table) {
            $table->bigInteger('user_id')->unsigned()->index()->nullable();
            $table->string('fantasy_name')->nullable();
            $table->string('cnpj')->nullable();
            $table->string('address')->nullable();
            $table->string('description')->nullable();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('clinic', function (Blueprint $table) {
            $table->dropColumn('user_id');
            $table->dropColumn('fantasy_name');
            $table->dropColumn('cnpj');
            $table->dropColumn('address');
            $table->dropColumn('description');
        });
    }
};
