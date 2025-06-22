<?php
namespace App\Domain\Order\Actions;

use App\Domain\Order\Repositories\OrderRepository;
use Illuminate\Support\Facades\Auth;

class CreateOrderAction
{
    protected OrderRepository $orderRepository;    

    public function __construct (
        OrderRepository $orderRepository        
    )
    {
        $this->orderRepository = $orderRepository;
    }

    public function execute($data)
    {   
        return $this->orderRepository->create([                        
            'payment_type_id' => $data->attributes()['payment_type_id'],
            'name' => $data->attributes()['name'],
            'card_number' => $data->attributes()['card_number'],
            'valid_date' => $data->attributes()['valid_date'],
            'cvv' => $data->attributes()['cvv'],
            'value' => '100',
            'installment' => $data->attributes()['installment'],
            'user_id' => 2
        ]);
    }
}
