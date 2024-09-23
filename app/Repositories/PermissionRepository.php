<?php

namespace App\Repositories;

use App\Models\PermissionGroup;
use Spatie\Permission\Models\Permission;

class PermissionRepository extends BaseRepository
{
    public function __construct(Permission $permission)
    {
        parent::__construct($permission);
    }

    public function queryAll(){
        return PermissionGroup::with('permissions');
    }

    public function getAll()
    {
        return $this->queryAll()->get();
    }

}
