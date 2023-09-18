<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'name' => 'required|max:50',
            'ingredients' => 'required|max:255',
            'price' => 'required|numeric',
            'visible' => 'required',
            'cover_image' => 'nullable|image',
        ];
    }

    public function messages(){
         return[
            'name.required'     =>  'Il nome è obbligatorio',
            'name.max'          =>  'Il nome dev\'essere di massimo :max caratteri',

            'ingredients.required' => 'Gli ingredienti sono obbligatori',
            'ingredients.max' => 'L\'elenco degli ingredienti deve essere di massimo :max caratteri',

            'price.required'    =>  'Il prezzo è obbligatorio',
            'price.numeric'     =>  'Il prezzo dev\' essere un valore numerico',

            'visible.required'  =>  'Il campo della visibilità è obbligatorio',

            'cover_image.image' =>  'L\' immagine dev\'essere nel formato: jpg, jpeg, png, webp'
         ];
    }
}