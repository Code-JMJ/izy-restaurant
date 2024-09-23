<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Resources\UserResource;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        return $this->userService->allDatatable();
    }

    public function store(UserStoreRequest $request)
    {
        $user = $this->userService->storeUser($request->all());
        return response()->json([
            'status'=>true,
            'message'=> __('http_messages.success_store'),
            'data'=>$user
        ], 200);
    }

    public function show(string $id)
    {
        $user = $this->userService->getUser($id);
        if(!$user){
            return response()->json([
                'status'=>false,
                'message'=>__('http_messages.not_found')
            ], 404);
        }
        $userFormat = new UserResource($user);
        return response()->json([
            'status'=>true,
            'data' => $userFormat
        ], 200);
    }

    public function update(UserUpdateRequest $request, string $id)
    {
        $user = $this->userService->getUser($id);
        if(!$user){
            return response()->json([
                'status'=>false,
                'message'=>__('http_messages.not_found')
            ], 404);
        }

        $isUpdated = $this->userService->updateUser($user, $request->all());
        return response()->json([
            'status'=>$isUpdated,
            'message'=>__('http_messages.success_update')
        ], 200);
    }

    public function updateStatus(Request $request)
    {
        $user = $this->userService->getUser($request->id);
        if(!$user){
            return response()->json([
                'status'=>false,
                'message'=>__('http_messages.not_found')
            ], 404);
        }

        $isUpdated = $this->userService->updateStatus($user, ['status' => $request->status]);
        return response()->json([
            'status'=>$isUpdated,
            'message'=>__('http_messages.success_update_status')
        ], 200);
    }

    public function destroy(string $id)
    {
        $user = $this->userService->getUser($id);
        if(!$user){
            return response()->json([
                'status'=>false,
                'message'=>__('http_messages.not_found')
            ], 404);
        }

        $isDeleted = $this->userService->destroy($user);
        return response()->json([
            'status'=>$isDeleted,
            'message'=>__('http_messages.success_destroy')
        ], 200);
    }

}
