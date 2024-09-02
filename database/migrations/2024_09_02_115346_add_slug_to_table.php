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
        Schema::table('products', function (Blueprint $table) {
            $table->string('slug')->nullable();
        });

        Schema::table('categories', function (Blueprint $table) {
            $table->string('slug')->nullable();
        });

        Schema::table('attributes', function (Blueprint $table) {
            $table->string('slug')->nullable();
        });

        Schema::table('coupons', function (Blueprint $table) {
            $table->string('slug')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('slug');
        });

        Schema::table('categories', function (Blueprint $table) {
            $table->dropColumn('slug');
        });

        Schema::table('attributes', function (Blueprint $table) {
            $table->dropColumn('slug');
        });

        Schema::table('coupons', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
    }
};
