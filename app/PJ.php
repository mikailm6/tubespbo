<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class PJ extends Model
{
    protected $fillable = ['id_user', 'nama_pj', 'email_pj'];
    protected $primaryKey = 'id_pj';
    protected $table = 'p_js';

    public function dari_user()
    {
    	return $this->belongsTo(User::class, 'id_user');
    }
}
