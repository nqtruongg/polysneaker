<?php

namespace App\Http\Requests;
use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProductRequest extends FormRequest
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
        $id = request()->segment('4');
        return [
            'product_name' => ['required', 'string',
                Rule::unique($tableName)->ignore($id)],
            'price' => ['required', ' integer'],
            'describe' => ['nullable', 'string'],
//            'image' => ['nullable'],
//            'category_id' => ['required', 'integer'],
//            'size_id' => ['required', 'integer'],
//            'color_id' => ['required', 'integer'],
        ];
    }
}
