<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public $table = "products";

    protected $fillable = [
        'name',
        'group',
        'description',
        'price',
        'status',
        'sku',
        'share', // commission
        'slug',
        'preview_url',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'slug'
            ]
        ];
    }
}
