<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Partner extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function document_type():BelongsTo
    {
        return $this->belongsTo(DocumentType::class, 'document_type_code');
    }

    public function settings():HasOne
    {
        return $this->hasOne(PartnerSetting::class);
    }
}
