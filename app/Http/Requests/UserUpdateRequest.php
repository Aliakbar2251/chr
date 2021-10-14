<?php

namespace App\Http\Requests;

use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

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
        $user = User::findOrFail($this->user_id);
        return [
            'full_name' => ['required','regex:/^[\pL\s\-]+$/u','max:255','min:5'],
            'email'     => ['required' , Rule::unique('users')->ignore($user)],
            'password'  => ['required', Password::min(8)->letters()->symbols()->numbers()->uncompromised()->mixedCase()],
        ];
    }
}

