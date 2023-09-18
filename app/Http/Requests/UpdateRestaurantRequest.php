<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRestaurantRequest extends FormRequest
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

            'cover_image.image' =>  'L\' immagine deve essere nel formato: jpg, jpeg, png, webp',

            'types.required'    =>  'Devi selezionare almeno una Tipologia',
            'types.exists'      =>  'Tipologia selezionata non valida',
        ];
    }
}