<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\User;
use Illuminate\Support\Facades\Log;

class ModifyOrgRequest extends FormRequest
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
        $org = User::where('id', '=', $this->idOrg)->first();
        $validationArray = array();
        if ($org->nomeutente != $this->nomeutente) {
            $validationArray['nomeutente'] = 'required|unique:users';
        } else {
            $validationArray['nomeutente'] = 'required';
        }
        if ($org->email != $this->email) {
            $validationArray['email'] = 'required|email|unique:users';
        } else {
            $validationArray['email'] = 'required';
        }
        $validationArray['orgnaizzazione'] = 'required';
        return $validationArray;
    }
}
