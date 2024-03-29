<?php

use App\Models\Book;
use App\Models\User;
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
        Schema::create('book_issuings', function (Blueprint $table) {
            $table->id();
            $table->string('borrowed_date');
            $table->string('returned_date')->default('0000-00-00');
            $table->foreignIdFor(User::class);
            $table->foreignIdFor(Book::class);
            $table->string('total_days');
            $table->boolean('penalty')->default(false);
            $table->string('penalty_payment')->default(0);
            $table->boolean('is_approved')->default(false);
            $table->string('penalty_date')->nullable();
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_issuings');
    }
};
