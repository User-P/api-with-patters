<?php

namespace App\DTOs;

class IssuerDTO
{
    public static function fromModel($issuer): array
    {
        return [
            'id' => $issuer->id,
            'business_name' => $issuer->business_name,
            'user' => [
                'name' => $issuer->user->name,
                'email' => $issuer->user->email,
            ],
        ];
    }
}
