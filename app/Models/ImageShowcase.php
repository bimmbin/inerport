<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageShowcase extends Model
{
    use HasFactory;

    protected $fillable = [
      'project_id',
      'img_path',
  ];

  public function project()
  {
    return $this->belongsTo(User::class);
  }
}
