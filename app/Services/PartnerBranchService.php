<?php

namespace App\Services;

use App\Models\PartnerBranch;
use App\Repositories\PartnerBranchRepository;
use Illuminate\Support\Facades\Auth;

class PartnerBranchService
{
    private $partnerBranchRepository;

    public function __construct(PartnerBranchRepository $partnerBranchRepository)
    {
        $this->partnerBranchRepository = $partnerBranchRepository;
    }

    public function allDatatable()
    {
        return $this->partnerBranchRepository->allDatatable();
    }

    public function storePartnerBranch($data)
    {
        $data['partner_id'] = Auth::user()->partner_id;
        $partnerBranch = $this->partnerBranchRepository->store($data);

        return $partnerBranch;
    }

    public function getPartnerBranch($id)
    {
        $partnerBranch = $this->partnerBranchRepository->get($id);
        return $partnerBranch;
    }

    public function updatePartnerBranch(PartnerBranch $partnerBranch, $data)
    {
        $status = $this->partnerBranchRepository->update($partnerBranch, $data);
        return $status?true:false;

    }

    public function updateStatus(PartnerBranch $partnerBranch, $data)
    {
        $status = $this->partnerBranchRepository->update($partnerBranch, $data);
        return $status?true:false;
    }

    public function destroy(PartnerBranch $partnerBranch)
    {
        if($partnerBranch && $partnerBranch->partner_id === Auth::user()->partner_id){
            $this->partnerBranchRepository->delete($partnerBranch);
            return true;
        }

        return false;
    }

}
