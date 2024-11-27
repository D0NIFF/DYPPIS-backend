<?php

namespace App\Http\Requests\UserService;

use App\Utils\ErrorMessages;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    /**
     *  Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     *  Get the validation rules that apply to the request.
     *
     *  @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'nickname' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:100'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'ip_address' => ['required', 'ip'],
            'seo_source' => ['nullable', 'string'],
        ];
    }

    public function messages(): array
    {
        return [
            'nickname.required' => ErrorMessages::generate('field.required', ['field' => 'Nickname']),
            'nickname.string' => ErrorMessages::generate('field.string', ['field' => 'Nickname']),
            'nickname.max' => ErrorMessages::generate('field.max', ['field' => 'Nickname', 'count' => '100']),

            'email.required' => ErrorMessages::generate('field.required', ['field' => 'E-mail']),
            'email.email' => ErrorMessages::generate('field.email', ['field' => 'E-mail']),
            'email.max' => ErrorMessages::generate('field.max', ['field' => 'E-mail', 'count' => '100']),

            'password.required' => ErrorMessages::generate('field.required', ['field' => 'Password']),
            'password.string' => ErrorMessages::generate('field.string', ['field' => 'Password']),
            'password.min' => ErrorMessages::generate('field.min', ['field' => 'Password', 'count' => '8']),
        ];
    }
}
