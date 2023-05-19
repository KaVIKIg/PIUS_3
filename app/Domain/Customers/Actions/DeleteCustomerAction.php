<?php

namespace App\Domain\Customers\Actions;

use App\Domain\Customers\Models\Customer;

class DeleteCustomerAction
{
    public function execute(int $customerId): void
    {
        $customer = Customer::findOrFail($customerId);
        $customer->delete();
    }
}
