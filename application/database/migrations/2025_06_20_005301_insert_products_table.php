<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Domain\Product\Models\Product;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Product::create(['name' => 'Iphone 16', 'price' => '5.000']);
        Product::create(['name' => 'Iphone 16 Pro Max', 'price' => '15.000']);
        Product::create(['name' => 'Iphone 16 Pro', 'price' => '10.000']);
        Product::create(['name' => 'Iphone 15', 'price' => '4.000']);
        Product::create(['name' => 'Iphone 14', 'price' => '3.000']);
    }
};
