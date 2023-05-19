<?php

//namespace App\Domain\Customers\Models;
use Tests\TestCase;
use App\Domain\Customers\Models\Customer;
use function PHPUnit\Framework\assertEquals;


class CustomerTest extends TestCase
{
    
    public function testPatchCustomer()
    {
        $data = [
            'name' => 'Customer Customer Customer',
            'purchased' => 50,
            'discount' => 15,
           
        ];

        $customer = Customer::create($data);

        $data = [
            'name' => 'Customer Customer Customer1',
            'purchased' => 58,
            'discount' => 15,
            
        ];

        $response = $this->json('PATCH', '/api/v1/customers/' . $customer->id, $data);

        $response->assertStatus(200);

        $customer->delete($customer->id);
    }

    public function testDeleteCustomer()
    {
        $data = [
            'name' => 'Customer Customer Customer',
            'purchased' => 50,
            'discount' => 15,
        ];

        $customer = Customer::create($data);

        $response = $this->json('DELETE', '/api/v1/customers/' . $customer->id);

        $response->assertStatus(200);
        $this->assertDatabaseMissing('customers', ['id' => $customer->id]);

        $customer->delete($customer->id);
    }


    public function testGetByIdCustomer()
    {
        $data = [
            'name' => 'customer Customer Customer',
            'purchased' => 50,
            'discount' => 15,
        ];

        $customer = Customer::create($data);

        $response = $this->json('get', '/api/v1/customers/' . $customer->id);

        $response->assertStatus(200);

        $customer->delete($customer->id);
    }

    public function testGetCustomer()
    {
        $data = [
            'name' => 'Customer Customer Customer',
            'purchased' => 50,
            'discount' => 15,
        ];

        $customer = Customer::create($data);
        $response = $this->json('get', '/api/v1/customers/');

        $response->assertStatus(200);

        $customer->delete($customer->id);
    }
}
