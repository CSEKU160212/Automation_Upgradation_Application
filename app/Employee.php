<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
     use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'users_id', 'roles_id', 'disciplines_id', 'upgradation_date'
    ];

    public $timestamps = true;
}
