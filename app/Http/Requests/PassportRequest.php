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
            'name'             => 'required|alpha|max:50',
            'surname'          => 'required|alpha|max:50',
            'patronymic'       => 'required|alpha|max:50',
            'birthday'         => 'required|date|date_format:Y-m-d|max:100',
            'blood_group_type' => 'required|string|exists:blood_groups,type',
            'gender_type'      => 'required|alpha|exists:genders,type',
            'contractor_id'    => 'required|int|exists:contractors,id',
            'nationality_id'   => 'required|int|exists:nationalities,id',
            'country_id'       => 'required|int|exists:countries,id',
            'national_id'      => 'required|int',
            'is_main'          => 'required|boolean'
        ];
    }
}
