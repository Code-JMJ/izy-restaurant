<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use HasFactory;

    protected $primaryKey = 'code';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $guarded = [
        'id'
    ];

    public $timestamps = false;
}
