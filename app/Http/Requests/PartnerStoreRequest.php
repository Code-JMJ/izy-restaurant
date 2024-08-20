<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class PartnerStoreRequest extends FormRequest
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
            'document_type' => 'required|max:5',
            'document_number' =>'required|min:5|unique:partners,document_number',
            'business_name' =>'required|min:3',
            'name' => 'required|min:3',
            'email' => 'required|unique:users,email',
            'password' => [Password::min(6)],
        ];
    }
}
