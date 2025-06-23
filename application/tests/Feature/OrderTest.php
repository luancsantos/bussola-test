<?php

namespace Tests\Feature;

use Tests\TestCase;

class OrderTest extends TestCase
{
    protected function setUp(): void

    {
        parent::setUp();

        $this->transaction = [
            'payment_type_id' => 1,            
            'card_number'=> "4111111111111111",
            'name'=> "UNIX TIME",
            'valid_date'=> "0722",
            'cvv' => "711",
            'installment' => '2',
            'id_product' => 1
        ];
    }

    public function testCreateOrderSuccess(): void
    {
        
        $response = $this->withHeaders([
                'X-Header' => 'Value',
            ])->post(
                '/api/v1/orders', $this->transaction
            );

        $response->assertStatus(201);
    }

    public function testCreateOrderWithoutProduct()
    {
        unset($this->transaction['id_product']);

        $response = $this->withHeaders([
                'X-Header' => 'Value',
            ])->post(
                '/api/v1/orders', $this->transaction
            );

        $response->assertStatus(302);
    }

    public function testCreateOrderWithoutCredidCard()
    {
        unset($this->transaction['card_number']);

        $response = $this->withHeaders([
                'X-Header' => 'Value',
            ])->post(
                '/api/v1/orders', $this->transaction
            );

        $response->assertStatus(302);
    }

    public function testCreateOrderWithoutInstallment()
    {
        unset($this->transaction['installment']);

        $response = $this->withHeaders([
                'X-Header' => 'Value',
            ])->post(
                '/api/v1/orders', $this->transaction
            );

        $response->assertStatus(302);
    }

    public function testCreateOrderWithoutName()
    {
        unset($this->transaction['name']);

        $response = $this->withHeaders([
                'X-Header' => 'Value',
            ])->post(
                '/api/v1/orders', $this->transaction
            );

        $response->assertStatus(302);
    }

    public function testCreateOrderWithoutCardValid()
    {
        unset($this->transaction['valid_date']);

        $response = $this->withHeaders([
                'X-Header' => 'Value',
            ])->post(
                '/api/v1/orders', $this->transaction
            );

        $response->assertStatus(302);
    }

    public function testCreateOrderWithoutPaymentType()
    {
        unset($this->transaction['payment_type_id']);

        $response = $this->withHeaders([
                'X-Header' => 'Value',
            ])->post(
                '/api/v1/orders', $this->transaction
            );

        $response->assertStatus(302);
    }

    public function testCreateOrderWithoutData()
    {
        unset($this->transaction['payment_type_id']);

        $response = $this->withHeaders([
                'X-Header' => 'Value',
            ])->post(
                '/api/v1/orders' 
            );

        $response->assertStatus(302);
    }

    public function testCreateOrderWithGetMethod()
    {
        $response = $this->withHeaders([
                'X-Header' => 'Value',
            ])->get(
                '/api/v1/orders' 
            );

        $response->assertStatus(405);
    }
}
