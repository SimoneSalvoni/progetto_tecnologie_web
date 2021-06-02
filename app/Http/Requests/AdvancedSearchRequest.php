<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdvancedSearchRequest extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'reg' => '',
            'org' => '',
            'desc' => '',
            'month'=> 'required_with:year',
            'year' => 'required_with:month'
        ];
    }

}
