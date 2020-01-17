<?php

namespace Intranet;

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
    protected $table = 'SYS_USERS';
    protected $connection = 'sql_intranet';
    protected $fillable = ['USR_MAIL', 'USR_PASS'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'USR_PASS', 'remember_token',
    ];

    public function getAuthPassword(){
        return $this->USR_PASS;
    }
}
