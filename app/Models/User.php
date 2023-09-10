<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'admins';

    protected $fillable = [
        'pid_admin',
        'first_name',
        'last_name',
        'other_name',
        'email',
        'phone',
        'gender',
        'role',
        'authorization_level',
        'account_type',
        'cid',
        'login_status',
        'login_stamp',
        'ref_id',
        'status',
        'status1',
        'status2',
        'ext1',
        'ext2',
        'xstatus',
        'profile_image',
        'superuser',
        'active',
        'email_verified_at',
        'password',
        'created_at',
        'updated_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
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
