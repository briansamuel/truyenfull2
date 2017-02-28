<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stories extends Model
{
    //
    protected $table = 'stories';

    protected $fillable = [
        'story_title',
        'story_excerpt',
        'story_parent',
        'story_keyword',
       	
    ];
}
