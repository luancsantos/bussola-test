<?php

namespace App\Domain\Order\Models;

use Illuminate\Database\Eloquent\Model;
use App\Domain\PaymentType\Models\PaymentType;

class Order extends Model
{
    protected $table = 'orders';
    public const PAYMENT_TYPE_PIX = 1;
    public const PAYMENT_TYPE_CREDIT_CARD = 2;
    
    protected $fillable = [
        'payment_type_id',
        'name',
        'card_number',
        'valid_date',
        'cvv',
        'value',
        'installment',
        'created_at'
    ];

    public function profile()
    {
        return $this->hasOne(PaymentType::class, 'payment_type_id', 'id');
    }
}
