<?php

namespace App\Repositories;

use App\Models\PartnerSetting;

class PartnerSettingRepository extends BaseRepository
{
    public function __construct(PartnerSetting $partnerSetting)
    {
        parent::__construct($partnerSetting);
    }

}
