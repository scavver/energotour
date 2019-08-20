<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccommodationCatalogueQueryString extends FormRequest
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

    // Валидация переменных строки запроса на странице всех мест размещения - "Санатории и отели"
    public function rules()
    {
        return [
            'selectedType' => 'nullable|integer',
            'selectedCategory' => 'nullable|integer',
            'checkedProperties' => 'nullable|string'
        ];
    }
}
