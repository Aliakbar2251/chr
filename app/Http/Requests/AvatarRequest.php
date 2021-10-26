<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AvatarRequest extends FormRequest
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
            'avatar'        => 'required|image|mimes:jpeg,png,jpg|dimensions:ratio=1/1,min_height=800,min_width=800',
            'contractor_id' => 'required|exists:contractors,id'
        ];
    }
}
