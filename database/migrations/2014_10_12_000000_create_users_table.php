<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('name'); // User's name
            $table->string('email')->unique(); // Unique email
            $table->string('password'); // Password for authentication
            $table->boolean('is_admin')->default(false); // Flag for admin users
            $table->string('phone_number')->nullable(); // Optional phone number
            $table->string('address')->nullable(); // Optional address
            $table->timestamps(); // Created at and updated at timestamps
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}