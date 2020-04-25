<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersUpdateRequest extends FormRequest
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
            'staff_id' => 'required|numeric',
            'name' => 'required',
            'username' => 'required|unique:users,username,'.$this->route('user'),
            'email' => 'required|email|unique:users,email,'.$this->route('user'),
        ];
    }
}
