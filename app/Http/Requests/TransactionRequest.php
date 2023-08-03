<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransactionRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "montant"=>"required|numeric|min:500",
            "compte_id"=>"sometimes|exits:comptes,id",
            "destinataire_id"=>"sometimes|exits:clients,id"
        ];
    }

    public function messages()
    {
        return [
            "montant.required"=>"Veuillez saisir le montant",
            "montant.numeric" =>"Le montant doit contenir que des chiffres",
            "montant.min" => "Le montant minimal est 500",
        ];

    }
}
