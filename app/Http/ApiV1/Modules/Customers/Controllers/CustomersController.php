<?php

namespace App\Http\ApiV1\Modules\Customers\Controllers;

use App\Domain\Customers\Actions\CreateCustomerAction;
use App\Domain\Customers\Actions\DeleteCustomerAction;
use App\Domain\Customers\Actions\GetAllCustomersAction;
use App\Domain\Customers\Actions\GetCustomerAction;
use App\Domain\Customers\Actions\ReplaceCustomerAction;
use App\Domain\Customers\Actions\PatchCustomerAction;

use App\Http\ApiV1\Modules\Customers\Requests\CreateCustomerRequest;
use App\Http\ApiV1\Modules\Customers\Requests\PatchCustomerRequest;

use App\Http\ApiV1\Modules\Customers\Resources\CustomerResource;
use App\Http\ApiV1\Support\Resources\EmptyResource;
use Illuminate\Database\Eloquent\ModelNotFoundException;

use Illuminate\Http\Request;


class CustomersController 
{
    public function index(GetAllCustomersAction $action)
    {
        $customers = $action->execute();
        return response()->json(["data" => $customers]);
    }

    public function create(CreateCustomerRequest $request, CreateCustomerAction $action)
    {
        
        return new CustomerResource($action->execute($request->validated()));
    }

    public function get(int $customerId, GetCustomerAction $action)
    {
        try {
            $customer = $action->execute($customerId);
            
        } catch(ModelNotFoundException) {
            return response()->json(["code" => 404,"message" => "Customer not found"], 404);
        }
        if ($customer) {
        return new CustomerResource($customer);
        }
    }

    public function patch(int $customerId, PatchCustomerAction $action, PatchCustomerRequest $request)
    {
        try {
            return new CustomerResource($action->execute($customerId, $request->validated()));
        } catch (ModelNotFoundException) {
            return response()->json(["code" => 404, "message" => "Customer not found"], 404);
        }
        
    }

    public function delete(int $customerId, DeleteCustomerAction $action)
    {
        try {
            $action->execute($customerId);
            return new EmptyResource();
        } catch(ModelNotFoundException) {
            return response()->json(["code" => 404, "message" => "Customer not found"], 404);
        }
        
    }
}
