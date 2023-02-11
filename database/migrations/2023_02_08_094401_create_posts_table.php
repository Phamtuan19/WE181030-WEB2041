<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->text('product_code')->nullable();
            $table->text('category_id');
            $table->string('slug')->unique()->nullable();
            $table->text('title')->nullable();
            $table->text('content')->nullable();
            $table->text('avatar_path')->nullable();
            $table->text('avatar_public_id')->nullable();
            $table->timestamps();
            $table->date('deleted_at')->nullable();
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
}
