<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class BlogFilterRequest extends FormRequest
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
            'title' => ['required', 'min:4'],
            'slug' => ['required', 'regex:/^[a-z0-9-]+$/'],
        ];
    }

    protected function prepareForValidation(): void
    {
        // ajoute ou écrase la valeur slug dans la requête avant validation.
            $this->merge([
                // If 'slug' is not provided, generate it from 'title'
                'slug' => $this->input('slug') ?: Str::slug($this->input('title'))
            ]);
        
    }


}

