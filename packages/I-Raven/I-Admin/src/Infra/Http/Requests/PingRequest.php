<?php

namespace IRaven\IAdmin\Infra\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use IRaven\IAdmin\Domain\Exceptions\ValidatorException;

/**
 * Class Ping
 * @package IRaven\IAdmin\Infra\Http\Requests
 */
class PingRequest extends BaseRequest
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
            //
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
