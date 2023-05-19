<?php

namespace App\Http\ApiV1\Modules\Reviews\Requests;

use App\Http\ApiV1\Support\Requests\BaseFormRequest;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class PatchReviewRequest extends BaseFormRequest
{
    public function rules(): array
    {
        return [
            
            'name' => ['string', 'required'],
            'description' => ['string', 'required'], 
            'like' => ['integer', 'required'],
            'dislike' => ['integer', 'required'],
            'customer_id' => ['exists:customers,id', 'required'],
           
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $errors = $validator->errors();

        throw new HttpResponseException(response()->json(["code" => 400, "message" => $errors], 400));
    }
}
