<?php

namespace App\Http\Requests;

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
    public function rules()
    {
        return [
            'name' => 'required|max:255|min:10',
            'email' => 'required|email|min:10|max:100|unique:users,email',
            'password' => 'required|min:5|max:255',
        ];
    }

    public function withValidator(){
        \Log::info("Req=StoreUser@withValidator Called");
    }
}
