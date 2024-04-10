<?php

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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title')->default("No title");
            $table->string('tags')->default("No tags");
            $table->foreignIdFor(User::class)->constrained();
            $table->integer('upvotes')->default(0);
            $table->integer('downvotes')->default(0);
            $table->text('text_content')->default("nothing");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
