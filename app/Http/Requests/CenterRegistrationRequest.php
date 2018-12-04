<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CenterRegistrationRequest extends FormRequest
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
            'name'  => "required|string",
            'support_duration' => "required|integer",
            'barangay_id' => "required|integer",
            'infrastructure_id' => "required|integer",
            'has_electricity_supply' => "required",
            'has_water_supply' => "required",
        ];
    }
}
