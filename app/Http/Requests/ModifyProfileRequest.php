<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Symfony\Component\Console\Input\Input;

class ModifyProfileRequest extends FormRequest
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
        $user = Auth()->user();
        $validationArray = array();
        if ($user->nomeutente != $this->nomeutente) {
            $validationArray['nomeutente'] = 'required|unique:users';
        } else {
            $validationArray['nomeutente'] = 'required';
        }
        if ($user->email != $this->email) {
            $validationArray['email'] = 'required|email|unique:users';
        } else {
            $validationArray['email'] = 'required';
        }
        $validationArray['nome'] = 'required';
        $validationArray['cognome'] = 'required';
        $validationArray['password'] = 'sometimes|confirmed';
        $validationArray['vecchia-password'] = 'password';
        Log::debug($validationArray);
        return $validationArray;
    }
}
