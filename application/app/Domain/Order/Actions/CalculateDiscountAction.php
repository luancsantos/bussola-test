<?php
namespace App\Domain\Order\Actions;

class CalculateDiscountAction
{
    public function execute(float $value): string
    {   
        $disccount = $value * 0.10;
        return $this->formatValuetoReal($value - $disccount);        
    }

    function formatValuetoReal(float $value): string {
        return number_format($value, 3, '.', ',');
    }    
}
