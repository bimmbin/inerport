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
    Schema::create('web_devs', function (Blueprint $table) {
      $table->id();
      $table->foreignId('project_id')
        ->constrained('projects')
        ->onDelete('cascade');
      $table->string('github_link');
      $table->string('live_link');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('web_devs');
  }
};
