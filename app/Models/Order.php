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

    const PAYMENT_STATUS_INITIATED = 1;
    const PAYMENT_STATUS_PROCESSING = 2;
    const PAYMENT_STATUS_VERIFIED = 3;
    const PAYMENT_STATUS_FAILED = 4;
    
    const ORDER_STATUS_PENDING = 1;
    const ORDER_STATUS_PROCESSING = 2;
    const ORDER_STATUS_SHIPPED = 3;
    const ORDER_STATUS_COMPLETE = 4;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function getPaymentStatusMapping()
    {
        return [
            PAYMENT_STATUS_INITIATED => "Payment Initiated",
            PAYMENT_STATUS_PROCESSING => "Payment Processing",
            PAYMENT_STATUS_VERIFIED => "Payment Verified",
            PAYMENT_STATUS_FAILED => "Payment Failed",
        ];
    }

    public static function getOrderStatusMapping()
    {
        return [
            ORDER_STATUS_PENDING => "Order Pending",
            ORDER_STATUS_PROCESSING => "Order Processing",
            ORDER_STATUS_SHIPPED => "Order Shipped",
            ORDER_STATUS_COMPLETE => "Order Complete",
        ];
    }
}
