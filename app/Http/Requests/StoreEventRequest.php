<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreEventRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
{
    return [
        'title' => 'required|min:5|max:255',
        'description' => 'required|min:20',
        'date_time' => 'required|after:now',
        'location' => 'required|max:255',
        'capacity' => 'required|numeric|min:1',
        'category_id' => 'required|exists:categories,id',
        'banner' => 'required|image|max:2048',
    ];
}

public function messages(): array
{
    return [
        'date_time.after' =>
            'A data do evento deve ser futura.',

        'banner.max' =>
            'A imagem deve possuir no máximo 2MB.',
    ];
}
}
