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
            'name'          =>  'required|max:50',
            'address'       =>  'required',
            'vat'           =>  'required|numeric|regex:/^\d{11}$/|unique:restaurants,vat',
            'cover_image'   =>  'image',

            'types'         =>  'required|exists:types,id',
        ];
    }

    public function messages()
    {
        return [
            'name.required'     =>  'Il nome del ristorante è obbligatorio',
            'name.max'          =>  'Il nome del ristorante deve essere di massimo :max caratteri',

            'address.required'  =>  'L\'indirizzo del ristorante è obbligatorio',

            'vat.required'      =>  'La Partiva IVA è obbligatoria',
            'vat.numeric'       =>  'La Partiva IVA deve essere composta solamente da numeri',
            'vat.regex'         =>  'La Partiva IVA deve avere una lunghezza di 11 caratteri',
            'vat.unique'        =>  'Questa Partiva IVA è già stata utilizzata',

            'cover_image.image' =>  'L\' immagine deve essere nel formato: jpg, jpeg, png, webp',

            'types.required'    =>  'Devi selezionare almeno una Tipologia',
            'types.exists'      =>  'Tipologia selezionata non valida',
        ];
    }
}