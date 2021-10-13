<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserUpdateRequest extends FormRequest
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
        $user_id = $this->route('user_id');

        return [
            'full_name' => 'required|regex:/^[\pL\s\-]+$/u|max:255',
            'email' => 'required|unique:users,email,' . $user_id,
            'password' => 'required|min:8',
        ];
    }
}

