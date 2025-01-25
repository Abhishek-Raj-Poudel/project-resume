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
        Schema::create('resumes', function (Blueprint $table) {
            $table->id();

            $table->foreignId('client_id')->constrained('users')->cascadeOnDelete();
            $table->string('resume_name');
            $table->string('full_name');
            $table->string('contact_number', 20)->nullable()->change();
            $table->string('email')->nullable()->change();
            $table->foreignId('social_ids')->nullable()->constrained('socials')->cascadeOnDelete();
            $table->foreignId('education_ids')->nullable()->constrained('educations')->cascadeOnDelete();
            $table->foreignId('skill_ids')->nullable()->constrained('skills')->cascadeOnDelete();
            $table->foreignId('project_ids')->nullable()->constrained('projects')->cascadeOnDelete();
            $table->foreignId('certification_ids')->nullable()->constrained('certifications')->cascadeOnDelete();
            $table->string('resume_name');
            $table->foreignId('work_experience_ids')->nullable()->constrained('works')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resumes');
    }
};
