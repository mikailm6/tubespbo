<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Penyewa;
use App\PJ;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'password', 'level'
    ];

    protected $primaryKey = 'id_user';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function ke_py()
    {
        return $this->hasMany(Penyewa::class, 'id_user');
    }

    public function ke_pj()
    {
        return $this->hasMany(PJ::class, 'id_user');
    }
}
