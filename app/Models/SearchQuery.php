<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SearchQuery extends Model
{
    protected $fillable = ['query', 'video_id'];
}
