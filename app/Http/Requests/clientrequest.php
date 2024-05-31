<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class clientrequest extends FormRequest
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
            'nom'=>'required|min:3|max:20',
            'prenom'=>'required|min:3|max:20',
            'CIN'=>'required',
            'email'=>'required|email',
            'password'=>'required|min:9|max:30|confirmed',
            'adresse'=>'required',
            'formation_id'=>'required',
            'groupe_id'=>'required',
            'type_paiement'=>'required',
        ];
    }
}
