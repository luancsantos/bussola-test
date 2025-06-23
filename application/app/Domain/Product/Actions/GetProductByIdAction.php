<?php
namespace App\Domain\Product\Actions;

use App\Domain\Product\Repositories\ProductRepository;

class GetProductByIdAction
{
    protected ProductRepository $productRepository;    

    public function __construct (
        ProductRepository $productRepository        
    )
    {
        $this->productRepository = $productRepository;        
    }

    public function execute($id): object
    {   
        return $this->productRepository->find($id);;
    }
}
