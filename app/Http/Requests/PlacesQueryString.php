<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlacesQueryString extends FormRequest
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
     * Places Query String Validation
     *
     * @return array
     */
    public function rules()
    {
        return [
            't' => 'nullable|integer',  // Type
            'r' => 'nullable|integer',  // Region
            'p' => 'nullable|string'    // Properties
        ];
    }
}
