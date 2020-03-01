<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code');
            $table->string('slug')->unique();
            $table->string('identity_num');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('phone');
            $table->unsignedBigInteger('account_number');
            $table->text('basic_address');
            $table->text('current_address')->nullable();
            $table->enum('gender', ['male', 'female']);
            $table->enum('religion', ['muslim', 'christian']);
            $table->tinyInteger('department');
            $table->string('salary');    
            $table->date('birth_date');
            $table->date('hiring_date')->default(now());
            $table->string('attachment')->nullable();
            $table->string('image')->default('default.png');
            $table->unsignedBigInteger('job_id');
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
}
