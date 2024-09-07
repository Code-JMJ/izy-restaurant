<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\RoleRepository;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class RoleService
{
    private $roleRepository;
    public function __construct(RoleRepository $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }

    public function allDatatable()
    {
        return $this->roleRepository->allDatatable();
    }

    public function createRole($data)
    {
        $data['partner_id'] = Auth::user()->partner_id;
        $role = $this->roleRepository->store($data);

        return $role;
    }

    public function getRole($id)
    {
        $role = $this->roleRepository->get($id);
        return $role;
    }

    public function updateRole(Role $role, $data)
    {
        $status = $this->roleRepository->update($role, $data);
        return $status?true:false;
    }

    public function destroy(Role $role)
    {
        if($role && $role->partner_id === Auth::user()->partner_id){
            $numUsersWhithRole = User::withoutRole($role->name)->count();
            if($numUsersWhithRole>0){
                return ['status'=>false, 'message'=>__('models_messages.role_used')];
            }
            $this->roleRepository->delete($role);
            return ['status'=>true, 'message'=>__('http_messages.success_destroy')];
        }

        return ['status'=>false, 'message'=>__('http_messages.not_found')];
    }

    public function syncPermissions(Role $role, array $data){
        $role->syncPermissions([$data]);
        return true;
    }

    public function revokePermission(Role $role, string $permission){
        $role->revokePermissionTo($permission);
        return true;
    }

}