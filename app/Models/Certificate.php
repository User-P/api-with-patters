<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Certificate extends Model
{
    protected $guarded = ['id'];

    public function issuer() : BelongsTo
    {
        return $this->belongsTo(Issuer::class);
    }
}
