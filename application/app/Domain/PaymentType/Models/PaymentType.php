<?php

namespace App\Domain\PaymentType\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentType extends Model
{
    protected $table = 'payments_type';
    protected $fillable = [
        'name',
        'max_installment',        
    ];
}
