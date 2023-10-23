<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebFeat extends Model
{
    use HasFactory;

    protected $fillable = [
      'web_dev_id',
      'feat_name',
    ];
}
