<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TechUsed extends Model
{
  use HasFactory;

  protected $fillable = [
    'web_dev_id',
    'tech_name',
  ];

  public function web_dev()
  {
    return $this->belongsTo(WebDev::class);
  }

}
