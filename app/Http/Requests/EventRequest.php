<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Log;

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
        return [
            'nome' => 'required|max:50',
            'descrizione' => 'required|max:2000',
            'data' => 'required|date',
            'regione' => 'required',
            'provincia' => 'required',
            'città' => 'required',
            'indirizzo' => 'required',
            'numciv' => 'required',
            'comeraggiungerci' => 'required',
            'immagine' => 'required|image|mimes:jpeg,png,jpg,bmp,gif|max:1024',
            'bigliettitotali' => 'required|numeric|min:' . strval($event->bigliettivenduti),
            'costo' => 'required|numeric|min:0',
            'sconto' => 'numeric|min:0|max:100',
            'giornisconto' => 'numeric|min:0',
            'comeraggiungerci' => 'max:1000'
        ];
    }
}