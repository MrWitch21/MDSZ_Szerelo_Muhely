<?php

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
        Schema::create('worksheets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('receptionist_id');
            $table->unsignedBigInteger('mechanic_id');
            $table->string('license_plate');
            $table->string('make');
            $table->string('model');
            $table->string('owner_name');
            $table->string('owner_address');
            $table->boolean('closed')->default(false);
            $table->enum('payment_method', ['cash', 'card']);
            $table->timestamp('closed_at')->nullable();
            $table->timestamps();

            $table->foreign('receptionist_id')->references('id')->on('users');
            $table->foreign('mechanic_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('worksheets');
    }
};
