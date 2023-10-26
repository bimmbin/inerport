<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
  use HasFactory;

  protected $fillable = [
    'proj_title',
    'proj_description',
    'img_thumbnail',
  ];

  public function web_dev()
  {
    return $this->hasOne(WebDev::class);
  }

  public function image_showcase()
  {
    return $this->hasMany(ImageShowcase::class);
  }
}
