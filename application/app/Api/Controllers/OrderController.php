<?php

namespace App\Api\Controllers;

use App\Api\Resources\OrderResource;
use App\Domain\Order\Actions\CreateOrderAction;
use App\Domain\Order\Bags\OrderBag;
use App\Api\Requests\CreateOrderRequest;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected CreateOrderAction $createOrderAction;
    public function __construct(CreateOrderAction $createOrderAction)
    {
        $this->createOrderAction = $createOrderAction;
    }

    public function create(CreateOrderRequest $request)
    {      
        dd($request->name);
        return 1;
        // $positionBag = OrderBag::fromRequest($request);
        // return OrderResource::make($this->createOrderAction->execute($positionBag));
    }
}
