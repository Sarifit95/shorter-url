<?php

namespace App\Http\Requests;

use App\Http\Traits\HttpResponses;
use App\Models\User;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class GetUrlRequest extends FormRequest
{
    use HttpResponses;
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'url' => ['required', 'active_url'],
        ];
    }
    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            $this->sendError('Validation errors.', ['error'=>$validator->errors()])
        );

    }

    public function messages()
    {
        return [

        ];
    }
}
