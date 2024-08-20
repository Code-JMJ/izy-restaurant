<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PartnerUpdateRequest extends FormRequest
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
            'id' => 'required',
            'partner_id'=>'required',
            'document_type' => 'required|max:5',
            'document_number' =>'required|min:5|unique:partners,document_number,'.$this->partner_id,
            'business_name' =>'required|min:3',
            'trade_name' =>'required|min:3',
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email,'.$this->id,
            'password'=> 'nullable|min:6'
        ];
    }
}
