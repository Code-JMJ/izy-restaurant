<?php

namespace App\Http\Controllers;

use App\Http\Requests\PartnerBranchStoreRequest;
use App\Http\Requests\PartnerBranchUpdateRequest;
use App\Services\PartnerBranchService;
use Illuminate\Http\Request;

class PartnerBranchController extends Controller
{
    private $partnerBranchService;

    public function __construct(PartnerBranchService $partnerBranchService)
    {
        $this->partnerBranchService = $partnerBranchService;
    }

    public function index()
    {
        return $this->partnerBranchService->allDatatable();
    }

    public function store(PartnerBranchStoreRequest $request)
    {
        $partnerBranch = $this->partnerBranchService->storePartnerBranch($request->all());
        return response()->json([
            'status'=>true,
            'message'=> __('http_messages.success_store'),
            'data'=>$partnerBranch
        ], 200);
    }

    public function show(string $id)
    {
        $partnerBranch = $this->partnerBranchService->getPartnerBranch($id);
        if(!$partnerBranch){
            return response()->json([
                'status'=>false,
                'message'=>__('http_messages.not_found')
            ], 404);
        }
        return response()->json([
            'status'=>true,
            'data'=>$partnerBranch
        ], 200);
    }

    public function update(PartnerBranchUpdateRequest $request, string $id)
    {
        $partnerBranch = $this->partnerBranchService->getPartnerBranch($id);
        if(!$partnerBranch){
            return response()->json([
                'status'=>false,
                'message'=>__('http_messages.not_found')
            ], 404);
        }

        $isUpdated = $this->partnerBranchService->updatePartnerBranch($partnerBranch, $request->all());
        return response()->json([
            'status'=>$isUpdated,
            'message'=>__('http_messages.success_update')
        ], 200);
    }

    public function updateStatus(Request $request)
    {
        $partnerBranch = $this->partnerBranchService->getPartnerBranch($request->id);
        if(!$partnerBranch){
            return response()->json([
                'status'=>false,
                'message'=>__('http_messages.not_found')
            ], 404);
        }

        $isUpdated = $this->partnerBranchService->updateStatus($partnerBranch, ['status' => $request->status]);
        return response()->json([
            'status'=>$isUpdated,
            'message'=>__('http_messages.success_update_status')
        ], 200);
    }

    public function destroy(string $id)
    {
        $partnerBranch = $this->partnerBranchService->getPartnerBranch($id);
        if(!$partnerBranch){
            return response()->json([
                'status'=>false,
                'message'=>__('http_messages.not_found')
            ], 404);
        }

        $isDeleted = $this->partnerBranchService->destroy($partnerBranch);
        return response()->json([
            'status'=>$isDeleted,
            'message'=>__('http_messages.success_destroy')
        ], 200);
    }
}
