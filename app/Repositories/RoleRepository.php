<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;

class RoleRepository extends BaseRepository
{

    public function __construct(Role $role)
    {
        parent::__construct($role);
    }

    public function queryAll()
    {

        $query = Role::with('permissions:id,name,description_key')->select(['id', 'name', 'description_key', 'created_at']);
        if (Auth::user()->hasRole('Super Admin')) {
            $query = $query->where('partner_id', NULL);
            return $query;
        }
        $query = $query->where('partner_id', Auth::user()->partner_id);
        return $query;
    }

    public function allDatatable()
    {
        $query = $this->queryAll();
        return DataTables::eloquent($query)
            ->addColumn('permissions_text', function ($role) {
                return $role->permissions->map(function ($permission) {
                    return __('permissions.' . $permission->description_key);
                })->toArray();
            })->toJson();
    }

    public function getAll(){
        return $this->queryAll()->get();
    }
}
