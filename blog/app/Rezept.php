<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rezept extends Model
{ 
    protected $fillable = [
        'name', 'detail'
    ];
}