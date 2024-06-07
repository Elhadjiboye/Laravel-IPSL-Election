<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class SavePosteRequest extends FormRequest
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
            'type_poste' => ['required', Rule::unique('postes', 'type_poste')],
            'max_vote' => ['required'],
            'date_debut' => ['required', 'date_format:Y-m-d H:i:s'],
            'date_fin' => ['required', 'date_format:Y-m-d H:i:s', 'after_or_equal:date_debut'],
        ];
    }

    public function messages()
    {
        return [
            'type_poste.required' => 'Le type de poste est requis.',
            'type_poste.unique' => 'Ce poste existe déjà.',
            'max_vote.required' => 'Le nombre maximum de vote est requis.',
            'date_debut.required' => 'La date de début est requise.',
            'date_debut.date_format' => 'La date de début doit être au format YYYY-MM-DD HH:MM:SS.',
            'date_fin.required' => 'La date de fin est requise.',
            'date_fin.date_format' => 'La date de fin doit être au format YYYY-MM-DD HH:MM:SS.',
            'date_fin.after_or_equal' => 'La date de fin doit être postérieure ou égale à la date de début.',
        ];
    }

}
