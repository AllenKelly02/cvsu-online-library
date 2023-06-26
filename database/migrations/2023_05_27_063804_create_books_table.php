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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->string('title');
            $table->string('author');
            $table->string('type');
            $table->string('category');
            $table->string('published_year');
            $table->string('publisher')->nullable();
            $table->string('accession_number')->nullable();
            $table->string('edition_number')->nullable();
            $table->string('call_number')->nullable();
            $table->string('ISBN');
            $table->string('pages');
            $table->string('description', 10000);
            $table->string('bibliography')->nullable();
            $table->string('course');
            $table->string('status')->default('available');
            $table->unsignedBigInteger('course_id')->nullable();
            // $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};



