<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePlace extends FormRequest
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

    // Валидация запроса на обновление места размещения
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'type_id' => 'required|integer',
            'category_id' => 'required|integer',
            'slug' => 'required|string|max:255',
            'content' => 'required|nullable',
            'lat' => 'nullable',
            'lng' => 'nullable'
        ];
    }
}
