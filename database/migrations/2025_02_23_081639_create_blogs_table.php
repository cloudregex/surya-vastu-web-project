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
        Schema::create('blogs', function (Blueprint $table) {
            $table->uuid('blog_id')->primary();
            $table->string('blog_user_name');
            $table->string('blog_image');
            $table->string('blog_title')->unique();
            $table->longText('blog_description');
            $table->string('blog_date');
            $table->string('blog_slug');
            $table->integer('blog_sequence')->default(0);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};