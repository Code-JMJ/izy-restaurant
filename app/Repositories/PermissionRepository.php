<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;

class PermissionRepository extends BaseRepository
{
    public function __construct(Permission $permission)
    {
        parent::__construct($permission);
    }

    public function queryAll(){
        return Permission::where('partner_id', Auth::user()->partner_id);
    }

    public function allDatatable()
    {
        $query = $this->queryAll();
        return DataTables::eloquent($query)->toJson();
    }

}
