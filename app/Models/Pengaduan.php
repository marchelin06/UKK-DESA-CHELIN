<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    protected $table = 'pengaduan';

    protected $fillable = [
        'nama_pengirim',
        'masalah',
        'lokasi',
        'status',
        'catatan_admin',
        'tanggal_ditinjau',
    ];

    protected $casts = [
        'tanggal_ditinjau' => 'datetime',
    ];
}
