<?php
namespace App\Domain\Order\Actions;

class CalculateInterestAction
{
    public function execute(float $value, int $intallments, float $taxInterest = 0.01): float
    {   
        return $value * pow(1 + $taxInterest, $intallments);        
    }    
}
