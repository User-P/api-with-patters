<?php

    namespace App\Http\Resources;

    use Illuminate\Http\Resources\Json\JsonResource;

    class IssuerResource extends JsonResource
    {
        public function toArray($request)
        {
            return [
                'id' => $this->id,
                'status' => $this->status ?? random_int(0, 2),
                'business_name' => $this->business_name,
                'rfc' => $this->rfc,
                'postal_code' => $this->postal_code ?? '',
                'regime' => $this->taxRegime->description,
                'user' => [
                    'phone' => $this->user->phone,
                    'email' => $this->user->email,
                ],
                'expiration_date' => $this->certificate->expiration_date ?? '',
                'groups' => $this->groups ?? ['test', 'test2'],
                'type' => $this->type ?? 'test',
            ];
        }
    }
