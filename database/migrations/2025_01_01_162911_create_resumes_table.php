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
            $table->foreignId('userId')->constrained()->cascadeOnDelete();
            $table->string('resumeName');
            $table->string('name');
            $table->string('contactNumber',20);
            $table->string('email');
            $table->json('socialLinks');
            $table->json('education');
            $table->json('technicalSkill');
            $table->json('projectExperience');
            $table->json('workExperience');
            $table->json('certification');
            $table->json('achievements');
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
