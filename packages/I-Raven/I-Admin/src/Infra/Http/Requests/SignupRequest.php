<?php

namespace IRaven\IAdmin\Infra\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class Ping
 * @package IRaven\IAdmin\Infra\Http\Requests
 */
class SignupRequest extends FormRequest
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
}
