<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateWorkRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|string|max:30',
            'type' => 'required|numeric|between:1,2',
            'category_id' => 'required|numeric|between:1,7',
            'max_price' => 'required_if:type,1|nullable|numeric|min:1|gt:min_price',
            'min_price' => 'required_if:type,1|nullable|numeric|min:1',
            'content' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'type.between' => '案件種別は必ず指定してください。',
            'category_id.between' => 'カテゴリは必ず指定してください。',
            'max_price.required_if' => '単発案件の場合、最大金額を指定してください。',
            'min_price.required_if' => '単発案件の場合、最小金額を指定してください。',

        ];
    }
}
