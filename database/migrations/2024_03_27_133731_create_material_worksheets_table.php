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
        Schema::create('material_worksheet', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('material_id');
            $table->unsignedBigInteger('worksheet_id');
            $table->integer('quantity');
            $table->foreign('material_id')->references('id')->on('materials')
              ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('worksheet_id')->references('id')->on('worksheets')
              ->onDelete('cascade')->onUpdate('cascade');

            $table->unique(['material_id', 'worksheet_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('material_worksheet');
    }
};
