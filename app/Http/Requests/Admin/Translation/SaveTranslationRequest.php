<?php

namespace App\Http\Requests\Admin\Translation;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\NoReturn;

class SaveTranslationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    #[NoReturn]
    protected function prepareForValidation(): void
    {
        $this->merge([
            'text' => array_filter((array) $this->input('text'))
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'group' => ['required', 'string', 'max:50'],
            'key' => ['required', 'string', 'max:50'],
            'text' => ['required', 'array'],
            'text.*' => ['required', 'string'],
        ];
    }
}
