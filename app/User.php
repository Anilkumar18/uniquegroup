<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
   /* protected $fillable = [
        'name', 'email', 'password',
    ];*/

    protected $fillable = [
        'customerID', 'userTypeID', 'countryID', 'regionID', 'addressID', 'is_sys_admin', 'userName',
        'email', 'is_sys_admin', 'is_sys_admin', 'email', 'password','Visible_password', 'companyName',
        'firstName', 'lastName', 'phone', 'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
