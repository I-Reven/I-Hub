<?php

namespace IRaven\IAdmin\Infra\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use IRaven\IAdmin\Domain\Exceptions\ValidatorException;
use Laravel\Fortify\Rules\Password;

/**
 * Class LoginRequest
 * @package IRaven\IAdmin\Infra\Http\Requests
 */
class LoginRequest extends BaseRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'email' => 'required|email|max:255',
            'password' => ['required', 'string', new Password],
            'remember_me' => 'boolean'
        ];
    }

    /**
     * @param Validator $validator
     * @throws ValidatorException
     */
    protected function failedValidation(Validator $validator)
    {
        throw new ValidatorException($validator);
    }
}
