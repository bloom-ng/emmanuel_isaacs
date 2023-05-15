<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'user_id',
        'contact_email',
        'contact_phone',
        'name',
        'payment_ref',
        'transaction_id',
        'address_line_1',
        'address_line_2',
        'state',
        'city',
        'country',
        'sub_total',
        'discount',
        'shipping_total',
        'order_status',
        'payment_status',
        'payment_response',
    ];

    protected $searchableFields = ['*'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
