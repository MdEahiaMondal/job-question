<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{

    protected $fillable = [
        'title',
        'slug',
        'audio',
        'status',
        'created_by',
        'updated_by',
    ];
}
