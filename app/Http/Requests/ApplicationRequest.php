<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApplicationRequest extends FormRequest
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
            'subject' => 'required|max:255',
            'message' => 'required',
            'file' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
    public function messages(): array
    {
        return [
            'file.image' => 'Kiritilgan fayl rasm bo\'lishi kerak.',
            'file.mimes' => 'Fayl formati jpeg,png,jpg,gif,svg bo\'lishi kerak',
            'subject.max' => 'Ariza sarlavhasi 255 belgidan oshmasligi kerak',
            'file.max' => 'Fayl hajmi 2048 kilobaytdan oshmasligi kerak',
        ];
    }
}
