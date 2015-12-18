<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Auth;

class UpdateDeviceRequest extends Request
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
            'name' => 'required|min:2',
            'model' => 'required|min:2',
            'brand' => 'required|min:2',
            'serial' => 'required|min:5',
            'description' => 'min:5',
            'type_id' => 'required',
            'location_id' => 'required',
        ];
    }
}
