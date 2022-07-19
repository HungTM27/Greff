<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OccupatonUpdateRequest extends FormRequest
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
            'title' => 'required',
            'description' => 'required',
            'work_address' => 'required',
            'access_address' => 'required',
//            'file.*'=>'mimes:jpeg,jpg,png,gif,csv,txt,pdf',
        ];
    }

    public function messages()
    {
        return [

        ];
    }
}
