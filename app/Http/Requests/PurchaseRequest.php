<?php

namespace App\Http\Requests;

use App\Models\EventsList;
use Illuminate\Foundation\Http\FormRequest;

class PurchaseRequest extends FormRequest
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
        $event = new EventsList;
        $bigliettiRimanenti = $event->getRemainTickets($this->idevento);
        return [
            'nomeutente' => 'required',
            'idevento' => 'required',
            'nomeevento' => 'required',
            'numerobiglietti' => 'required|integer|min:1|max:' . strval($bigliettiRimanenti),
            'costototale' => 'required|numeric|min:0',
            'data' => 'required|date',
            'pay' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'pay.required' => 'Per favore scelgi un metodo di pagamento',
        ];
    }
}
