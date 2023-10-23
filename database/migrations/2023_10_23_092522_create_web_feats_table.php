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
    Schema::create('web_feats', function (Blueprint $table) {
      $table->id();
      $table->foreignId('web_dev_id')
        ->constrained('web_devs')
        ->onDelete('cascade');
      $table->string('feat_name');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('web_feats');
  }
};
