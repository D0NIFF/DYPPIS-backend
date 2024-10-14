<?php

namespace App\Http\Requests\ProductService;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePlatformRequest extends FormRequest
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
            'slug' => 'string|unique:platforms,slug',
            'title' => 'string',
            'image' => 'file|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'banner' => 'file|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'type_id' => 'uuid|exists:platform_types,id',
        ];
    }


}
