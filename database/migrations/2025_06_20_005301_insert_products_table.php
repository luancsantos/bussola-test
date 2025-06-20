<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Domain\Product\Models\Products;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Products::create(['name' => 'Iphone 16', 'price' => '5000']);
        Products::create(['name' => 'Iphone 16 Pro Max', 'price' => '15000']);
        Products::create(['name' => 'Iphone 16 Pro', 'price' => '10000']);
        Products::create(['name' => 'Iphone 15', 'price' => '4000']);
        Products::create(['name' => 'Iphone 14', 'price' => '3000']);
    }
};
