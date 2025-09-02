<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class book extends Model
{
    protected $fillable = [
        'id_lokasi',
        'id_kategori',
        'judul',
        'pengarang',
        'penerbit',
        'tahun_penerbit',
        'keterangan',
        'stock',
    ];
}
