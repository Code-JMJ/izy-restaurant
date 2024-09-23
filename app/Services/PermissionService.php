<?php

namespace App\Services;

use App\Repositories\PermissionRepository;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;

class PermissionService
{
    private $permissionRepository;
    public function __construct(PermissionRepository $permissionRepository)
    {
        $this->permissionRepository = $permissionRepository;
    }

    public function getAll()
    {
        $permissionGoups = $this->permissionRepository->getAll();
        $permissionsFormat = [];
        foreach ($permissionGoups as $group) {
            $permissions = [];

            foreach ($group->permissions as $permission) {
                array_push($permissions, [
                    'id' => $permission->id,
                    'name' => $permission->name,
                    'text' => __('permissions.'.$permission->description_key),
                ]);
            }

            array_push($permissionsFormat, [
                'group_id' => $group->id,
                'group_name' => __('permissions.'.$group->description_key),
                'permissions' => $permissions
            ]);
        }

        return $permissionsFormat;
    }

    public function createPermission($data)
    {
        $data['guard_name'] = 'web';
        $permission = $this->permissionRepository->store($data);

        return $permission;
    }

    public function getPermission($id)
    {
        $permission = $this->permissionRepository->get($id);
        return $permission;
    }

    public function updatePermission(Permission $permission, $data)
    {
        $status = $this->permissionRepository->update($permission, $data);
        return $status?true:false;
    }

    public function destroy(Permission $permission)
    {
        // if($permission){
        //     $this->permissionRepository->delete($permission);
        //     return true;
        // }

        return false;
    }

}