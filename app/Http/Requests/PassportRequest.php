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
            'name'             => 'required|string|max:50',
            'surname'          => 'required|string|max:50',
            'patronymic'       => 'required|string|max:50',
            'birthday'         => 'required|date|date_format:Y-m-d|max:100',
            'blood_group_type' => 'required|string|max:20|exists:blood_groups,type',
            'gender_type'      => 'required|alpha|max:20|exists:genders,type',
            'contractor_id'    => 'required|int|max:10|exists:contractors,id',
            'nationality_id'   => 'required|int|max:10|exists:nationalities,id',
            'country_id'       => 'required|int|max:10|exists:countries,id',
            'national_id'      => 'required|int',
            'is_main'          => 'required|boolean'
        ];
    }
}
