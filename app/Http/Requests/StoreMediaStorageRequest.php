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
            'file' => ['required', 'file', 'mimes:jpeg,jpg,png,svg', 'max:5120'],
            'category_id' => ['required', 'uuid', 'exists:media_storage_categories,id'],
        ];
    }

    public function messages(): array
    {
        return [
            /* file field */
            'file.required' => ErrorMessages::generate('field.required', ['field' => 'File']),
            'file.file' => ErrorMessages::generate('field.file', ['field' => 'File']),
            'file.mimes' => ErrorMessages::generate('field.mimes', ['mimes' => 'jpeg, jpg, png, svg']),
            'file.max' => ErrorMessages::generate('file.max', ['count' => '5']),

            /* category_id field */
            'category_id.required' => ErrorMessages::generate('field.required', ['field' => 'Category']),
            'category_id.exists' => ErrorMessages::generate('field.exists'),
        ];
    }
}
