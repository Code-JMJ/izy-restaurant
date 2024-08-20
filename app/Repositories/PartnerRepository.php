<?php

namespace App\Repositories;

use App\Models\Partner;
use App\Models\User;
use Yajra\DataTables\Facades\DataTables;

class PartnerRepository extends BaseRepository
{
    public function __construct(Partner $partner)
    {
        parent::__construct($partner);
    }

    public function queryAll()
    {
        $query = User::where('partner_main_user', 1);
        return $query;
    }

    public function allDatatable()
    {
        $query = $this->queryAll();

        return DataTables::eloquent($query)
            ->addColumn('document_type', function (User $user) {
                return $user->partner->document_type->name;
            })
            ->addColumn('document_number', function (User $user) {
                return $user->partner->document_number;
            })
            ->addColumn('business_name', function (User $user) {
                return $user->partner->business_name;
            })
            ->filterColumn('document_number', function ($query, $keyword) {
                $query->whereHas('partner', function ($query) use ($keyword) {
                    $query->where('document_number', 'like', "%{$keyword}%");
                });
            })
            ->filterColumn('business_name', function ($query, $keyword) {
                $query->whereHas('partner', function ($query) use ($keyword) {
                    $query->where('business_name', 'like', "%{$keyword}%");
                });
            })->toJson();
    }

    public function getPartner($id, array $relations=[]){
        $query = User::where('partner_main_user', 1);
        if (!empty($relations)) {
            $query = $query->with($relations);
        }
        return $query->find($id);
    }

}
