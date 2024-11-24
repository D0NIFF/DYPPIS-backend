<?php

namespace App\Http\Requests;

use App\Utils\ErrorMessages;
use Illuminate\Foundation\Http\FormRequest;

class StoreMediaStorageRequest extends FormRequest
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
            'file' => 'required|file|mimes:jpeg,jpg,png|max:2000',
            'category_id' => 'required|uuid|exists:media_storage_categories,id'
        ];
    }

    public function messages(): array
    {
        $errorMessages = new ErrorMessages();

        return [
            'file.required' => $errorMessages->getMessages('field.required', 'file'),
            'category_id.required' => $errorMessages->getMessages('field.required', 'category_id'),
        ];
    }
}
