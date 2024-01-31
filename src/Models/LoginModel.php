<?php

namespace MedianetFCM\Models;

use Illuminate\Database\Eloquent\Model;

class LoginModel extends Model
{
    protected $table = 'login';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'imei',
        'os',
        'token',
        'token_expire_date',
    ];
}
