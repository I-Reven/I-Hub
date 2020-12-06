<?php

namespace IRaven\IAdmin\Infra\Http\Requests;

use Dotenv\Exception\ValidationException;
use Exception;
use Illuminate\Contracts\Validation\Validator;
use IRaven\IAdmin\Domain\Exceptions\ValidatorException;

/**
 * Class Ping
 * @package IRaven\IAdmin\Infra\Http\Requests
 */
class SignupRequest extends BaseRequest
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
            'email' => 'required|unique:users|max:255',
            'name' => 'required|max:255',
            'password' => 'required|max:255',
        ];
    }

    /**
     * @param Validator $validator
     * @throws ValidatorException
     */
    protected function failedValidation(Validator $validator){
        throw new ValidatorException($validator);
    }
}
