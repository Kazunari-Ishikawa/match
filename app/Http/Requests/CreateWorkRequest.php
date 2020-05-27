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
            'max_price' => 'required_if:type,1',
            'min_price' => 'required_if:type,1',
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
            'max_price.gt' => '最大金額は最小金額より大きい数字を設定してください。',
        ];
    }

    /**
     * バリデータインスタンスの設定
     *
     * @param  \Illuminate\Validation\Validator  $validator
     * @return void
     */
    public function withValidator($validator)
    {
        // 案件種別が単発の場合、最小金額に対するvalidationを追加
        $validator->sometimes('min_price', 'required_with:max_price|numeric|min:1', function($input){
            return $input->type === 1;
        });

        // 案件種別が単発の場合、最大金額に対するvalidationを追加
        $validator->sometimes('max_price', 'required_with:min_price|numeric|min:1', function($input){
            return $input->type === 1;
        });

        // 案件種別が単発かつ両金額がnullでない場合、最大金額に対するvalidationを追加
        $validator->sometimes('max_price', 'gt:min_price', function($input){
            return $input->type === 1 && $input->min_price !== null && $input->max_price !== null;
        });
    }
}
