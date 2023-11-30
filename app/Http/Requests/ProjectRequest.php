<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'title' => 'required|min:2|max:20',
            'release_date' => 'numeric|max:60',
            'description' => 'required|min:5',
        ];
    }

    public function messages(){
        return [
            'title.required' => 'Devi inserire il titolo del progetto',
            'title.min' => 'Il titolo del progetto deve avere almeno :min caratteri',
            'title.max' => 'Il titolo del progetto non può avere più di :max caratteri',
            'release_date.max' => 'La data non può avere più di :max minuti',
            'release_date.numeric' => 'La data deve essere un numero',
            'description.required' => 'La descrizione del progetto non può essere vuoto',
            'description.min' =>  'La descrizione del progetto deve avere almeno :min caratteri'
        ];
    }
}
