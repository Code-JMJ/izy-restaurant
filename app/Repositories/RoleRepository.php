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

    public function queryAll(){
        return Role::where('partner_id', Auth::user()->partner_id);
    }

    public function allDatatable()
    {
        $query = $this->queryAll();
        return DataTables::eloquent($query)->toJson();
    }

}