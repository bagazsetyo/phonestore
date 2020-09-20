<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GallerieRequest extends FormRequest
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
            // 'photo' => 'required|image|mimes:jpeg,png,jpg|max:204',
            'photo' => 'required|image|mimes:jpeg,png,jpg',
        ];
    }
}
