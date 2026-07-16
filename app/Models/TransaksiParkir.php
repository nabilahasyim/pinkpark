<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiParkir extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_transaksi',
        'member_id',
        'nomor_polisi',
        'jenis_kendaraan',
        'waktu_masuk',
        'waktu_keluar',
        'tarif',
        'status',
    ];

    protected $casts = [
        'waktu_masuk' => 'datetime',
        'waktu_keluar' => 'datetime',
    ];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}
