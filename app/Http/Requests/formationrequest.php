<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class formationrequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'titre'=>'required',
            'duree'=>'required',
            'prix'=>'required',
            'date_debut'=>'required',
            'date_fin'=>'required',
            'groupe_id'=>'required',
            'couleur'=>'required',
            
        ];
    }
}
