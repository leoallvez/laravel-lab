<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = [
        'type',
        'title',
        'local',
        'remote',
        'company_id'
        'description',
    ];

    protected $dates = ['delete_at'];

    function company()
    {
        return $this->belongs('App\Company');
    }
}
