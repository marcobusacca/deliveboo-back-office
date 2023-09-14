<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRestaurantRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'address' => 'required',
            'vat' => 'required|numeric|regex:/^\d{11}$/',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Il nome del ristorante è obbligatorio',

            'address.required' => 'L\'indirizzo del ristorante è obbligatorio',

            'vat.required' => 'La Partiva IVA è obbligatoria',

            'vat.numeric' => 'La Partiva IVA deve essere composta solamente da numeri',

            'vat.regex' => 'La Partiva IVA deve avere una lunghezza di 11 caratteri',
        ];
    }
}