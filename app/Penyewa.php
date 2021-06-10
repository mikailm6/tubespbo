<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Penyewa extends Model
{
    protected $fillable = ['id_user', 'nama_penyewa', 'alamat_penyewa', 'no_hp', 'email_penyewa'];
    protected $primaryKey = 'id_penyewa';
    protected $table = 'penyewas';

    public function dari_user()
    {
    	return $this->belongsTo(User::class, 'id_user');
    }
}
