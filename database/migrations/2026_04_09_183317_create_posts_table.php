<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
           $table->id();
            $table->string ('title');
            $table->text ('post_content');
            $table->string ('image')->nullable();
            $table->unsignedBigInteger ('likes')->nullable();
            $table->boolean ('is_published')->default('1');
            $table->timestamps();
            $table->softDeletes();

            $table->unsignedBigInteger('category_id')->nullable();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
