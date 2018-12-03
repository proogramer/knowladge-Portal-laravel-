<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //table
    protected $table = "posts";

    //fillable fields
    protected $fillable = [
        'title', 'category_id', 'description','image'
    ];
}
