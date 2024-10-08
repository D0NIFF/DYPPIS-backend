<?php

namespace App\Http\Requests\ProductService;

use App\Http\Controllers\Api\V1\ErrorMessageController;
use Illuminate\Foundation\Http\FormRequest;

class StorePlatformRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'slug' => 'required|string|unique:platforms,slug',
            'title' => 'required|string',
            'image_id' => 'required|uuid|exists:images,id',
            'banner_id' => 'required|uuid|exists:images,id',
            'type_id' => 'required|uuid|exists:product_types,id',
        ];
    }


    /**
     *  @return array
     */
    public function messages(): array
    {
        return [
            'slug.required' => ErrorMessageController::fieldRequired('slug'),

            'title.required' => ErrorMessageController::fieldRequired('title'),

            'image_id.required' => ErrorMessageController::fieldRequired('image_id'),

            'type_id.required' => ErrorMessageController::fieldRequired('type_id'),

            'banner_id.required' => ErrorMessageController::fieldRequired('banner_id'),

        ];
    }
}
