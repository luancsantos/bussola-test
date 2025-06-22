<?php

namespace App\Domain\Product\Repositories;

use App\Domain\Product\Models\Product;
use App\Repositories\Repository;
use Illuminate\Support\Facades\Auth;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class ProductRepository extends Repository
{
    /**
     * @inheritDoc
     */
    public function model()
    {
        return Product::class;
    }

    public function all($columns = array('*'))
    {
        return QueryBuilder::for($this->model)->paginate($this->perPage);
    }

    public function find($ProductId, $columns = array('*'))
    {
        return QueryBuilder::for($this->model)
            ->select($columns)            
            ->where('id', '=', $ProductId)
            ->first();
    }
}
