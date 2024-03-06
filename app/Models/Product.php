<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public $table = "products";

    protected $fillable = [
        'nama_produk', 
        'kategori_produk',
        'deskripsi',
        'harga_normal',
        'status_produk',
        'photo',
        'kode_produk',
        'slug',
        'komisi_persen',
    ];

    public function sluggable():array
    {
        return [
            'slug' => [
                'source' => 'slug'
            ]
        ];
    }
}
