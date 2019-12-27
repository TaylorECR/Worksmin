<?php

namespace App;

use App\Candidate;
use App\Company;
use App\Role;
use App\UserSocialAccount;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role_id', 'name', 'email', 'password',
    ];

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


    public function pathAttachment () {
        return "/images/users/" . $this->picture;
    }

    public static function navigation () {
        return auth()->check() ? auth()->user()->role->name : 'guest';
    }

    public function role () {
        return $this->belongsTo(Role::class);
    }

    public function company () {
        return $this->hasOne(Company::class);
    }

    public function candidate () {
        return $this->hasOne(Candidate::class);
    }

    public function socialAccount () {
        return $this->hasOne(UserSocialAccount::class);
    }
}
