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
            $table->string('category');
            $table->string('published_year');
            $table->string('publisher');
            $table->string('accession_number');
            $table->string('edition_number');
            $table->string('call_number');
            $table->string('ISBN');
            $table->string('pages');
            $table->string('description');
            $table->string('bibliography');
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



