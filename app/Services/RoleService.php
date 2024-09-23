<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\RoleRepository;
use Database\Factories\RoleFactory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class RoleService
{
    private $roles_protected = ['Super Admin', 'Admin', 'Customer Support'];
    private $roleRepository;

    public function __construct(RoleRepository $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }

    public function allDatatable()
    {
        return $this->roleRepository->allDatatable();
    }

    public function getAll()
    {
        $locale = app()->getLocale();
        $roles = $this->roleRepository->getAll();
        $rolesFormat = [];
        foreach ($roles as $rol) {
            $text = $rol->description_key;
            if (Auth::user()->hasRole('Super Admin')) {
                $text = $locale == 'es' ? __('permissions.' . $rol->description_key) : $rol->name;
            }
            $permisions = [];
            foreach ($rol->permissions as $permission) {
                array_push($permisions, [
                    'id' => $permission->id,
                    'name' => $permission->name,
                    'text' => $locale == 'es' ? __('permissions.' . $permission->description_key) : $permission->name
                ]);
            }
            array_push($rolesFormat, [
                'id' => $rol->id,
                'name' => $rol->name,
                'text' => $text,
                'permissions' => $permisions
            ]);
        }
        return $rolesFormat;
    }

    public function storeRole($data)
    {
        DB::beginTransaction();
        try {
            $partner_id = Auth::user()->partner_id;
            $new_data = [
                'name' => $partner_id . $data->name,
                'guard_name' => 'web',
                'partner_id' => $partner_id,
                'description_key' => $data->name
            ];
            $role = $this->roleRepository->store($new_data);
            $this->syncPermissions($role, $data->permissions);

            DB::commit();
            return $role;
        } catch (\Throwable $th) {
            DB::rollBack();
            return false;
        }
    }

    public function getRole($id)
    {
        $role = $this->roleRepository->get($id);
        return $role;
    }

    public function updateRole(Role $role, $data)
    {
        if (in_array($role->name, $this->roles_protected)) {
            return ['status' => false, 'message' => __('http_messages.not_found')];
        }

        DB::beginTransaction();
        try {
            $partner_id = Auth::user()->partner_id;
            $new_data = [
                'name' => $partner_id . $data->name,
                'description_key' => $data->name
            ];
            $this->roleRepository->update($role, $new_data);
            $this->syncPermissions($role, $data->permissions);

            return ['status' => true, 'message' => __('http_messages.success_update')];
        } catch (\Throwable $th) {
            DB::rollBack();
            return ['status' => false, 'message' => __('http_messages.failed_update')];

        }
    }

    public function destroy(Role $role)
    {
        if (in_array($role->name, $this->roles_protected)) {
            return ['status' => false, 'message' => __('http_messages.not_found')];
        }

        if ($role->partner_id !== Auth::user()->partner_id) {
            return ['status' => false, 'message' => __('http_messages.not_found')];
        }

        if ($role->users()->exists()) {
            return ['status' => false, 'message' => __('models_messages.role_used')];
        }

        $this->roleRepository->delete($role);
        return ['status' => true, 'message' => __('http_messages.success_destroy')];
    }

    public function syncPermissions(Role $role, array $data)
    {
        $role->syncPermissions([$data]);
        return true;
    }

    public function revokePermission(Role $role, string $permission)
    {
        $role->revokePermissionTo($permission);
        return true;
    }
}
