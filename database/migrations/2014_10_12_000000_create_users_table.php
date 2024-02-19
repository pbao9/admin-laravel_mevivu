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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->char('code', 50);
            $table->string('slug');
            $table->char('username', 100)->unique();
            $table->string('fullname');
            $table->char('email', 100)->unique();
            $table->char('phone', 20)->unique();
            $table->date('birthday')->nullable();
            $table->tinyInteger('gender');
            $table->text('avatar')->nullable();
            $table->text('address')->nullable();
            $table->string('password');
            $table->tinyInteger('status')->default(1);
            $table->tinyInteger('active')->default(1);
            $table->string('token_get_password')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
