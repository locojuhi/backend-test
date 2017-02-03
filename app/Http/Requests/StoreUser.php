<?php

namespace Backend\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUser extends FormRequest
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
    public function rules(){
        return [
            'first_name' => 'required|alpha|max:50',
            'last_name' => 'required|alpha|max:50',
            'email' => 'required|unique:users,email|email|max:150',
            'password' => 'required|min:6|max:16',
            'repassword' => 'required|same:password',
        ];
    }
}
