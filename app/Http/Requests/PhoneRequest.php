<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PhoneRequest extends FormRequest
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
            'brand' => 'required',
            'name' => 'required|max:255|min:3',
            'release' => 'required',
            'chipset' => 'required|max:255',
            'quantity' => 'required|integer|max:255|min:3',
            'price' => 'required|integer',
        ];
    }
}
