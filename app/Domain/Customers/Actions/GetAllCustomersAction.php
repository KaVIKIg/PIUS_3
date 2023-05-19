<?php

namespace App\Domain\Customers\Actions;

use App\Domain\Customers\Models\Customer;

class GetAllCustomersAction
{
    public function execute(): array
    {
        return Customer::all()->toArray();
    }
}
