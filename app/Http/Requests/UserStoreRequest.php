<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
            'name' => 'required|string|min:4',
            'username' => 'required|string|min:5',
            'email'=> 'required|string|email',
            'password'=> 'required',
            'divisi_id' => 'required|string',
            'level_id' => 'required|string',
            'hak_akses_id' => 'required|string'
        ];
    }
}
