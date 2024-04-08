<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pinjaman extends Model
{
    use HasFactory;

    protected $table = 'pinjams';

    protected $fillable = [
        'id_pinjaman',
        'nama_peminjam',
        'jumlah_pinjaman',
        'metode',
        'angsuran',
        'tanggal_pinjaman',
        'waktu_pinjaman',
    ];

}