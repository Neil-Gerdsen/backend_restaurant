<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class restaurantRequest extends FormRequest
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
            'name' => 'required|string|max:255|min:2',
            'beschrijving' => 'required|string|min:5',
            'prijs' => 'required|numeric|min:0',
            'img' => 'nullable|string|url'
        ];
    }

    /**
     * Get custom error messages for validation rules.
     */
    public function messages(): array
    {
        return [
            'name.required' => 'De naam is verplicht.',
            'name.min' => 'De naam moet minstens 2 karakters lang zijn.',
            'beschrijving.required' => 'De beschrijving is verplicht.',
            'beschrijving.min' => 'De beschrijving moet minstens 5 karakters lang zijn.',
            'prijs.required' => 'De prijs is verplicht.',
            'prijs.numeric' => 'De prijs moet een getal zijn.',
            'prijs.min' => 'De prijs kan niet negatief zijn.',
            'img.url' => 'De afbeelding URL is niet geldig.'
        ];
    }
}
