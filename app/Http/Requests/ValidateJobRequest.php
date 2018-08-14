<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

/**
 * Before saving job into database, first we need to confirm the validity of the data.
 *
 * @package App\Http\Requests
 */
class ValidateJobRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|min:5|max:50',
            'service_id' => 'required|exists:services,id',
            'location_id' => 'required|exists:locations,id',
            'end_date' => 'required|date|after:today',
            'zipcode' => [
                'required',
                'regex:/^(?!01000|99999)(0[1-9]\d{3}|[1-9]\d{4})$/'
            ],
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'service_id.regex' => 'The given service is invalid',
            'location_id.regex' => 'The given location is invalid',
            'zipcode.regex' => 'Please provide us valid germany zipcode.',
        ];
    }

    /**
     * @param Validator $validator
     * @throws ValidationException
     */
    public function failedValidation(Validator $validator)
    {
        $json = [
            'status' => 'input_error',
            'errors' => $validator->getMessageBag()->toArray()
        ];

        throw new ValidationException($validator, new JsonResponse($json, 400));
    }
}
