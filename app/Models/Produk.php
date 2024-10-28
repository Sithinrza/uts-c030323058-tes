<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produks'; // Pastikan tabel ini sesuai dengan nama tabel di database

    protected $fillable = [
        'nama_produk',
        'deskripsi',
        'harga',
        'kategori_usaha_id', // Relasi ke KategoriUsaha
        'stok',
        'gambar',
    ];

    protected $casts = [
        'harga' => 'decimal:2',
        'stok' => 'integer',
    ];

    public function kategoriUsaha()
    {
        return $this->belongsTo(Kategori_Usaha::class, 'kategori_usaha_id');
    }
}
