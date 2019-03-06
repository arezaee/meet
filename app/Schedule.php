<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = ['year_month_week','comment','people_id'];


    public function getFullDataAttribute()
    {
        return array( 'people_id'=> $this->people_id , 'comment'=>$this->comment );
    }

    public function meets()
    {
        return $this->belongsTo('App\Meet');
    }

}
