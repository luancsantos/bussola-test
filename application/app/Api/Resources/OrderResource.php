<?php

namespace App\Api\Resources;

use App\Domain\Order\Bags\OrderBag;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    public function toArray($request)
    {
        /** @var Order $this */

        return [
            'id' => $this->id,
            'payment_type_id' => $this->payment_type_id,
            'name' => $this->name,
            'card_number' => $this->card_number,
            'valid_date' => $this->valid_date,
            'cvv' => $this->cvv,
            'installment' => $this->installment,
            'id_product' => $this->id_product,
        ];
    }
}
