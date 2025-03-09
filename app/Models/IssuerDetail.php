<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class IssuerDetail extends Model
{
    protected $guarded = ['id'];

    public function issuer(): BelongsTo
    {
        return $this->belongsTo(Issuer::class);
    }

    public function setBirthDateAttribute($value): void
    {
        $this->attributes['birth_date'] = date('Y-m-d', strtotime($value));
    }
}
