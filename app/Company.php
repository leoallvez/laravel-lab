<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model {

    protected $fillable = [
        'logo', 
        'name',
        'email',
        'website',
        'password',
    ];



    // protected $hidden = ['password'];

    protected $dates = ['deleted_at'];

    public function jobs()
    {
        return $this->hasMany('App\Job');
    }
}


