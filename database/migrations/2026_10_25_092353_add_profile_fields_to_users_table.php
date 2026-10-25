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
            $table->string('role')->default('student');
            $table->foreignId('department_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('group_id')->nullable()->constrained()->nullOnDelete();
            $table->unsignedSmallInteger('academic_rating')->default(1000);
            $table->unsignedInteger('academic_activity_points')->default(0);
            $table->unsignedInteger('social_activity_points')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['department_id']);
            $table->dropForeign(['group_id']);
            $table->dropColumn([
                'role',
                'department_id',
                'group_id',
                'academic_rating',
                'academic_activity_points',
                'social_activity_points',
            ]);
        });
    }
};
