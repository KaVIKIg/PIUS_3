<?php

namespace App\Http\ApiV1\Modules\Customers\Requests;

use App\Http\ApiV1\Support\Requests\BaseFormRequest;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class PatchCustomerRequest extends BaseFormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['string', 'required'], 
            'purchased' => ['integer', 'required'],
            'discount' => ['integer', 'required'],
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $errors = $validator->errors();

        throw new HttpResponseException(response()->json(["code" => 400, "message" => $errors], 400));
    }
}
