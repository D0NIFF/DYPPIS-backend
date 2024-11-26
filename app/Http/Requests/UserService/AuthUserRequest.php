<?php

namespace App\Http\Requests\UserService;

use App\Http\Controllers\Api\V1\Response\RequestFormMessageController;
use App\Utils\ErrorMessages;
use Illuminate\Foundation\Http\FormRequest;

class AuthUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //'name' => 'required|string|max:255',
            'email' => 'required|email',
            'password' => 'required',
            'device_name' => 'required',
        ];
    }

    public function messages() : array
    {
        return [
            'name.required' => ErrorMessages::getMessages('field.required', 'name'),
            'email.required' => ErrorMessages::getMessages('field.required', 'email'),
            'email.email' => ErrorMessages::getMessages('field.email', 'name'),
            'password.required' => ErrorMessages::getMessages('field.required', 'password'),
            'device_name.required' => ErrorMessages::getMessages('field.required', 'device_name'),
        ];
    }
}
