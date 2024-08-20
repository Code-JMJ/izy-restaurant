<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PartnerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return [
            'status'=> true,
            'data' => [
                'id' => $this->id,
                'partner_id' => $this->partner_id,
                'name' => $this->name,
                'email' => $this->email,
                'document_type' => $this->partner->document_type->name,
                'document_number' => $this->partner->document_number,
                'document_number' => $this->partner->document_number,
                'business_name' => $this->partner->business_name,
                'trade_name' => $this->partner->trade_name,
                'environment_type' => $this->partner->environment_type,
                'status' => $this->partner->status,
                'created_at' => $this->created_at,
                'settings' => [
                    'currency' => $this->partner->settings->currency_code,
                    'number_of_decimals' => $this->partner->settings->number_of_decimals,
                    'expiration_notification_days' => $this->partner->settings->expiration_notification_days,
                    'restrict_stock' => $this->partner->settings->restrict_stock,
                    'round_cash_transactions' => $this->partner->settings->round_cash_transactions,
                    'electronic_invoicing' => $this->partner->settings->electronic_invoicing
                ]
            ]

        ];
    }
}
