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
            'slug' => 'required|string|unique:platforms,slug',
            'title' => 'required|string',
            'image' => 'required|uuid|exists:product_media_storage,id',
            'banner' => 'required|uuid|exists:product_media_storage,id',
            'type_id' => 'required|uuid|exists:platform_types,id',
        ];
    }


    /**
     *  @return array
     */
    public function messages(): array
    {
        return [
            'slug.required' => ErrorMessageController::fieldRequired('slug'),
            'slug.unique' => ErrorMessageController::fieldUnique('slug'),

            'title.required' => ErrorMessageController::fieldRequired('title'),

            'image_id.required' => ErrorMessageController::fieldRequired('image_id'),
            'image_id.uuid' => ErrorMessageController::fieldUuid('image_id'),
            'image_id.exists' => ErrorMessageController::fieldExists('image_id'),

            'type_id.required' => ErrorMessageController::fieldRequired('type_id'),
            'type_id.uuid' => ErrorMessageController::fieldUuid('type_id'),
            'type_id.exists' => ErrorMessageController::fieldExists('type_id'),

            'banner_id.required' => ErrorMessageController::fieldRequired('banner_id'),
            'banner_id.uuid' => ErrorMessageController::fieldUuid('banner_id'),
            'banner_id.exists' => ErrorMessageController::fieldExists('banner_id'),
        ];
    }
}
