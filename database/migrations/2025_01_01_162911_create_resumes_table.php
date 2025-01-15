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
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('resumeName');
            $table->string('name');
            $table->string('contactNumber', 20)->nullable()->change();
            $table->string('email')->nullable()->change();
            $table->json('socialLinks')->nullable()->change();
            $table->json('education')->nullable()->change();
            $table->json('technicalSkill')->nullable()->change();
            $table->json('projectExperience')->nullable()->change();
            $table->json('workExperience')->nullable()->change();
            $table->json('certification')->nullable()->change();
            $table->json('achievements')->nullable()->change();
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
