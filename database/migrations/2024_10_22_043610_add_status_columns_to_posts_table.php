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
        Schema::table('posts', function (Blueprint $table) {
            $table->timestamp('accepted_at')->nullable(); // Kolom untuk waktu di-accept
            $table->timestamp('rejected_at')->nullable(); // Kolom untuk waktu di-reject
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('accepted_at');
            $table->dropColumn('rejected_at');
        });
    }

};
