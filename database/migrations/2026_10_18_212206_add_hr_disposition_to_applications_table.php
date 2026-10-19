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
        Schema::table('applications', function (Blueprint $table) {
        $table->integer('rating')->nullable(); // Rating 1-5 bintang
        $table->text('hr_notes')->nullable(); // Catatan internal staf HRD
        $table->string('disposition_status')->default('Proses SDM'); // Status disposisi
        $table->text('leader_notes')->nullable(); // Catatan arahan dari pimpinan
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('applications', function (Blueprint $table) {
        $table->dropColumn(['rating', 'hr_notes', 'disposition_status', 'leader_notes']);
    });
    }
};
