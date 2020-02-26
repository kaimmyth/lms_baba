<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable {

    use SoftDeletes;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'org_id', 'email', 'password', 'users_role', 'users_type', 'teacher_id', 'username', 'token', 'token_expire', 'status', 'is_deleted', 'deleted_by', 'deleted_date', 'ip_address', 'created_by', 'modified_by', 'last_login'
    ];
    protected $primaryKey = 'id';
    protected $table = 'users';
    protected $softDelete = true;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

}
