<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'year', 'degree', 'university', 'college'
    ];
}
