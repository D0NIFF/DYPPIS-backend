<?php

namespace App\Http\Requests\ProductService;

use App\Http\Controllers\Api\V1\RequestFormMessageController;
use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'title' => 'required|string|max:150',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'old_price' => 'numeric|nullable',
            'response_id' => 'uuid|nullable',
            'platform_id' => 'required|uuid',
            'category_id' => 'required|uuid',
            'delivery_id' => 'required|uuid',
            'filters' => 'required|array',
        ];
    }


    public function messages(): array
    {
        return [
            'title.required' => RequestFormMessageController::fieldRequired('title'),
            'description.required' => RequestFormMessageController::fieldRequired('description'),
            'price.required' => RequestFormMessageController::fieldRequired('price'),
            'old_price.numeric' => RequestFormMessageController::fieldRequired('old_price'),

            'platform_id.required' => RequestFormMessageController::fieldRequired('platform_id'),
            'platform_id.uuid' => RequestFormMessageController::fieldUuid('platform_id'),

            'category_id.required' => RequestFormMessageController::fieldRequired('category_id'),
            'category_id.uuid' => RequestFormMessageController::fieldUuid('category_id'),

            'delivery_id.required' => RequestFormMessageController::fieldRequired('delivery_id'),
            'delivery_id.uuid' => RequestFormMessageController::fieldUuid('delivery_id'),

            'filters.required' => RequestFormMessageController::fieldRequired('filters'),
        ];
    }
}
