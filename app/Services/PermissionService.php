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

    public function allDatatable()
    {
        return $this->permissionRepository->allDatatable();
    }

    public function createPermission($data)
    {
        $data['partner_id'] = Auth::user()->partner_id;
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