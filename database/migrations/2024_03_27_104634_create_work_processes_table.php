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
        Schema::create('work_processes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('duration');
            $table->timestamps();
        });
        Schema::create('work_process_worksheet', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('work_process_id');
            $table->unsignedBigInteger('worksheet_id');

            $table->foreign('work_process_id')->references('id')->on('work_processes')
              ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('worksheet_id')->references('id')->on('worksheets')
              ->onDelete('cascade')->onUpdate('cascade');

            $table->unique(['work_process_id', 'worksheet_id']);
          });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('work_processes');
        Schema::dropIfExists('work_process_worksheet');
    }
};
