<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\DefaultStatus;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->integer('_lft');
            $table->integer('_rgt');
            $table->foreignId('admin_id')->nullable();
            $table->foreignId('parent_id')->nullable();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('feature_image')->nullable();
            $table->integer('position')->default(0);
            $table->tinyInteger('status')->default(DefaultStatus::Published->value);
            $table->tinyInteger('is_featured')->default(0);
            $table->text('description')->nullable();
            $table->text('title_seo')->nullable();
            $table->text('desc_seo')->nullable();
            $table->timestamps();
            $table->foreign('admin_id')->references('id')->on('admins')->onDelete('SET NULL');
            $table->foreign('parent_id')->references('id')->on('categories')->onDelete('SET NULL');
        });

        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->foreignId('admin_id')->nullable();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->tinyInteger('status')->default(DefaultStatus::Published->value);
            $table->text('title_seo')->nullable();
            $table->text('desc_seo')->nullable();
            $table->timestamps();
            $table->foreign('admin_id')->references('id')->on('admins')->onDelete('SET NULL');
        });

        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('admin_id')->nullable();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('feature_image')->nullable();
            $table->tinyInteger('status')->default(DefaultStatus::Published->value);
            $table->tinyInteger('is_featured')->default(0);
            $table->text('excerpt')->nullable();
            $table->longText('content')->nullable();
            $table->integer('viewed')->default(0);
            $table->text('title_seo')->nullable();
            $table->text('desc_seo')->nullable();
            $table->dateTime('posted_at');
            $table->timestamps();
        });

        Schema::create('post_categories', function (Blueprint $table) {
            $table->foreignId('post_id');
            $table->foreignId('category_id');
            $table->primary(['post_id', 'category_id']);
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
        Schema::create('post_tags', function (Blueprint $table) {
            $table->foreignId('post_id');
            $table->foreignId('tag_id');
            $table->primary(['post_id', 'tag_id']);
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_tags');
        Schema::dropIfExists('post_categories');
        Schema::dropIfExists('posts');
        Schema::dropIfExists('tags');
        Schema::dropIfExists('categories');
    }
};
