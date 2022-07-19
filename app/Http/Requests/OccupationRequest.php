<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OccupationRequest extends FormRequest
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
            'id_job_category' => 'required',
            'title' => 'required',
            'description' => 'required',
            'work_address' => 'required',
            'access_address' => 'required',
            'file' => 'required',
//            'file.*'=>'mimes:jpeg,jpg,png,gif,csv,txt,pdf',
        ];
    }

    public function messages()
    {
        return [
            'file.min'=> 'please upload at least 3 photos',

        ];
    }
}
