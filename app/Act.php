<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Act extends Model
{

    protected $guarded = [];

    protected $casts = [
        'data' => 'array',
    ];
}
