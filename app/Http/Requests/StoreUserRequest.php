<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
    public function rules()
    {
        return [
            //'name' => 'required|string|max:255',
            'email' => 'required|email',
            'password' => 'required',
            'device_name' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => [
                'en' => 'Name is required to be filled in.',
                'es' => 'Es obligatorio rellenar el nombre.',
                'de' => 'Der Name muss angegeben werden.',
                'fr' => 'Le nom doit être renseigné.',
                'ru' => 'Имя обязательно для заполнения.'
            ],
            'email.required' => [
                'en' => 'E-mail is required to be filled in.',
                'es' => 'Es obligatorio rellenar el correo electrónico.',
                'de' => 'Der E-mail muss angegeben werden.',
                'fr' => 'L\'adresse électronique doit être remplie.',
                'ru' => 'E-mail обязательно для заполнения.'
            ],
            'email.email' => [
                'en' => 'Enter a valid email address.',
                'es' => 'Introduzca una dirección de correo electrónico válida.',
                'de' => 'Geben Sie eine gültige E-Mail Adresse ein.',
                'fr' => 'Saisissez une adresse électronique valide.',
                'ru' => 'Введите корректный адрес электронной почты.'
            ],
            'password.required' => [
                'en' => 'Password is required to be filled in.',
                'es' => 'Es necesario rellenar la contraseña.',
                'de' => 'Das Passwort muss eingegeben werden.',
                'fr' => 'Le mot de passe est obligatoire.',
                'ru' => 'Пароль обязательно для заполнения.'
            ],
            'device_name.required' => [
                'en' => 'Device name is required to be filled in.',
                'es' => 'Es obligatorio rellenar el nombre del dispositivo.',
                'de' => 'Der device name muss angegeben werden.',
                'fr' => 'Le nom de l\'appareil doit être renseigné.',
                'ru' => 'Имя устройства обязательно для заполнения.'
            ],
        ];
    }
}
