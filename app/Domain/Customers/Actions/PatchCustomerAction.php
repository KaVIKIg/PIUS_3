<?php

namespace App\Domain\Customers\Actions;

use App\Domain\Customers\Models\Customer;

class PatchCustomerAction
{
    public function execute(int $customerId, array $fields): Customer
    {
        $customer = Customer::findOrFail($customerId);
        $customer->update($fields);
        $customer->save();
        return $customer;
    }
}
