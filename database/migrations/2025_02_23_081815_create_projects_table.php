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
        Schema::create('projects', function (Blueprint $table) {
            $table->uuid('project_id')->primary();
            $table->string('project_user_name');
            $table->string('project_image');
            $table->string('project_title')->unique();
            $table->longText('project_description');
            $table->string('project_date');
            $table->string('project_slug');
            $table->integer('project_sequence')->default(0);
            $table->string('project_location')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
