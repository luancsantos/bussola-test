<?php

namespace App\Domain\Order\Bags;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;

/**
 * @property string label,
 */
class OrderBag
{
    public static array $rules = [
        'payment_type_id' => 'required',
        'name' => 'required',
        'card_number' => 'required',
        'valid_date' => 'required',
        'cvv' => 'required',
        'installment' => 'required',
        'id_product' => 'required',   
        
    ];

    private array $attributes;

    public function __construct(array $attributes)
    {
        $this->attributes = $attributes;        
    }

    public function attributes(): array
    {
        return $this->attributes;
    }

    public static function fromRequest(Request $request, $type = 'create')
    {
    
        $rules = $type === 'update' ? self::$rulesUpdate : self::$rules;

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        $data = $validator->validate();
        //$data['user_created'] = Auth::user()->id;

        return new self($data);
        
    }

    public function __get($name)
    {
        return $this->attributes[$name];
    }

    public function __set($name, $value)
    {
        return $this->attributes[$name] = $value;
    }  
}
