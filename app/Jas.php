<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jas extends Model
{
    protected $fillable = ['nama_jas', 'model_jas', 'warna_jas', 'ukuran_jas', 'hargaPerHari', 'gambar'];
    protected $primaryKey = 'id_jas';
}
