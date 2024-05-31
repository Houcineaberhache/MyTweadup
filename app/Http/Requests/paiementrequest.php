<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class paiementrequest extends FormRequest
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
            'etudiant_id'=>'required',
            'formation_id'=>'required',
            'somme'=>'required',
            'reste_paiement' => 'numeric',
            'prix_total' => 'numeric',
            'groupe_id'=>'required',
            'remise'=>'required',
        ];
    }
}
