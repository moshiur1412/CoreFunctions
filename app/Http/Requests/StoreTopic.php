<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTopic extends FormRequest
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
        // dd($this->method());
        switch($this->method()){
            case 'POST':
                {
                    return [
                        'title' => 'required|max:255|min:5',
                        'body' => 'required|max:2000|min:5'
                    ];
                }
            case 'PATCH':
                {
                    return [
                        'title' => 'required|max:255'
                    ];
                }
            default:break;
        }
       
    }


    public function withValidator(){

        \Log::info('Req=API/StorePost@withValidator Called');
    }
}
