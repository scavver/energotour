<?php

namespace App\Http\Requests;

use App\Rules\Recaptcha;
use Illuminate\Foundation\Http\FormRequest;

class StoreOrder extends FormRequest
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
            'hotel_id' => 'integer|required',
            'room_id' => 'integer|required',
            'arrival' => 'date|required',
            'departure' => 'date|required',
            'payer.first_name' => 'string|required',
            'payer.last_name' => 'string|required',
            'payer.phone_number' => 'string|between:9,20|required',
            'payer.email' => 'email|required',
            'comment' => 'nullable|string|max:2000',
            'tourists.*.first_name' => 'string|required',
            'tourists.*.last_name' => 'string|required',
            'tourists.*.date_of_birth' => 'date|required',
        ];
    }
}
