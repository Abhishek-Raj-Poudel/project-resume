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
        Schema::table('resumes', function (Blueprint $table) {
            $table->string('contactNumber', 20)->nullable()->change();
            $table->string('email')->nullable()->change();
            $table->json('socialLinks')->nullable()->change();
            $table->json('education')->nullable()->change();
            $table->json('technicalSkill')->nullable()->change();
            $table->json('projectExperience')->nullable()->change();
            $table->json('workExperience')->nullable()->change();
            $table->json('certification')->nullable()->change();
            $table->json('achievements')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('resumes', function (Blueprint $table) {
            $table->string('contactNumber', 20)->nullable(false)->change();
            $table->string('email')->nullable(false)->change();
            $table->json('socialLinks')->nullable(false)->change();
            $table->json('education')->nullable(false)->change();
            $table->json('technicalSkill')->nullable(false)->change();
            $table->json('projectExperience')->nullable(false)->change();
            $table->json('workExperience')->nullable(false)->change();
            $table->json('certification')->nullable(false)->change();
            $table->json('achievements')->nullable(false)->change();
            //
        });
    }
};
