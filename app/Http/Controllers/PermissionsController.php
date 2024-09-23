<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleStoreRequest;
use App\Http\Requests\RoleUpdateRequest;
use App\Services\PermissionService;
use App\Services\RoleService;

class PermissionsController extends Controller
{
    private $roleService;

    public function __construct(RoleService $roleService)
    {
        $this->roleService = $roleService;
    }

    public function index()
    {
        return $this->roleService->getAll();
    }

    public function store(RoleStoreRequest $request)
    {
        $role = $this->roleService->storeRole($request);
        if(!$role){
            return response()->json([
                'status'=>false,
                'message'=>__('http_messages.failed_store')
            ], 404);
        }

        return response()->json([
            'status'=>true,
            'message'=> __('http_messages.success_store'),
            'data'=>$role
        ], 200);
    }

    public function show(string $id)
    {
        $role = $this->roleService->getRole($id);
        if(!$role){
            return response()->json([
                'status'=>false,
                'message'=>__('http_messages.not_found')
            ], 404);
        }
        return response()->json([
            'status'=>true,
            'data'=>$role
        ], 200);
    }

    public function update(RoleUpdateRequest $request, string $id)
    {
        $role = $this->roleService->getRole($id);
        if(!$role){
            return response()->json([
                'status'=>false,
                'message'=>__('http_messages.not_found')
            ], 404);
        }

        $resp = $this->roleService->updateRole($role, $request);
        return response()->json($resp, 200);
    }

    public function destroy(string $id)
    {
        $role = $this->roleService->getRole($id);
        if(!$role){
            return response()->json([
                'status'=>false,
                'message'=>__('http_messages.not_found')
            ], 404);
        }

        $response = $this->roleService->destroy($role); //devuelve un array con status y message
        return response()->json($response, 200);
    }

    public function getPermissions(PermissionService $permissionService){
        $permissions = $permissionService->getAll();
        return response()->json([
            'status'=>true,
            'data'=>$permissions
        ], 200);
    }
}
