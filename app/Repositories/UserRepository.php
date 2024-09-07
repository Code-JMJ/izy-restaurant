<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class UserRepository extends BaseRepository
{
    public function __construct(User $user)
    {
        parent::__construct($user);
    }

    public function queryAll(){
        return User::where('partner_id', Auth::user()->partner_id);
    }

    public function allDatatable()
    {
        $query = $this->queryAll();
        return DataTables::eloquent($query)->toJson();
    }

    public function deleteGroupByPartner($partner_id){
        return User::where('partner_id', $partner_id)->delete();
    }

}
