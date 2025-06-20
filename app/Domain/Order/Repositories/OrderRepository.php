<?php

namespace App\Domain\Order\Repositories;

use App\Domain\Order\Models\Order;
use App\Repositories\Repository;
use Spatie\QueryBuilder\QueryBuilder;

class OrderRepository extends Repository
{
    /**
     * @inheritDoc
     */
    public function model()
    {
        return Order::class;
    }

    public function all($columns = array('*'))
    {
        return QueryBuilder::for($this->model)->paginate($this->perPage);
    }

    public function find($OrderId, $columns = array('*'))
    {
        return QueryBuilder::for($this->model)
            ->select($columns)            
            ->where('id', '=', $OrderId)
            ->first();
    }
}
