<?php

namespace App\Http\Requests;
use App\Models\Product;
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $tableName = (new Product())->getTable();
        return [
            'product_name' => 'required|string|unique:' . $tableName,
            'price' => 'required|integer',
            'describe' => 'nullable|string',
            'image' => 'nullable',
            'category_id' => 'required',
            'size_id' => 'nullable',
            'color_id' => 'nullable',
        ];
    }
}
