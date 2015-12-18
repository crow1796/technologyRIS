<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Auth;

class UpdateUserRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email'     => 'required|email|max:255',
            'firstname' => 'required|min:2',
            'middlename' => 'required|min:2',
            'lastname' => 'required|min:2',
        ];
    }
}
