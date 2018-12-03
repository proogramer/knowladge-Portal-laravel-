<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //table
    protected $table = "categories";

    //fillable fields
    protected $fillable = [
        'category', 'user_id', 'user_type',
    ];
}
