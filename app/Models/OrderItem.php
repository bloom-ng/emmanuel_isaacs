<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderItem extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['order_id', 'product_id', 'quantity', 'price'];

    protected $searchableFields = ['*'];

    protected $table = 'order_items';

    protected $with = ['product'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
