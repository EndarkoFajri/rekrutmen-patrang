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
        $table->dateTime('interview_date')->nullable();
        $table->string('interview_location')->nullable();
        $table->text('interview_notes')->nullable();
    });
}

public function down(): void
{
    Schema::table('applications', function (Blueprint $table) {
        $table->dropColumn(['interview_date', 'interview_location', 'interview_notes']);
    });
}
};
