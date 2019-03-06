<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Month extends Model
{
    protected $fillable = ['year','month','first_day_week','month_day','first_lunar_month','first_lunar_day','last_lunar_day','first_georgian_month','first_georgian_day','last_georgian_day'];
}
