<?php
namespace App\Domain\Order\Actions;

use App\Domain\Order\Models\Order;
use App\Domain\Order\Repositories\OrderRepository;
use Illuminate\Support\Facades\Auth;
use App\Domain\Order\Actions\CalculateDiscountAction;
use App\Domain\Product\Actions\GetProductByIdAction;

class CreateOrderAction
{
    protected OrderRepository $orderRepository;    
    protected CalculateDiscountAction $calculateDiscountAction;
    protected CalculateInterestAction $calculateInterestAction;
    protected GetProductByIdAction $getProductByIdAction;

    public function __construct (
        OrderRepository $orderRepository,
        CalculateDiscountAction $calculateDiscountAction,
        CalculateInterestAction $calculateInterestAction,
        GetProductByIdAction $getProductByIdAction
    )
    {
        $this->orderRepository = $orderRepository;
        $this->calculateDiscountAction = $calculateDiscountAction;
        $this->calculateInterestAction = $calculateInterestAction;
        $this->getProductByIdAction = $getProductByIdAction;
    }

    public function execute($data)
    {   
        $product = $this->getProductByIdAction->execute($data->attributes()['id_product']);
        
        if($data->attributes()['payment_type_id'] === Order::PAYMENT_TYPE_CREDIT_CARD &&
         $data->attributes()['installment'] > 1) {
            $value = $this->calculateInterestAction->execute(floatval($product->price), $data->attributes()['installment']);
        } else {
            $value = $this->calculateDiscountAction->execute(floatval($product->price));
        }        
        $finalValue = $this->formatValuetoReal($value);
        dd($finalValue);
        return $this->orderRepository->create([                        
            'payment_type_id' => $data->attributes()['payment_type_id'],
            'name' => $data->attributes()['name'],
            'card_number' => $data->attributes()['card_number'],
            'valid_date' => $data->attributes()['valid_date'],
            'cvv' => $data->attributes()['cvv'],
            'value' => $finalValue,
            'installment' => $data->attributes()['installment'],
            'user_id' => 2
        ]);
    }

    public function formatValuetoReal(float $value): string {
        return number_format($value, 3, '.', ',');
    }
}
