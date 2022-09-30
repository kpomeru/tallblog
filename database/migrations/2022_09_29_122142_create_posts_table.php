<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->uuid('id')->unique();
            $table->foreignUuid('category_id')->constrained();
            $table->foreignUuid('user_id')->constrained();
            $table->string('title')->unique();
            $table->string('slug')->unique();
            $table->string('excerpt');
            $table->text('content');
            $table->string('image')->nullable();
            $table->text('tags')->nullable();
            $table->timestamp('featured_at')->nullable();
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
};
