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
}
