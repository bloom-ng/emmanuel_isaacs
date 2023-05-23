<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['product_id', 'user_id', 'session', 'quantity'];

    protected $searchableFields = ['*'];

    protected $with = ['product'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public static function getUserCart()
    {
        return static::query()
                            ->when(auth()->guest(), function ($query) {
                                $query->where('session', request()->ip());
                            }, function ($query) {
                                $query->where('user_id', auth()->id());
                            })
                            ->get();
    }
}
