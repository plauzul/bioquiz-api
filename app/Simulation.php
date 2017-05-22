<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Simulation extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'proof_id', 'theme_id', 'question', 'a', 'b', 'c', 'd', 'correct'
    ];

}