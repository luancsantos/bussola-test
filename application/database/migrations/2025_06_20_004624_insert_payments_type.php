<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Domain\PaymentType\Models\PaymentType;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        PaymentType::create(['name' => 'Pix', 'max_installment' => '1']);
        PaymentType::create(['name' => 'Cartão de Crédito', 'max_installment' => '12']);
    }   
};
