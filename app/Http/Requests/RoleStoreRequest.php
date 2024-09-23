<?php

namespace App\Http\Requests;

use Auth;
use Illuminate\Foundation\Http\FormRequest;
use Spatie\Permission\Models\Permission;

class RoleStoreRequest extends FormRequest
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
            'name'=>'required|string',
            'permissions' => 'required|array',
            'permissions.*' => 'required|string'
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $permissions = $this->input('permissions', []);

            $invalidPermissions = collect($permissions)->filter(function ($permissionName) {
                return !Permission::where('name', $permissionName)->exists();
            });

            if ($invalidPermissions->isNotEmpty()) {
                foreach ($invalidPermissions as $invalidPermission) {
                    $validator->errors()->add('permissions_invalid', $invalidPermission);
                }
            }
        });
    }
}
