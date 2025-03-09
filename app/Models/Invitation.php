<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invitation extends Model
{
    public const USED = 1;

    protected $guarded = ['id'];

    public function account()
    {
        return $this->belongsTo(Account::class);
    }
}
