<?php

namespace App\Http\Requests\ProductService;

use App\Http\Controllers\Api\V1\RequestFormMessageController;
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
            'image' => 'required|file|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'banner' => 'required|file|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'type_id' => 'required|uuid|exists:platform_types,id',
        ];
    }


    /**
     *  @return array
     */
    public function messages(): array
    {
        return [
            'slug.required' => RequestFormMessageController::fieldRequired('slug'),
            'slug.unique' => RequestFormMessageController::fieldUnique('slug'),

            'title.required' => RequestFormMessageController::fieldRequired('title'),

            'image_id.required' => RequestFormMessageController::fieldRequired('image_id'),
            'image_id.uuid' => RequestFormMessageController::fieldUuid('image_id'),
            'image_id.exists' => RequestFormMessageController::fieldExists('image_id'),

            'type_id.required' => RequestFormMessageController::fieldRequired('type_id'),
            'type_id.uuid' => RequestFormMessageController::fieldUuid('type_id'),
            'type_id.exists' => RequestFormMessageController::fieldExists('type_id'),

            'banner_id.required' => RequestFormMessageController::fieldRequired('banner_id'),
            'banner_id.uuid' => RequestFormMessageController::fieldUuid('banner_id'),
            'banner_id.exists' => RequestFormMessageController::fieldExists('banner_id'),
        ];
    }
}
