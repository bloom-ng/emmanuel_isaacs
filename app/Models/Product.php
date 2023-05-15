<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'name',
        'category_id',
        'quantity',
        'image',
        'image_2',
        'thumbnail',
        'slug',
        'weight',
        'height',
        'length',
        'price',
        'sale_price',
        'sale_start',
        'sale_end',
        'description',
        'short_description',
        'type',
        'shipping_price',
        'download_link',
    ];

    protected $searchableFields = ['*'];

    protected $casts = [
        'sale_start' => 'date',
        'sale_end' => 'date',
    ];

    public function category()
    {
        return $this->hasOne(Category::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
