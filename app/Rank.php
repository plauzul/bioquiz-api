<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rank extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_user', 'points'
    ];

}