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
            $table->string('role_title')->nullable()->after('portfolio_url');
            $table->string('phone')->nullable()->after('role_title');
            $table->string('linkedin_url')->nullable()->after('phone');
            $table->string('github_url')->nullable()->after('linkedin_url');
            $table->text('languages')->nullable()->after('github_url');
            $table->text('hobbies')->nullable()->after('languages');
            $table->text('interests')->nullable()->after('hobbies');
            $table->text('skills')->nullable()->after('interests');
            $table->text('education')->nullable()->after('skills');
            $table->text('work_experience')->nullable()->after('education');
            $table->text('tech_stack')->nullable()->after('work_experience');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'role_title',
                'phone',
                'linkedin_url',
                'github_url',
                'languages',
                'hobbies',
                'interests',
                'skills',
                'education',
                'work_experience',
                'tech_stack',
            ]);
        });
    }
};
