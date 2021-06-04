<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Symfony\Component\HttpFoundation\Response;

class EventRequest extends FormRequest
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
        $event = $this->evento;
        if (isset($event)) {
            $BigliettitotaliMin = $event->bigliettivenduti;
        } else {
            $BigliettitotaliMin = 1;
        }
        return [
            'nome' => 'required|max:50',
            'descrizione' => 'required|max:2000',
            'data' => 'required|date',
            'regione' => 'required|string',
            'provincia' => 'required|string',
            'città' => 'required|string',
            'indirizzo' => 'required|string',
            'numciv' => 'required|numeric',
            'comeraggiungerci' => 'required|string|max:1000',
            'immagine' => 'required|image|mimes:jpeg,png,jpg,bmp,gif|max:1024',
            'bigliettitotali' => 'required|numeric|min:' . strval($BigliettitotaliMin),
            'costo' => 'required|numeric|min:0',
            'sconto' => 'numeric|min:0|max:100',
            'giornisconto' => 'numeric|min:0',
        ];
    }
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY));
    }
}
