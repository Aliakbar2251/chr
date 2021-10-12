<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PassportRequest extends FormRequest
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
            'name' => 'required|alpha|max:100',
            'surname' => 'required|alpha|max:100',
            'patronymic' => 'required|alpha|max:100',
            'birthday' => 'required|string|max:100',
            'blood_group_type' => 'required|string|max:20',
            'gender_type' => 'required|alpha|max:20',
            'contractor_id' => 'required|int|max:100',
            'nationality_id' => 'required|int|max:100',
            'country_id' => 'required|int|max:100',
            'national_id' => 'required|int',
            'is_main' => 'required|boolean'
        ];
    }
}
