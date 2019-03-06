<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Occasion extends Model
{
    protected $fillable = ['month', 'day','comment','holiday','type'];
    protected $casts = [ 'holiday' => 'boolean' ];
}
