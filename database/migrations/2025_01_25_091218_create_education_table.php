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
        Schema::create('educations', function (Blueprint $table) {
            $table->id();


            $table->foreignId('resume_id')->constrained('resumes')->cascadeOnDelete();

            $table->string('institution_name');
            $table->string('location');
            $table->string('course_name');
            $table->date('started_at');
            $table->boolean('is_current');
            $table->date('ended_at')->nullable();;

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('education');
    }
};
