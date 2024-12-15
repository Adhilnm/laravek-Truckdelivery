<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Foreign key to `users` table
            $table->string('pickup_location'); // Pickup location
            $table->string('delivery_location'); // Delivery location
            $table->string('package_size')->nullable(); // Optional package size (e.g., small, medium, large)
            $table->decimal('weight', 8, 2)->nullable(); // Optional weight in kilograms
            $table->timestamp('pickup_time')->nullable(); // Optional pickup time
            $table->timestamp('delivery_time')->nullable(); // Optional delivery time
            $table->enum('status', ['pending', 'in_progress', 'delivered', 'cancelled'])->default('pending'); // Order status
            $table->timestamps(); // Created at and updated at timestamps
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
}