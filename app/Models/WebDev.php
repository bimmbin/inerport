<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebDev extends Model
{
  use HasFactory;

  protected $fillable = [
    'project_id',
    'github_link',
    'live_link',
  ];

  public function project()
  {
    return $this->belongsTo(User::class);
  }

  public function tech_used()
  {
    return $this->hasMany(TechUsed::class);
  }

  public function web_feat()
  {
    return $this->hasMany(WebFeat::class);
  }
}
