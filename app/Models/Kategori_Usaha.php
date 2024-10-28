<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kategori_Usaha extends Model
{
    //

    use HasFactory;

    protected $table = 'kategori_usahas';

    protected $fillable = [
        'nama_kategori',
        'deskripsi',
        'icon',
    ];

    public function umkms()
    {
        return $this->hasMany(Umkm::class, 'kategori_usaha_id');
    }
}
