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
        Schema::create('quotes', function (Blueprint $table) {
            $table->uuid('quote_id')->primary();
            $table->string('full_name');
            $table->string('email');
            $table->string('phone');
            $table->string('project_type');
            $table->string('project_location');
            $table->string('estimated_budget')->nullable();
            $table->string('expected_timeline')->nullable();
            $table->text('project_description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quotes');
    }
};
