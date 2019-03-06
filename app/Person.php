<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $fillable = ['prefix','first_name','last_name','address','phone'];

    public function getFullNameAttribute()
    {
        return "{$this->prefix} {$this->first_name} {$this->last_name}";
    }
    public function meets()
    {
        return $this->belongsToMany(Meet::class);
    }
}
