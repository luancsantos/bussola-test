<?php

namespace App\Api\Controllers;

use App\Api\Resources\OrderResource;
use App\Domain\Order\Actions\CreateOrderAction;
use App\Domain\Order\Bags\OrderBag;
use App\Api\Requests\CreateOrderRequest;

class OrderController extends Controller
{
    protected CreateOrderAction $createOrderAction;
    public function __construct(CreateOrderAction $createOrderAction)
    {
        $this->createOrderAction = $createOrderAction;
    }

    public function create(CreateOrderRequest $request)
    {   
        $positionBag = OrderBag::fromRequest($request);
        return OrderResource::make($this->createOrderAction->execute($positionBag));
    }
}
