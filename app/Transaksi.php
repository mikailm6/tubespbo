<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Jas;
use App\User;
use App\PJ;

class Transaksi extends Model
{
    protected $fillable = ['id_jas', 'id_user','id_pj', 'jumlah_hari', 'tgl_sewa', 'status_transaksi'];
    protected $primaryKey = 'id_transaksi';

    public function dari_jas()
    {
    	return $this->belongsTo(Jas::class, 'id_jas');
    }

    public function dari_user()
    {
    	return $this->belongsTo(User::class, 'id_user');
    }

    public function dari_pj()
    {
    	return $this->belongsTo(PJ::class, 'id_pj');
    }
}
