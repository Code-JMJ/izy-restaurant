<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;

class UserService
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function allDatatable()
    {
        return $this->userRepository->allDatatable();
    }

    public function storeUser($data)
    {
        $data['partner_id'] = Auth::user()->partner_id;
        $user = $this->userRepository->store($data);

        return $user;
    }

    public function getUser($id)
    {
        $user = $this->userRepository->get($id);
        return $user;
    }

    public function updateUser(User $user, $data)
    {
        $status = $this->userRepository->update($user, $data);
        return $status?true:false;
    }

    public function updateStatus(User $user, $data)
    {
        $status = $this->userRepository->update($user, $data);
        return $status?true:false;
    }

    public function destroy(User $user)
    {
        if($user && $user->partner_id === Auth::user()->partner_id){
            $this->userRepository->delete($user);
            return true;
        }

        return false;
    }

    public function syncRole(User $user, $roles){
        $user->syncRoles($roles);
        return true;
    }

}
