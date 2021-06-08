<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Symfony\Component\HttpFoundation\Response;

class AddEventRequest extends FormRequest
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
            'nome' => 'required|max:50',
            'descrizione' => 'required|max:2000',
            'data' => 'required|date',
            'orario' => 'required',
            'regione' => 'required',
            'provincia' => 'required',
            'città' => 'required|string',
            'indirizzo' => 'required|string',
            'numciv' => 'required|numeric',
            'comeraggiungerci' => 'nullable|string|max:1000',
            'programma' => 'nullable|string|max:1000',
            'immagine' => 'required|image|mimes:jpeg,png,jpg,bmp,gif|max:1024',
            'bigliettitotali' => 'required|numeric|min:1',
            'costo' => 'required|numeric|min:0',
            'sconto' => 'nullable|numeric|min:0|max:100',
            'giornisconto' => 'nullable|numeric|min:0',
        ];
    }
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY));
    }
}
