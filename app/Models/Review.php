<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Review extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'user_id',
        'rating',
        'message',
        'visibility',
        'product_id',
    ];

    protected $searchableFields = ['*'];

    protected $casts = [
        'visibility' => 'boolean',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
