<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
        switch ($this->method()) {
            case 'GET':
            case 'DELETE':
                return [];
            case 'POST': {
                return [
                    'title' => 'required|min:10',
                    'expiration_date' => 'date|after:today',
                    'subcategory_id' => 'required',
                    'province_id' => 'required',
                    'job_type_id' => 'required',
                    'subcategory_id' => 'required',
                    // 'external_link' => 'required',
                    'max_salary' => 'gte:min_salary',
                    'description' => 'required|min:55',
                ];
            }
            case 'PUT': {
                return [
                    'title' => 'required|min:10',
                    'expiration_date' => 'date|after:today',
                    'subcategory_id' => 'required',
                    'province_id' => 'required',
                    'job_type_id' => 'required',
                    'subcategory_id' => 'required',
                    // 'external_link' => 'required',
                    'max_salary' => 'gte:min_salary',
                    'description' => 'required|min:55',
                ];
            }
        }
    }
}
