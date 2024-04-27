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
            $table->string('license_plate');
            $table->string('make');
            $table->string('model');
            $table->string('owner_name');
            $table->string('owner_address');
            $table->boolean('closed')->default(false);
            $table->integer('total')->nullable();
            $table->string('payment_method')->nullable();
            $table->timestamp('closed_at')->nullable();
            $table->timestamps();
        });
        Schema::create('user_worksheet', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('worksheet_id');
            $table->enum('access_role',['receptionist','mechanic']);
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')
              ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('worksheet_id')->references('id')->on('worksheets')
              ->onDelete('cascade')->onUpdate('cascade');

            $table->unique(['user_id', 'worksheet_id']);
          });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_worksheet');
        Schema::dropIfExists('worksheets');
    }
};
