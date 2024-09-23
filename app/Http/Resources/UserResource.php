<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "email" => $this->email,
            "partner_branch_id" => $this->partner_branch_id,
            "partner_branch_name" => $this->partner_branch?->name,
            "partner_id" => $this->partner_id,
            "profile_photo_path" => $this->profile_photo_path,
            "partner_main_user" => $this->partner_main_user,
            "status" => $this->status,
            "created_at" => $this->created_at,
            "role" => $this->roles[0]?->name ?? ''
        ];
    }
}
