<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Meet extends Model
{
    protected $fillable = ['show_name','id_name','password','start_at','pic'];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
    public function people()
    {
        return $this->belongsToMany(Person::class);
    }
    public function schedules()
    {
        return $this->hasMany('App\Schedule');
    }

    public function getPermission($user_id)
    {
        //$exists = $this->users->contains('id', $product_id);
        if ($this->users->contains($user_id))
            return "edit";
        else if($this->password=="")
            return "view";
        else if(session("password.{$this->id_name}",'') == $this->password)
            return "view";
        return "deny".$user_id;
    }
}
