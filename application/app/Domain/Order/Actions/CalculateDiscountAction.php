<?php
namespace App\Domain\Order\Actions;

class CalculateDiscountAction
{
    public function execute(float $value): float
    {   
        $disccount = $value * 0.10;
        return $disccount - $disccount;
    }
    
}
