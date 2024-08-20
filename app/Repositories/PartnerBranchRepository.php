<?php

namespace App\Repositories;

use App\Models\PartnerBranch;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class PartnerBranchRepository extends BaseRepository
{
    public function __construct(PartnerBranch $partnerBranch)
    {
        parent::__construct($partnerBranch);
    }

    public function queryAll(){
        return PartnerBranch::where('partner_id', Auth::user()->partner_id);
    }

    public function allDatatable()
    {
        $query = $this->queryAll();
        return DataTables::eloquent($query)->toJson();
    }

}
