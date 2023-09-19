<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'ingredients'   =>  'required|max:255',
            'price'         =>  'required|numeric|min:0.10',
            'visible'       =>  'required',
            'cover_image'   =>  'image',
        ];
    }

    public function messages(){
         return[
            'name.required'         =>  'Il nome è obbligatorio',
            'name.max'              =>  'Il nome deve essere di massimo :max caratteri',

            'ingredients.required'  =>  'Gli ingredienti sono obbligatori',
            'ingredients.max'       =>  'L\'elenco degli ingredienti deve essere di massimo :max caratteri',

            'price.required'        =>  'Il prezzo è obbligatorio',
            'price.numeric'         =>  'Il prezzo deve essere un valore numerico',
            'price.min'             =>  'Il prezzo deve essere superiore a :min€',

            'visible.required'      =>  'Il campo della visibilità è obbligatorio',

            'cover_image.image'     =>  'L\'immagine deve essere nel formato: jpg, jpeg, png, webp'
         ];
    }
}