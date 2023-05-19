<?php

namespace App\Domain\Customers\Actions;

use App\Domain\Customers\Models\Customer;

class GetCustomerAction
{
    public function execute(int $customerId): Customer
    {
        return Customer::findOrFail($customerId);
    }
}
