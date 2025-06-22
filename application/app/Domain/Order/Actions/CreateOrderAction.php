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
            'payment_type_id' => $data->payment_type_id,
            'name' => $data->name,
            'card_number' => $data->card_number,
            'valid_date' => $data->valid_date,
            'cvv' => $data->cvv,
            'value' => $data->value,
            'installment' => $data->installment,
            'user_id' => Auth::user()->id
        ]);
    }
}
