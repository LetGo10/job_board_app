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
        Schema::table('job_lists', function (Blueprint $table) {
            $table->foreignId('owner_id')->nullable()->constrained('users')->onDelete('cascade')->after('id');
            $table->enum('status', ['pending', 'active', 'inactive', 'draft', 'closed'])->default('pending')->after('description');
            $table->text('requirements')->nullable()->after('status');
            $table->enum('work_type', ['remote', 'on-site', 'hybrid'])->default('on-site')->after('requirements');
            $table->enum('job_type', ['full-time', 'part-time', 'contract', 'internship', 'freelance'])->default('full-time')->after('work_type');
            $table->string('salary_range')->nullable()->after('job_type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('job_lists', function (Blueprint $table) {
            $table->dropForeign(['owner_id']);
            $table->dropColumn(['owner_id', 'status', 'requirements', 'work_type', 'job_type', 'salary_range']);
        });
    }
};
