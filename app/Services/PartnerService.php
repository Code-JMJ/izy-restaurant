<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\PartnerRepository;
use App\Repositories\PartnerSettingRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\DB;

class PartnerService
{
    protected $partnerRepository;
    protected $userRepository;
    protected $partnerSettingRepository;

    public function __construct(PartnerRepository $partnerRepository, UserRepository $userRepository, PartnerSettingRepository $partnerSettingRepository)
    {
        $this->partnerRepository = $partnerRepository;
        $this->userRepository = $userRepository;
        $this->partnerSettingRepository = $partnerSettingRepository;
    }

    public function allDatatable()
    {
        return $this->partnerRepository->allDatatable();
    }

    public function storePartner($data)
    {
        DB::beginTransaction();
        try {
            $dataPartner = [
                'document_type_code' => $data->document_type,
                'document_number' => $data->document_number,
                'business_name' => $data->name,
                'trade_name' => $data->name,
                'email' => $data->email,
            ];
            $partner = $this->partnerRepository->store($dataPartner);

            $dataUser = [
                'name' => $data->name,
                'email' => $data->email,
                'password' => $data->password,
                'partner_id' => $partner->id,
                'partner_main_user' => 1
            ];
            $user = $this->userRepository->store($dataUser);
            $this->userRepository->syncRoles($user, ['Admin']);

            $dataSetting = [
                'partner_id' => $partner->id,
                'currency_code' => 'PEN',
            ];
            $setting = $this->partnerSettingRepository->store($dataSetting);
            DB::commit();
            return $user;
        } catch (\Throwable $th) {
            DB::rollBack();
            return false;
        }
    }

    public function getPartner($id)
    {
        $partner = $this->partnerRepository->getPartner($id, ['partner', 'partner.document_type:code,name', 'partner.settings']);
        return $partner;
    }

    public function updatePartner(User $user, $data)
    {
        DB::beginTransaction();
        try {
            $dataPartner = [
                'document_type_code' => $data->document_type,
                'document_number' => $data->document_number,
                'business_name' => $data->business_name,
                'trade_name' => $data->trade_name,
            ];
    
            $dataUser['email'] = $data->email;
            $dataUser['name'] = $data->name;
            if ($data->password != null && $data->password != '') {
                $dataUser['password'] = $data->password;
            }
    
            $this->partnerRepository->update($user->partner, $dataPartner);
            $this->userRepository->update($user, $dataUser);
    
            DB::commit();
            return true;
        } catch (\Throwable $th) {
            DB::rollBack();
            return false;
        }
        
    }

    public function updateStatus(User $user, $data)
    {
        $statusP = $this->partnerRepository->update($user->partner, $data);
        $statusU = $this->userRepository->update($user, $data);
        return $statusU ? true : false;
    }

    public function destroy(User $user)
    {
        $this->userRepository->deleteGroupByPartner($user->partner_id);
        $this->partnerRepository->delete($user->partner);
        return true;
    }

    public function getUserPartner($id)
    {
        $partner = $this->partnerRepository->getPartner($id);
        return $partner;
    }
}
