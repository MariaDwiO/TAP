<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Product extends Model
{
    // use HasFactory;
    protected $fillable = [
        'id',
        'name_siswa',
        'telephone',
        'name',
        'slug',
        'price',
        'pengerjaan',
        'kategori',
        'image',
        'description',
    ];

    public function categories()
    {
        return $this->belongsToMany('App\Models\Category', 'product_categories');
    }

    public function tgl()
    {
        return Carbon::parse($this->attributes['created_at'])->translatedFormat(' d F Y H:i ');
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public const UPLOAD_DIR = 'uploads';

}
