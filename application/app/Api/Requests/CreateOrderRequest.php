<?php

namespace App\Api\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'payment_type_id' => 'required',
            'name' => 'required',
            'card_number' => 'required',
            'valid_date' => 'required',
            'cvv' => 'required',
            'installment' => 'required',
            'id_product' => 'required',            
        ];
    }
}
