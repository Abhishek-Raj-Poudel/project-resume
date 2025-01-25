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
        Schema::create('works', function (Blueprint $table) {
            $table->id();

            $table->foreignId('resume_id')->constrained('resumes')->cascadeOnDelete();

            $table->string('job_title');
            $table->string('company_name');
            $table->string('content');
            $table->string('location');
            $table->date('started_at');
            $table->boolean('is_current');
            $table->date('ended_at')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('works');
    }
};
