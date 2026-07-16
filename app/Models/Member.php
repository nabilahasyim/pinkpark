<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_member',
        'nama',
        'nomor_telepon',
        'alamat',
        'jenis_kendaraan',
        'nomor_polisi',
    ];
}
