<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Umkm extends Model
{
    use HasFactory;

    protected $table = 'umkms';

    // protected $primaryKey = 'id_umkm';

    protected $fillable = [
        'nama_umkm',
        'jenis_usaha',
        'alamat',
        'kelurahan',
        'kecamatan',
        'no_telp',
        'email',
        'pemilik',
        'tahun_berdiri',
        'jumlah_karyawan',
        'omset_perbulan',
        'status_verifikasi',
        'tanggal_input',
    ];

    protected $casts = [
        'tanggal_input' => 'datetime',
        'omset_perbulan' => 'decimal:2',
        'tahun_berdiri' => 'integer',
        'jumlah_karyawan' => 'integer',
    ];
}
