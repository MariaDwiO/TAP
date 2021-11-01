<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // use HasFactory;
    protected $fillable = [
        'id',
        'name_siswa',
        'telephone',
        'name',
        'slug',
        'prince',
        'pengerjaan',
        'kategori',
        'image_product',
        'description',
    ];

    public function categories()
    {
        return $this->belongsToMany('App\Models\Category', 'product_categories');
    }

}
