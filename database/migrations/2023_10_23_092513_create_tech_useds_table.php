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
    Schema::create('tech_useds', function (Blueprint $table) {
      $table->id();
      $table->foreignId('web_dev_id')
        ->constrained('web_devs')
        ->onDelete('cascade');
      $table->string('tech_name');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('tech_useds');
  }
};
