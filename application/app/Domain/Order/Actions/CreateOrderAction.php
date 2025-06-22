<?php
namespace App\Domain\Order\Actions;

use App\Domain\Order\Models\Order;
use App\Domain\Order\Repositories\OrderRepository;
use Illuminate\Support\Facades\Auth;
use App\Domain\Order\Actions\CalculateDiscountAction;

class CreateOrderAction
{
    protected OrderRepository $orderRepository;    
    protected CalculateDiscountAction $calculateDiscountAction;

    public function __construct (
        OrderRepository $orderRepository,
        CalculateDiscountAction $calculateDiscountAction
    )
    {
        $this->orderRepository = $orderRepository;
        $this->calculateDiscountAction = $calculateDiscountAction;
    }

    public function execute($data)
    {   
        if($data->attributes()['payment_type_id'] === Order::PAYMENT_TYPE_PIX ) {
            dd($this->calculateDiscountAction->execute(1.000));
        }
/*|| 
        ($data->attributes()['payment_type_id'] === Order::PAYMENT_TYPE_CREDIT_CARD &&
         $data->attributes()['installment'] === 1)*/
        

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
