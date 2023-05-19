<?php

namespace App\Domain\Customers\Actions;

use App\Domain\Customers\Models\Customer;

class CreateCustomerAction
{
    public function execute(array $fields): Customer
    {
        return Customer::create($fields);
    }
}
