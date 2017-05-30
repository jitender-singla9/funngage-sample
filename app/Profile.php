<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'address1', 'city', 'state', 'pincode'
    ];
}
