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
            'type' => 'required|boolean',
            'category' => 'required|numeric|between:1,8',
            'max_price' => 'required|numeric|gt:min_price',
            'min_price' => 'required|numeric|min:1000',
            'content' => 'required|string',
        ];
    }
}
