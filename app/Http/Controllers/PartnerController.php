<?php

namespace App\Http\Controllers;

use App\Http\Requests\PartnerStoreRequest;
use App\Http\Requests\PartnerUpdateRequest;
use App\Http\Resources\PartnerResource;
use App\Services\PartnerService;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    private $partnerService;

    public function __construct(PartnerService $partnerService)
    {
        $this->partnerService = $partnerService;
    }

    public function index()
    {
        return $this->partnerService->allDatatable();
    }

    public function store(PartnerStoreRequest $request)
    {
        $partner = $this->partnerService->storePartner($request);
        if(!$partner){
            return response()->json([
                'status'=>false,
                'message'=>__('http_messages.failed_store')
            ], 404);
        }

        return response()->json([
            'status'=>true,
            'message'=> __('http_messages.success_store'),
            'partner'=>$partner
        ], 200);
    }

    public function show(string $id)
    {
        $partner = $this->partnerService->getPartner($id);
        if(!$partner){
            return response()->json([
                'status'=>false,
                'message'=>__('http_messages.not_found')
            ], 404);
        }
        $partnerFormat = new PartnerResource($partner);
        return response()->json([
            'status'=>true,
            'data' => $partnerFormat
        ], 200);
    }

    public function update(PartnerUpdateRequest $request, string $id)
    {
        $partner = $this->partnerService->getUserPartner($id);
        if(!$partner){
            return response()->json([
                'status'=>false,
                'message'=>__('http_messages.not_found')
            ], 404);
        }

        $isUpdated = $this->partnerService->updatePartner($partner, $request);
        if(!$isUpdated){
            return response()->json([
                'status'=>false,
                'message'=>__('http_messages.failed_update')
            ], 404);
        }

        return response()->json([
            'status'=>true,
            'message'=>__('http_messages.success_update')
        ], 200);
    }

    public function updateStatus(Request $request)
    {
        $partner = $this->partnerService->getUserPartner($request->id);
        if(!$partner){
            return response()->json([
                'status'=>false,
                'message'=>__('http_messages.not_found')
            ], 404);
        }

        $isUpdated = $this->partnerService->updateStatus($partner, ['status' => $request->status]);
        return response()->json([
            'status'=>$isUpdated,
            'message'=>__('http_messages.success_update_status')
        ], 200);
    }

    public function destroy(string $id)
    {
        $partner = $this->partnerService->getUserPartner($id);
        if(!$partner){
            return response()->json([
                'status'=>false,
                'message'=>__('http_messages.not_found')
            ], 404);
        }

        $isDeleted = $this->partnerService->destroy($partner);
        return response()->json([
            'status'=>$isDeleted,
            'message'=>__('http_messages.success_destroy')
        ], 200);
    }
}
